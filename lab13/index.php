<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<title>Daniil Novikov</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <style>
    body {
      text-align: center;
    }
    span {
      border-radius: 6px;
      box-shadow: 0px 2px 10px 2px rgba(0,0,0,0.06);
      display: block;
      max-width: 300px;
      margin: 0 auto 10px;
      padding: 12px;
      box-sizing: border-box;
      text-align: left;
    }

    h6 {
      margin-left: 4px;
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.8em;
      margin-top: 0.5em;
      color: orange;
    }

    h3 {
      font-size: 1.3em;
    }

    ol, ul {
      text-align: left;
      font-weight: 400;
    }

    ul li:last-child {
      display: none;
    }

    h3 {
      padding-top: 10px;
    }

    div span:first-child {
      box-shadow: none;
      font-size: 1.2em;
      font-weight: 600;
      color: #1963ec;
    }

    div {
      display: inline-block;
      vertical-align: top;
      max-width: 400px;
    }
  </style>

</head>
<body>
<h3>Тема: продуктовый магазин</h3>
<?

class Product {
  public $name;
  public $price;

  function getName($name) {
    return $this->name;
  }

  function setName($name) {
    $this->name = $name;
  }

  function getPrice($price) {
    return $this->price;
  }

  function setPrice($price = 100) {
    $this->price = $price;
  }
}

class Employee {
  public $position;
  public $startAt;
  public $years;
  public $firstName;
  public $lastName;

  function __construct($first, $last, $position, $startAt, $years) {
    $this->firstName = $first;
    $this->lastName = $last;
    $this->position = $position;
    $this->startAt = $startAt;
    $this->years = $years;
  }

  function showPosition() {
    echo '<span>' . $this->firstName.": ";
    echo "занимает позицию '".$this->position."'<br></span>";
  }

  function getBirthDate() {
    echo ('<span>' . $this->firstName . ' родился в ' . ($this->startAt - $this->years) . ' году <br></span>');
  }

  function getFullName() {
    echo '<span>Полное имя: '.$this->firstName . ' '. $this->lastName . '<br></span>';
  }
}

class Milk extends Product {
  public $calories;
  public $units;
  public $fatСontent;
  public $totalCalories;

  function __construct($name, $calories=20, $units=33, $fatСontent='30%') {
    $this->name = $name;
    $this->calories = $calories;
    $this->units = $units;
    $this->fatСontent = $fatСontent;
  }

  function getTotalCalories() {
    echo '<span>Cумма калорий для молока "' . $this->name . '" это ';
    echo $this->fatСontent * $this->units . '<br></span>';
  }
}

class Pasta extends Product {
  public $name;
  public $length;

  function __construct($name, $length=15) {
    $this->name = $name;
    $this->length = $length;
  }

  function getInfo() {
    echo '<span>Вид макарон - ' . $this->name;
    echo '<br>Длина макарон ' . $this->length . '<br></span>';
  }
}
echo '<div>';
echo '<span>Вывод информации из классов</span>';

$product= new Product();
$daniil= new Employee("Даниил","Новиков", "Продавец", 2020, 19);
$daniil->showPosition();
$daniil->getFullName();
$daniil->getBirthDate();

$michael= new Employee("Михаил", "Шевчук","Менеджер", 2016, 20);
$michael->getFullName();
$michael->getBirthDate();

$korivka = new Milk('korivka', 25, 40, "30%");
$best = new Milk('Лучшее молоко', 45, 30, "60%");
$pasta = new Pasta('Спагетти', 10);

$pasta->getInfo();
$korivka->getTotalCalories();
$best->getTotalCalories();
echo '</div>';
?>
<div>
  <span>Информация по классам</span>
  <ol>
    <li>
      <h3><? print_r(get_class($best));?></h3>
      <h6>Методы</h6>
      <ul>
          <?
            for ($i = 0; $i <= sizeof(get_class_methods($best)); $i++) {
              print_r('<li>' . get_class_methods($best)[$i] . '</li>');
            }
          ?>
      </ul>
    </li>
    <li>
      <h3><? print_r(get_class($pasta));?></h3>
      <h6>Методы</h6>
      <ul>
          <?
            for ($i = 0; $i <= sizeof(get_class_methods($pasta)); $i++) {
              print_r('<li>' . get_class_methods($pasta)[$i] . '</li>');
            }
          ?>
      </ul>
    </li>
    <li>
      <h3><? print_r(get_class($product));?></h3>
      <h6>Методы</h6>
      <ul>
          <?
            for ($i = 0; $i <= sizeof(get_class_methods($product)); $i++) {
              print_r('<li>' . get_class_methods($product)[$i] . '</li>');
            }
          ?>
      </ul>
    </li>
    <li>
      <h3><? print_r(get_class($daniil));?></h3>
      <h6>Методы</h6>
      <ul>
          <?
            for ($i = 0; $i <= sizeof(get_class_methods($daniil)); $i++) {
              print_r('<li>' . get_class_methods($daniil)[$i] . '</li>');
            }
          ?>
      </ul>
    </li>
  </ol>
</div>
</body>
</html>
