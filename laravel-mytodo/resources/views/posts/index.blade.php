@extends('layouts.app')

@section('content')
  <div class="container">
    <div>
      {{$team->name}} のチャットルーム
    </div>

    <div class="col m-3">
      <div class="card">
        <div class="card-header">
          {{$team->name}} のチャットルーム
        </div>
        <div class="card-body">
          <div>
            @forelse($posts as $post)
                <p><span class="text-primary">{{$post->user->name}}</span> {{$post->message}} <span class="text-muted">:{{$post->created_at}}</span></p>
            @empty
                まだ誰もチャットをしていません。
            @endforelse
            <hr>
            <form action="{{route('posts.store',$team)}}" method="POST">
              @csrf
              <div class="mb-3">
                <input class="form-control" type="text" id="message" name="message">
              </div>
              <button class="btn btn-success" type="submit">送信</button>
            </form>
        </div>
      </div>  
    </div>

  </div>
@endsection