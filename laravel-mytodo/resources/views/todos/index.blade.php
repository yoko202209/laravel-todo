@extends('layouts.app')

@section('content')
  <div class="container">
    <div>
      {{$team->name}} カード一覧
    </div>
    <div class="row">
      @foreach($team->todos as $todo)
        <!-- ここにカードを読み込む -->
        <div class="col-12 col-lg-4">
          <div class="card p-1 m-1">
            <div class="card-body">
              <h5 class="card-title">{{$todo->title}} </h5>
              <p>{{$todo->is_share ? "public":"private"}}</p>
              <p>{{$todo->dead_line}}</p>
              <h5>{{$todo->is_done ? "done!":"yet"}} </h5>
              <form action="{{route('todos.check',$todo)}}" method="POST">
                @csrf
                  <button class="btn btn-success">check!</button>
              </form>
              <form action="{{route('todos.destroy',$todo)}}" method="POST">
                @csrf
                @method('delete')
                <a class="btn btn-primary" href="{{route('todos.show',$todo)}}">show</a>
                <a class="btn btn-primary" href="{{route('todos.edit',$todo)}}">edit</a>
                <button class="btn btn-danger">delete</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
      <a href="{{route('todos.create',$team)}}">カードの作成</a>
    </div>
  </div>
@endsection