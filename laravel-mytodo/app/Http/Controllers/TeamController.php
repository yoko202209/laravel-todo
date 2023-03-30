<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teams = Team::all();
        return view('teams.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $team = new team();
        $team->name = $request->input('name');
        $team->description = $request->input('description');
        $team->manager_user_id = Auth::id();
        $team->save();

        //自分をmemberとして追加
        $member = new Member();
        $member->user_id = Auth::id();
        $member->team_id = $team->id;
        $member->save();

        return redirect()->route('teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        $members = Member::where('team_id',$team->id)
            ->join('users','users.id','=','members.user_id')
            ->select('users.name')
            ->get();
        return view('teams.show',['team' => $team,'members' => $members]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $members = Member::where('team_id',$team->id)
            ->join('users','users.id','=','members.user_id')
            ->select('users.name')
            ->get();
        return view('teams.edit',['team' => $team,'members' => $members]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $team->name = $request->input('name');
        $team->description = $request->input('description');
        $team->manager_user_id = Auth::id();
        $team->save();

        return redirect()->route('teams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index');
    }

    public function add_user(Team $team, User $user)
    {
        $team->users()->attach($user);
    }
    
}
