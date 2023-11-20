<?php

namespace App\Http\Controllers;

use App\Services\JournalService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journals = new JournalService();
        // Main Page
        return Inertia::render("Home", [
            "journalList" => $journals->getAllJournalName(),
        ]);
    }
}
