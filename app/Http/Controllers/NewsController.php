<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\News;
use Inertia\Inertia;    
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getNews()
    {
        $id = Auth::id(); 
        $role = Auth::user()->role;

        if($role == 'admin') {
            return DB::table('news')
                ->join('users', 'news.user_id', '=', 'users.id')
                ->where('news.status', '!=', 'Draft') 
                ->select('news.*', 'users.name as author_name')
                ->get();
        } else {
            return DB::table('news')
                ->join('users', 'news.user_id', '=', 'users.id')
                ->where('news.user_id', $id)
                ->select('news.*', 'users.name as author_name')
                ->get();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    protected function submissionCount() 
    {
        $id = Auth::id();
        $role = Auth::user()->role;

        if($role == 'admin')
        {
            return DB::table('news')
                ->where('news.status', '!=', 'Draft ') 
                ->count();
        } else {
            return DB::table('news')
                ->where('user_id', $id)
                ->count();
        }
    }

    protected function approvedCount()
    {
        $id = Auth::id();
        $role = $role = Auth::user()->role;

        if($role == 'admin') {
            return DB::table('news')
                ->where('news.status', '=', 'Approved') 
                ->count();
        } else {
            return DB::table('news')
                ->where('user_id', $id)
                ->count();
        }
    }

    protected function pendingCount()
    {
        $id = Auth::id();   
        $role = Auth::user()->role;

        if($role == 'admin')
        {
            return DB::table('news')
                ->where('news.status', '=', 'Pending')
                ->count();
        } else {
            return DB::table('news')
                ->where('status', 'Pending')
                ->where('user_id', $id)
                ->count();
        }
    }
    protected function draftCount()
    {   
        $id = Auth::id();
        return DB::table('news')
            ->where('status', 'Draft')
            ->where('user_id', $id)
            ->count();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required', 
            'body' => 'required',
            'attachments' => 'nullable|file|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('attachments')) {
            $filePath = $request->file('attachments')->store('attachments', 'public'); 
            $data['attachments'] = $filePath;
        }

        $data['user_id'] = Auth::id();
        News::create($data);

        return redirect(Auth::user()->role === 'admin' ? '/admin' : '/user');
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
        $data = $request->validate([
            'status' => 'required'
        ]);

        $news = News::findOrFail($id);
        $news->status = $request->input('status'); 
        $news->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        $news->delete();
    }
}
