<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;    
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::id(); 
        $news = DB::table('news')
            ->join('users', 'news.user_id', '=', 'users.id')
            ->select('news.*', 'users.name as author_name')
            ->get();

        return Inertia::render('AdminDashboard', [
            'id' => $id,
            'news' => $news
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
