<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Team;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team, Request $request)
    {
        //

        $keyword = $request->input('keyword');
        if ($keyword == null){
            $keyword = "";
        }

        $todos = Todo::where('team_id', '=',$team->id);
        if(!empty($keyword)) {
            $todos = $todos->where('title', 'LIKE', "%{$keyword}%");
        }
        $todos = $todos->get();

        return view('todos.index',compact('team','todos','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Team $team)
    {
        return view('todos.create',compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Team $team)
    {
        $request->validate([
            'title' => 'required',
        ]);

        
        
        $todo = new todo();
        $todo->title = $request->input('title');
        $todo->user_id = Auth::id();
        $todo->team_id = $team->id;
        $todo->dead_line = $request->input('dead_line');

        $todo->save();

        return redirect()->route('todos.index',$team);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team,todo $todo)
    {
        return view('todos.show',compact('team','todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team,todo $todo)
    {
        $tags = $team->tags;
        return view('todos.edit',['team' => $team, 'todo' => $todo, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Team $team,todo $todo)
    {
        $request->validate([
            'title' => 'required',
        ]);
        
        $todo->title = $request->input('title');
        $todo->user_id = Auth::id();
        $todo->team_id = $team->id;
        $todo->dead_line = $request->input('dead_line');
        $todo->save();

        return redirect()->route('todos.index',$team);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team,todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index',$team);
    }

    public function check(Team $team,todo $todo)
    {
        $todo->is_done = abs($todo->is_done - 1);
        $todo->save();
        return redirect()->route('todos.index',$team);
    }

    public function attach_tag(Request $request, Team $team,Todo $todo)
    {
        $todo->tags()->attach($request->input('tag_id'));

        $tags = $team->tags;
        return view('todos.edit',['team' => $team,'todo' => $todo,'tags' => $tags]);
    }

    public function detach_tag(Team $team,Todo $todo,Tag $tag)
    {
        $todo->tags()->detach($tag->id);
        $tags = $team->tags;
        return view('todos.edit',['team' => $team,'todo' => $todo,'tags' => $tags]);
    }
    
    
}
