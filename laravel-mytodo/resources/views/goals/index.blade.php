<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODOカード一覧</title>
  </head>
  <body>
    <header>
      <a href="#">todo</a>
    </header>
    <main>
      <article>
        <div>
          カード一覧
        </div>
        <div>
          @foreach($goals as $goal)
            <!-- ここにカードを読み込む -->
            <hr>
            <div>
              <p>{{$goal->title}} {{$goal->dead_line}} {{$goal->is_share ? "public":"private"}}</p>
              <p>{{$goal->is_done ? "done!":""}}</p>
              <a href="{{route('goals.show',$goal)}}">閲覧</a>
              <a href="{{route('goals.edit',$goal)}}">編集</a>
              <form action="{{route('goals.destroy',$goal)}}" method="POST">
                @csrf
                @method('delete')
                <button>削除</button>
              </form>
            </div>
          @endforeach
          <a href="{{route('goals.create')}}">カードの作成</a>
        </div>
      </article>
    </main>
  </body>
</html>