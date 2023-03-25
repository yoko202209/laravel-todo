@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="card col m-3">
        <div class="card-body">
          <h5 class="card-title">チーム作成</h5>
          <form action="{{route('teams.store')}}" method="POST" >
            @csrf
            <div class="mb-3">
              <label class="form-label" for="name">name</label>
              <input class="form-control" type="text" id="name" name="name">
            </div>
            <div class="mb-3">
              <label class="form-label" for="description">description</label>
              <input class="form-control" type="text" id="description" name="description">
            </div>
            <button class="btn btn-success" type="submit">作成</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
