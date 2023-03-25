<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODOカード詳細</title>
  </head>
  <body>
    <header>
      <a href="#">todo</a>
    </header>
    <main>
      <article>
        <div>
          カード詳細
        </div>
        <div>
            <div>
              <p>title{{$todo->title}}</p>
              <p>dead_line:{{$todo->dead_line}}</p>
              <p>is_done:{{$todo->is_done}}</p>
              <p>is_share:{{$todo->is_share}}</p>
            </div>
        </div>
      </article>
    </main>
  </body>
</html>