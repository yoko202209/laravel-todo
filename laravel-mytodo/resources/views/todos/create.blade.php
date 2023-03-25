<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODOカード作成</title>
  </head>
  <body>
    <header>
      <a href="#">todo</a>
    </header>
    <main>
      <article>
        <div>
          カード作成
        </div>
        <form action="{{route('todos.store')}}" method="POST" >
          @csrf
          <div>
            <label for="title">title:</label>
            <input type="text" id="title" name="title">
          </div>
          <div>
            <label for="dead_line">dead_line:</label>
            <input type="date" id="dead_line" name="dead_line">
          </div>
          <div>
            <label for="is_share">is_share:</label>
            <input type="checkbox" name="is_share" value="1" id="is_share">
          </div>
          <button type="submit">作成</button>
        </form>
      </article>
    </main>
  </body>
</html>