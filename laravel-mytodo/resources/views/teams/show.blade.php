@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col m-3">
        <div class="card">
          <div class="card-body">
              <h5 class="card-title">チーム詳細</h5>
              <div>
                <p>name{{$team->name}}</p>
                <p>descriotion:{{$team->description}}</p>
                <p>manager:{{$team->manager_user_id}}</p>
              </div>
          </div>
      </div>
      </div>
    </div>
  </div>
@endsection