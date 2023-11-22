<?php

namespace App\Services;

use App\Services\GoogleSheetsService;

class JournalService
{
    private $sheetService;
    
    public function __construct()
    {
        $this->sheetService = new GoogleSheetsService();
    }

    public function getAllJournalName() 
    {
        return $this->sheetService->getValues(
            config('services.google')['spreadsheet_id'], 
            config('services.google')['sheets_range']
        );
    }
}

?>