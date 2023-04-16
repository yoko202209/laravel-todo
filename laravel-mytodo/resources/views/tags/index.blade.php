@extends('layouts.app')

@section('content')
  <div class="container">
    <div>
      タグ一覧
    </div>
    <div class="row">
      @foreach($tags as $tag)
        <div class="col-12 col-lg-4">
          <div class="card p-1 m-1">
            <div class="card-body">
              <p>{{$tag->name}}</p>
              <form action="{{route('tags.destroy',$tag)}}" method="POST">
                @csrf
                @method('delete')
                <a class="btn btn-primary" href="{{route('tags.show',$tag)}}">show</a>
                <a class="btn btn-primary" href="{{route('tags.edit',$tag)}}">edit</a>
                <button class="btn btn-danger">delete</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
      <a href="{{route('tags.create')}}">タグの作成</a>
    </div>
  </div>
@endsection