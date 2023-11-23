<?php

namespace App\Services;

use Exception;
use Google\Client;
use Google\Service\Drive;
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
            $client->setAuthConfig(config('services.google')['sheets_credential']);

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
            print("downloading file $file->name ...");
            $response = $this->service->files->get($file->id, array(
                'alt' => 'media'
            ));
            $content = $response->getBody()->getContents();
            Storage::disk('local')->put('scimago.csv', $content);

            return $files;

        } catch(Exception $e) {
            echo "Error Message: ".$e;
        }    
    }
}

?>