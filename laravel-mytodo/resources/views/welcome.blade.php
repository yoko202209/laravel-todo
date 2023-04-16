@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        <h1>TODOアプリトップページ（仮）</h1>
    </div>
    <div>
        <a class="btn btn-primary" href="{{ route('teams.index') }}">チーム一覧</a>
        <a class="btn btn-primary" href="{{ route('tags.index') }}">タグ一覧</a>
    </div>
</div>
@endsection