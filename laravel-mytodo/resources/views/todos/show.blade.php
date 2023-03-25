@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col m-3">
        <div class="card">
          <div class="card-body">
              <h5 class="card-title">カード詳細</h5>
              <div>
                <p>title{{$todo->title}}</p>
                <p>dead_line:{{$todo->dead_line}}</p>
                <p>is_done:{{$todo->is_done}}</p>
                <p>is_share:{{$todo->is_share}}</p>
              </div>
          </div>
      </div>
      </div>
    </div>
  </div>
@endsection