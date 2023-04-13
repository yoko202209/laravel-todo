@extends('layouts.app')

@section('content')
  <div class="container">
    
    <p>{{$team->name}} </p>
    <div class="col m-3">
      <div class="card">
        <div class="card-header">
          チーム内TODOリスト
        </div>
        <div class="card-body">
          <ul>
            @foreach ($todos as $todo)
              <li>{{ $todo->title }}
              <!--もし自分のtodoの場合はボタンで更新できるように-->
              </li>
            @endforeach
            <a class="btn btn-primary" href="{{route('todos.index',$team)}}">todo一覧へ移動</a>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      
      <!--
      <div class="col m-3">
        <div class="card">
          <div class="card-header">
            チャットルーム
          </div>
          <div class="card-body">
            ここにチャット機能
          </div>
        </div>
      </div>
      -->
      
      <div class="col m-3">
        <div class="card">
          <div class="card-header">
            チーム詳細
          </div>
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
  </div>
@endsection