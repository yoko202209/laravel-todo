<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(Team $team)
    {
        //
        $posts = $team->posts;
        return view('posts.index',['team' => $team,'posts' => $posts]);
    }
    

    public function store(Request $request, Team $team)
    {
        //

        $post = new post();
        $post->message = $request->input('message');
        $post->team_id = $team->id;
        $post->user_id = Auth::id();
        $post->save();

        $posts = $team->posts;
        return redirect()->route('posts.index',['team' => $team,'posts' => $posts]);
    }
}
