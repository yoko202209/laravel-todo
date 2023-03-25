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
              <a class="btn btn-primary" href="{{route('teams.edit',$team)}}">edit</a>

              <!--ここにメンバーを表示する-->

              <form action="{{route('teams.destroy',$team)}}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger">delete</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection