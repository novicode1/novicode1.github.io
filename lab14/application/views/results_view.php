<h1>Результаты поиска</h1>
<a href="/" class="go-back">Вернуться назад</a>
<ul class="books-list">
<?
  include $_SERVER['DOCUMENT_ROOT']."/application/core/config.php";
  $url = "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $parts = parse_url($url);
  parse_str($parts['query'], $query);

  $searchtype = $query['searchtype'];
  $searchterm = $query['searchterm'];
  if (!$searchtype || !$searchterm) {
    echo "Вы не ввели критерии поиска. Вернитесь назад и попробуйте еще раз"; exit();
  }

  if ($searchtype == 'price') {
    $query = 'SELECT * FROM books WHERE ' . $searchtype . " = '" . $searchterm . "'";
  }
  else {
    $query = 'SELECT * FROM books WHERE ' . $searchtype . " LIKE '%" . $searchterm . "%'";
  }

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
</body> </html>
