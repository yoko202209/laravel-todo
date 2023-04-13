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
      
      <div class="col m-3">
        <div class="card">
          <div class="card-header">
            チーム内TODOリスト
          </div>
          <div class="card-body">
            ここにTODOリスト（メンバーごとに表示する）
          </div>
        </div>
      </div>

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
    </div>
  </div>
@endsection