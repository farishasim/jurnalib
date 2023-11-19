<?php

namespace App\Http\Controllers;

use App\Services\GoogleSheetsService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sheet = new GoogleSheetsService();
        // Main Page
        return Inertia::render("Home", [
            "journalList" => $sheet->getAllJournalName(),
        ]);
    }
}
