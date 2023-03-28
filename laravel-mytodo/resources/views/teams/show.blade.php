@extends('layouts.app')

@section('content')
  <div class="container">
    
    <p>チーム詳細</p>
    <div class="row">
      <div class="col m-3">
        <div class="card">
          <div class="card-body">
              <h5 class="card-title">{{$team->name}} </h5>
              <p>{{$team->description}}</p>
              <p>manager_id:{{$team->manager_user_id}}</p>

              <!--ここにメンバーを表示する-->
              <p>現在のメンバー</p>
              <ul>
                @foreach ($members as $member)
                  <li>{{ $member->name }}</li>
                @endforeach
              </ul>
              <a class="btn btn-primary" href="{{route('teams.edit',$team)}}">edit</a>
              
          </div>
        </div>
      </div>
    </div>
    <div>
      <form action="{{route('teams.destroy',$team)}}" method="POST">
        @csrf
        @method('delete')
        <p><b>DANGER</b> チームの削除</p>
        <button class="btn btn-danger">delete</button>
      </form>
    </div>
  </div>
@endsection