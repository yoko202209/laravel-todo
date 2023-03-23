<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODOカード編集</title>
  </head>
  <body>
    <header>
      <a href="#">todo</a>
    </header>
    <main>
      <article>
        <div>
          カード編集
        </div>
        <form action="">
          <div>
            <label for="title">title:</label>
            <input type="text" id="title" value="{{$goal->title}}">
          </div>
          <div>
            <label for="dead_line">dead_line:</label>
            <input type="date-local" id="dead_line" value="{{$goal->dead_line}}">
          </div>
          <div>
            <label for="is_share">is_share:</label>
            <input type="checkbox" name="is_share" value="1" id="is_share" {{$goal->is_share ? 'checked' : '' }}>
          </div>
          <button type="submit">変更</button>
        </form>
      </article>
    </main>
  </body>
</html>