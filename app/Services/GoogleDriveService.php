<?php

namespace App\Services;

use Exception;
use Google\Client;
use Google\Service\Drive;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class GoogleDriveService
{
    private $service;

    public function __construct()
    {
        try {
            $client = new Client();
            $client->useApplicationDefaultCredentials();
            $client->addScope(Drive::DRIVE);
            $client->setAuthConfig(config('services.google')['service_account']);

            $this->service = new Drive($client);
        }
        catch (Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }

    public function download()
    {
        try {
            $folder_id = config('services.google')['folder_id'];
            # list file from folder id
            $files = array();
            $pageToken = null;
            do {
                $response = $this->service->files->listFiles(array(
                    'q' => "'$folder_id' in parents",
                    'spaces' => 'drive',
                    'pageToken' => $pageToken,
                    'fields' => 'nextPageToken, files(id, name)',
                ));
                foreach ($response->files as $file) {
                    printf("Found file: %s (%s)\n", $file->name, $file->id);
                }
                array_push($files, $response->files);

                $pageToken = $response->pageToken;
            } while ($pageToken != null);     
            
            # download scimago file, assume only one file in folder
            $file = $files[0][0];
            print("downloading file $file->name ...\n");
            $response = $this->service->files->get($file->id, array(
                'alt' => 'media'
            ));
            $content = $response->getBody()->getContents();
            Storage::disk('local')->put('scimago.csv', $content);
            print("file downloaded and saved to file storage\n");

            # Serialize to array of journals
            print("put journals to cache\n");
            $content = str_replace('"','', $content);
            $rawjournals = array_slice(explode("\n", $content), 1);
            array_pop($rawjournals);
            $journals = [];
            foreach ($rawjournals as $journal) {
                // print($journal);
                $journal = explode(";", $journal);
                // print($journal[2]);
                array_push($journals, [
                    $journal[2],
                    $journal[6],
                    $journal[17],
                    $journal[15],
                ]);
            }
            print('found '. count($journals) . " journals\n");
            Cache::store('file')->put('journals', $journals);

            return $files;

        } catch(Exception $e) {
            echo "Error Message: ".$e;
        }    
    }
}

?>