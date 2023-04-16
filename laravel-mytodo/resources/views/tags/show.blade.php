@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col m-3">
        <div class="card">
          <div class="card-body">
              <h5 class="card-title">タグ詳細</h5>
              <div>
                <p>name: {{$tag->name}}</p>
              </div>
          </div>
      </div>
      </div>
    </div>
  </div>
@endsection