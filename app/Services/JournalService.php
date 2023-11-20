<?php

namespace App\Services;

use Google\Client;
use Google\Service\Drive;
use Google\Service\Sheets;
use Google_Service_Sheets;

use Exception;

class JournalService
{
    private function getValues($spreadsheetId, $range)
    {
        try{
            $client = new Client();
            $client->useApplicationDefaultCredentials();
            $client->addScope(Google_Service_Sheets::SPREADSHEETS_READONLY);
            $client->setAuthConfig(config('services.google')["sheets_credential"]);

            $service = new Google_Service_Sheets($client);
            $params = [
                // 'majorDimension'=>'COLUMNS'
            ];
            $result = $service->spreadsheets_values->get($spreadsheetId, $range, $params);
            
            return $result->getValues();
        }
        catch(Exception $e) 
        {
            echo 'Message: ' .$e->getMessage();
        }
    }

    public function getAllJournalName() 
    {
        return $this->getValues('1t0D7lgbyZt-NnZ3ZxTxHIwuc6WVnFAsMAXpo7al1Deg', 'RANKING LIST!D7:I51');
    }
}

?>