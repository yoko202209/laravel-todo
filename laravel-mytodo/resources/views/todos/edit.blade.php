@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="card col m-3">
        <div class="card-body">
          <h5 class="card-title">カード編集</h5>
          <form action="{{route('todos.update',['team' => $team,'todo' => $todo])}}" method="POST" >
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
            <button class="btn btn-success" type="submit">更新</button>
          </form>
          <hr>

          
          <!--ここからタグ編集フォーム-->
          <form action="{{route('todos.add_tag',[ 'team' => $team ,'todo' => $todo])}}" method="POST" >
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label" for="tag_id">タグ</label>    
              <select class="form-select" id="tag_id" name="tag_id">
                @foreach($tags as $tag)
                  <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
              </select>
            </div>
            <button class="btn btn-success" type="submit">追加</button>
          </form>
        </div>
        
      </div>
    </div>
  </div>
@endsection