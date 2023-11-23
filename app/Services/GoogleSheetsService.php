<?php

namespace App\Services;

use Exception;
use Google\Client;
use Google_Service_Sheets;

class GoogleSheetsService
{
    private $service;

    public function __construct()
    {
        try {
            $client = new Client();
            $client->useApplicationDefaultCredentials();
            $client->addScope(Google_Service_Sheets::SPREADSHEETS_READONLY);
            $client->setAuthConfig(config('services.google')['service_account']);

            $this->service = new Google_Service_Sheets($client);
        }
        catch (Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }

    public function getValues($spreadsheetId, $range)
    {
        try{
            $params = [
                // 'majorDimension'=>'COLUMNS'
            ];
            $result = $this->service->spreadsheets_values->get($spreadsheetId, $range, $params);
            
            return $result->getValues();
        }
        catch(Exception $e) 
        {
            echo 'Message: ' .$e->getMessage();
        }
    }
}

?>