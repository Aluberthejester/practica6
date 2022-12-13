<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use App\Models\Player;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracks = Track::orderBy('id', 'DESC')->paginate(3);
        return view('tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tracks = Track::paginate(5);
        return view('tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:tracks',
            'player_id' => 'required|max:255',
            'path' => 'required|file|mimes:mp3,mp4,wav,mid',
        ]);
        $path = 'public/paths/music.mp3';
        if($request->hasFile('path'))
            $path = $request->path->store('public/paths');
        $track = Track::create([
            'title' => $request->title,
            'player_id' => $request->player_id,
            'path' => $path,
        ]);
        $track->save();
        return redirect()->route('tracks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        return view('tracks.edit', compact('track'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Track $track)
    {
        $request->validate([
            'title' => 'required|max:100',
            ]);
            $track->fill([
            'title' => $request->title,
            ]);
            $track->save();
            return redirect()->route('tracks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        $track->delete();
        return redirect()->route('tracks.index');
    }
}
