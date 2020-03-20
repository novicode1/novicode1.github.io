<?php
  function get_all_string_between($string, $start, $end) {
    $result = array();
    $string = " ".$string;
    $offset = 0;
    while(true) {
      $ini = strpos($string,$start,$offset);
      if ($ini == 0)
          break;
      $ini += strlen($start);
      $len = strpos($string,$end,$ini) - $ini;
      $result[] = substr($string,$ini,$len);
      $offset = $ini+$len;
    }
    return $result;
  }

  $file_string = file_get_contents('https://www.gismeteo.ua/weather-kyiv-4944/');

  $cityName = get_all_string_between($file_string, '<span property="name">', '</span>');
  $date = get_all_string_between($file_string, '<span class="">', '</span>');

  $sun = get_all_string_between($file_string, '<div class="id_item">', '</div>');
  $dayDuration = get_all_string_between($file_string, '<div class="id_item title">', '</div>');

  $temperatures = get_all_string_between($file_string, '<span class="unit unit_temperature_c">', '</span>');
?>
<section class="weather-section">
  <h1><? print_r($cityName[sizeof($cityName) - 1]) ?></h1>
  <date class="date badge badge-primary"><? print_r($date[0]) ?></date>
  <hr>

  <ul class="weater-list-info">
    <li>
      <b><? print_r($sun[0]) ?></b>
    </li>
    <li>
      <b><? print_r($sun[1]) ?></b>
    </li>
    <li>
      <b><? print_r($dayDuration[0]) ?></b>
    </li>
  </ul>
  <hr>
  Температура в течение дня:
  <ul>
    <?
      $hoursCount = 2;
      for ($i = 6; $i < 14 ; $i++) {
        $hoursCount += 3;
        echo '<li>
          <span class="badge badge-secondary">' .
            $hoursCount . 'ч:  <span class="badge badge-light">' . $temperatures[$i] . '</span>
          </span>
        </li>';
      }
    ?>
  </ul>
</section>
