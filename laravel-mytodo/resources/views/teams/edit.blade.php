@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      @if (session('success'))
          <div class="alert alert-success">{{session('success')}}</div>
      @endif
      @if (session('error'))
          <div class="alert alert-danger">{{session('error')}}</div>
      @endif
      <div class="card col m-3">
        <div class="card-body">
          <h5 class="card-title">チーム編集</h5>
          <form action="{{route('teams.update',$team)}}" method="POST" >
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label" for="name">name</label>
              <input class="form-control" type="text" id="name" name="name" value="{{$team->name}}">
            </div>
            <div class="mb-3">
              <label class="form-label" for="description">description</label>
              <input class="form-control" type="text" id="description" name="description" value="{{$team->description}}">
            </div>
            <button class="btn btn-success" type="submit">更新</button>
          </form>
        </div>
      </div>

      
      <div class="card col m-3">
        <div class="card-body">
          <h5 class="card-title">メンバーの管理</h5>
          <p>現在のメンバー</p>
          <!--ここにメンバーを表示-->
          <ul>
            @foreach ($members as $member)
              <li>{{ $member->name }}</li>
            @endforeach
          </ul>
          @if(Auth::id() == $team->manager_user_id)
          <form action="{{route('member.store',$team)}}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="user_id">user_id</label>
              <input class="form-control" type="text" id="user_id" name="user_id">
            </div>
            <button class="btn btn-success" type="submit">メンバーの追加</button>
          </form>
          @endif
        </div>
      </div>

    </div>
  </div>
@endsection