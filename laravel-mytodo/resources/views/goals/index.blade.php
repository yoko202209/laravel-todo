@extends('layouts.app')

@section('content')
  <div class="container">
    <div>
      カード一覧
    </div>
    <div class="row">
      @foreach($goals as $goal)
        <!-- ここにカードを読み込む -->
        <div class="card col-3 m-3">
          <div class="card-body">
            <h5 class="card-title">{{$goal->title}} {{$goal->dead_line}}</h5>
            <p>{{$goal->is_share ? "public":"private"}}</p>
            <h5>{{$goal->is_done ? "done!":"yet"}} </h5>
            <form action="{{route('goals.check',$goal)}}" method="POST">
              @csrf
                <button class="btn btn-success">check!</button>
            </form>
            <form action="{{route('goals.destroy',$goal)}}" method="POST">
              @csrf
              @method('delete')
              <a class="btn btn-primary" href="{{route('goals.show',$goal)}}">show</a>
              <a class="btn btn-primary" href="{{route('goals.edit',$goal)}}">edit</a>
              <button class="btn btn-danger">delete</button>
            </form>
          </div>
        </div>
      @endforeach
      <a href="{{route('goals.create')}}">カードの作成</a>
    </div>
  </div>
@endsection