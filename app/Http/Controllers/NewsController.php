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
    public function index()
    {
        
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
