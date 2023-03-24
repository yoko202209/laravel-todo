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
              <p>title:{{$goal->title}}</p>
              <p>dead_line:{{$goal->dead_line}}</p>
              <p>is_done:{{$goal->is_done}}</p>
              <p>is_share:{{$goal->is_share}}</p>
            </div>
          @endforeach
        </div>
      </article>
    </main>
  </body>
</html>