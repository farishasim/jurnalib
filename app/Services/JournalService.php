<?php

namespace App\Services;

use App\Services\GoogleSheetsService;
use Illuminate\Support\Facades\Cache;

class JournalService
{
    private $sheetService;
    
    public function __construct()
    {
        $this->sheetService = new GoogleSheetsService();
    }

    public function getAllJournalName() 
    {
        // return $this->sheetService->getValues(
        //     config('services.google')['spreadsheet_id'], 
        //     config('services.google')['sheets_range']
        // );
        $results = Cache::store('file')->get("journals");
        // var_dump($results);
        return $results;
    }
}

?>