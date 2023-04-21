<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Team;

use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team)
    {
        //
        $tags = $team->tags;
        return view('tags.index',['team' => $team,'tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Team $team)
    {
        //dd($team);//ここには入っている
        return view('tags.create', ['team' => $team]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Team $team)
    {
        //

        $tag = new tag();
        $tag->name = $request->input('name');
        $tag->team_id = $team->id;
        $tag->save();

        $tags = $team->tags;
        return redirect()->route('tags.index',['team' => $team,'tags' => $tags]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team, Tag $tag)
    {
        //
        return view('tags.show',['team' => $team,'tag' => $tag]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team, Tag $tag)
    {
        //
        return view('tags.edit',['team' => $team,'tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team, Tag $tag)
    {
        
        $tag->name = $request->input('name');
        $tag->save();

        $tags = $team->tags;
        return redirect()->route('tags.index',['team' => $team,'tags' => $tags]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team, Tag $tag)
    {
        $tag->delete();
        
        $tags = $team->tags;
        return redirect()->route('tags.index',['team' => $team,'tags' => $tags]);
    }
}
