@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="card col m-3">
        <div class="card-body">
          <h5 class="card-title">カード編集</h5>
          <form action="{{route('todos.update',$todo)}}" method="POST" >
            @csrf
            @method('PUT')
            <div>
              <label for="title">title:</label>
              <input type="text" id="title" name="title" value="{{$todo->title}}">
            </div>
            <div>
              <label for="dead_line">dead_line:</label>
              <input type="date" id="dead_line" name="dead_line" value="{{$todo->dead_line}}">
            </div>
            <div>
              <label for="is_share">is_share:</label>
              <input type="checkbox" name="is_share" value="1" id="is_share" {{$todo->is_share ? "checked" : ""}}>
            </div>
            <button type="submit">更新</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection