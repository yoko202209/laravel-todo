@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="card col m-3">
        <div class="card-body">
          <h5 class="card-title">カード作成</h5>
          <form action="{{route('todos.store')}}" method="POST" >
            @csrf
            <div class="mb-3">
              <label class="form-label" for="title">title</label>
              <input class="form-control" type="text" id="title" name="title">
            </div>
            <div  class="mb-3">
              <label class="form-label" for="dead_line">dead_line</label>
              <input class="form-control" type="date" id="dead_line" name="dead_line">
            </div>
            <button class="btn btn-success" type="submit">作成</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
