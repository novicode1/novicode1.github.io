<?
  $serviceChoise = $_POST['serviceChoise'];
  $callback = $_POST['callback'];
  $url = "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $parts = parse_url($url);
  parse_str($parts['query'], $query);
  echo
  '<div class="alert-success">
    <h1>Форма отправлена!</h1>
    <b>Ваша информация: </b>' . $query['callback'] .
    '<br>
    <b>Заказ на: </b>' . $query['serviceChoise'] . '</div>';
?>
