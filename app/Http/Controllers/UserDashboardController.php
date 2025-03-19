<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;    
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::id(); 

        $news = DB::table('news')
            ->join('users', 'news.user_id', '=', 'users.id')
            ->where('news.user_id', $id)
            ->select('news.*', 'users.name as author_name')
            ->get();

        $newsCount = DB::table('news')
            ->where('user_id', $id)
            ->count();

        $approvedNews = DB::table('news')
            ->where('status', 'Approved')
            ->count();
        
        $pendingNews = DB::table('news')
            ->where('status', 'Pending')
            ->count();

        $draftedNews = DB::table('news')
            ->where('status', 'Draft')
            ->count();

        return Inertia::render('UserDashboard', [
            'id' => $id,
            'news' => $news,
            'newsCount' => $newsCount,
            'approvedNews' => $approvedNews,
            'pendingNews' => $pendingNews,
            'draftedNews' => $draftedNews
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
        //
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
