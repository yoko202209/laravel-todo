<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team)
    {
        //
        $todos = $team->todos;
        return view('todos.index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
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

        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(todo $todo)
    {
        return view('todos.show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(todo $todo)
    {
        return view('todos.edit',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, todo $todo, Team $team)
    {
        $request->validate([
            'title' => 'required',
        ]);
        
        $todo->title = $request->input('title');
        $todo->user_id = Auth::id();
        $todo->team_id = $team->id;
        $todo->dead_line = $request->input('dead_line');
        $todo->save();

        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index');
    }

    public function check(todo $todo)
    {
        $todo->is_done = abs($todo->is_done - 1);
        $todo->save();
        return redirect()->route('todos.index');
    }
}
