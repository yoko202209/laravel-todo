@extends('layouts.app')

@section('content')
  <div class="container">
    <div>
      チーム一覧
    </div>
    <div class="row">
      @foreach($teams as $team)
        <div class="col-12 col-lg-4">
          <div class="card p-1 m-1">
            <div class="card-body">
              <h5 class="card-title">{{$team->name}} </h5>
              <p>{{$team->description}}</p>
              <a class="btn btn-primary" href="{{route('teams.show',$team)}}">show</a>
            </div>
          </div>
        </div>
      @endforeach
      <a href="{{route('teams.create')}}">チームの作成</a>
    </div>
  </div>
@endsection