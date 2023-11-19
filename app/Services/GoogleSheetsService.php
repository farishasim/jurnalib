<?php

namespace App\Services;

use Google\Client;
use Google\Service\Drive;
use Google_Service_Sheets;
use Exception;

class GoogleSheetsService
{
    private function getValues($spreadsheetId, $range)
    {
        /* Load pre-authorized user credentials from the environment.
            TODO(developer) - See https://developers.google.com/identity for
            guides on implementing OAuth2 for your application. */
        $client = new Client();
        $client->useApplicationDefaultCredentials();
        $client->addScope(Drive::DRIVE);
        $service = new Google_Service_Sheets($client);
        $result = $service->spreadsheets_values->get($spreadsheetId, $range);
        try{
            $numRows = $result->getValues() != null ? count($result->getValues()) : 0;
            printf("%d rows retrieved.", $numRows);
            return $result;
        }
        catch(Exception $e) 
        {
            // TODO(developer) - handle error appropriately
            echo 'Message: ' .$e->getMessage();
        }
    }

    public function getAllJournalName() 
    {
        return ["journal 1", "journal 2", "journal 3"];
    }
}

?>