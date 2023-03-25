@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="card col m-3">
        <div class="card-body">
          <h5 class="card-title">チーム編集</h5>
          <form action="{{route('teams.update',$todo)}}" method="POST" >
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label" for="title">title</label>
              <input class="form-control" type="text" id="title" name="title">
            </div>
            <div  class="mb-3">
              <label class="form-label" for="dead_line">dead_line</label>
              <input class="form-control" type="date" id="dead_line" name="dead_line">
            </div>
            <div class="mb-3">
              <input class="form-check-input" type="checkbox" name="is_share" value="1" id="is_share">
              <label class="form-check-label" for="is_share">is_share</label>
            </div>
            <button class="btn btn-success" type="submit">更新</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection