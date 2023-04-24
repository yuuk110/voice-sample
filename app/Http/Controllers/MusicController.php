<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $musics = Music::all();
        return view('/index', ['musics' => $musics]);
    }

    public function upload(Request $request)
    {
        $music = Music::create([
            'title' => $request->title,
            'odai'  => $request->odai,
            'filename'  => $request->file,
        ]);

        if ($request->file('file')->isValid()) {
            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('public', $filename);
            $music->filename = $filename;
            $music->save();
        }

        return redirect('/index');
    }

    public function play($filename)
    {
        $path = storage_path('app/public/' . $filename);
        return response()->file($path);
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
