<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;    
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends NewsController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::id(); 

        $news = $this->getNews();
        $submissionCount = $this->submissionCount();
        $approvedCount = $this->approvedCount();
        $pendingCount = $this->pendingCount();

        return Inertia::render('AdminDashboard', [
            'user' => Auth::user(),
            'id' => $id,
            'news' => $news,
            'submissionCount' => $submissionCount,
            'approvedCount' => $approvedCount,
            'pendingCount' => $pendingCount
        ]);
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       dd('test');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
