<form action="/results" class="contact-form">
  <h1>Поиск</h1>
  <label class="input-group">
    <b>Выберите параметр поиска:</b>
    <select name="searchtype" class="custom-select">
      <option value="author">Автор
      <option value="name">Название
      <option value="price">Цена
    </select>
  </label>

  <label class="input-group">
    <b>Поиск</b>
    <input type="text" name="searchterm" class="form-control" value="Ted" required>
  </label>

  <button class="submit-button btn btn-primary" type="submit">Отправить</button>
</form>

<form action="/add" class="contact-form">
  <h1>Добавить книгу</h1>
  <label class="input-group">
    <b>Название</b>
    <input type="text" name="name" class="form-control" value="Harry Potter" required>
  </label>

  <label class="input-group">
    <b>Автор</b>
    <input type="text" name="author" class="form-control" value="J.K.Roaling" required>
  </label>

  <label class="input-group">
    <b>Цена</b>
    <input type="number" name="price" class="form-control" value="10" min="0" required>
  </label>

  <label class="input-group">
    <b>Ссылка картинки</b>
    <input type="text" name="imageurl" class="form-control" value="https://static01.nyt.com/images/2019/11/21/books/best-books-2019-03/best-books-2019-03-superJumbo.jpg?quality=90&auto=webp" required>
  </label>

  <button class="submit-button btn btn-primary" type="submit">Отправить</button>
</form>

<ul class="books-list">
<?
  include $_SERVER['DOCUMENT_ROOT']."/application/core/config.php";
  $query = 'SELECT * FROM books';

  $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

  while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<li class='card'>\n";

    echo'<img class="card-img-top" src="' . $line["imageurl"] .'" alt="'.$line[1].'"/>';
    echo'<div class="card-body">';
    echo'<h5 class="card-title">' . $line["name"] .'</h5>';
    echo'<h3 class="card-text">' . $line["author"] .'</h3>';
    echo'<span class="card-text price badge badge-light">' . $line["price"] .'</span>';
    echo'</div>';
    echo "\t</li>\n";
  }
?>
</ul>
