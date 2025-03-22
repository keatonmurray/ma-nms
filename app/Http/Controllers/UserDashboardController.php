<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;    
use Illuminate\Support\Facades\Auth;
use App\Models\News;

class UserDashboardController extends NewsController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::id(); 

        $news = $this->getNews();
        $newsCount =  $this->submissionCount();
        $approvedCount = $this->approvedCount();
        $pendingNews = $this->pendingCount();
        $draftedNews = $this->draftCount();

        return Inertia::render('UserDashboard', [
            'id' => $id,
            'news' => $news,
            'newsCount' => $newsCount,
            'approvedCount' => $approvedCount,
            'pendingNews' => $pendingNews,
            'draftedNews' => $draftedNews,
            'user' => Auth::user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $entry = $this->showEntry($id);
        
        return Inertia::render('UserDashboard', [
            'entry' => $entry
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
