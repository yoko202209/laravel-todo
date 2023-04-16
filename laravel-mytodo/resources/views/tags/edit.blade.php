@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="card col m-3">
        <div class="card-body">
          <h5 class="card-title">タグ編集</h5>
          <form action="{{route('tags.update',$tag)}}" method="POST" >
            @csrf
            @method('PUT')
            @csrf
            <div class="mb-3">
              <label class="form-label" for="name">name</label>
              <input class="form-control" type="text" id="name" name="name">
            </div>
            <button class="btn btn-success" type="submit">更新</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection