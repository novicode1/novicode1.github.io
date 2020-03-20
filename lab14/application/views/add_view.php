
<?
  include $_SERVER['DOCUMENT_ROOT']."/application/core/config.php";
  $url = "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $parts = parse_url($url);
  parse_str($parts['query'], $query);

  $name = $query['name'];
  $author = $query['author'];
  $price = $query['price'];
  $imageurl = $query['imageurl'];

  if (!$name || !$author || !$price || !$imageurl) {
    echo "Вы не ввели критерии поиска. Вернитесь назад и попробуйте еще раз"; exit();
  }
  else {
    echo "<h1>Книга добавлена</h1>";
  }

  echo "<a href='/' class='go-back'>Вернуться назад</a>";

  $query = "INSERT INTO books VALUES (NEXTVAL('mysequence'),'" . $name . "','" . $author . "','" . $price . "','" . $imageurl . "')";

  $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
?>
</body> </html>
