<!DOCTYPE html>
<?php include("includes/a_config.php");?>
<html>
	<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("includes/head-tag-contents.php");?>
    <style>
      .alert {
        display: block;
      }
    </style>
	</head>
<body>
	<?php include("includes/navigation.php");?>

	<div class="container main-content">
    <h1>String Cut</h1>
    <hr>
		<h6>
      <?php
        include("includes/a_config.php");

        function shorten_string($string, $wordsreturned) {
          $result = "";
          $result = iconv('utf-8', 'windows-1251', $result);

          $words = explode(" ", $string);
          $words = array_filter($words, function($value) { return $value !== ''; });
          foreach ($words as $w) {
            if (mb_strlen($w) >= $wordsreturned) {
              $result .= mb_substr($w, 0, $wordsreturned).'* ';
            }
            else {
              $result .= $w . ' ';
            }
          }

          return $result;
        }
        echo '<span class="alert alert-warning">' . shorten_string('я купил бронетранспортер вчера', 7) . '</span>'
      ?>
      <hr>
      <?php
        function countSentences($sentences) {
          $y = "";
          $numberOfSentences = 1;
          $numberOfWords = 1;

          $sentences = preg_split('/(?<=[.!?]|[.!?][\'"])\s+/', $sentences);
          // $sentences = array_pop($sentences);

          foreach ($sentences as $sentence) {
            $numberOfSentences++;
            // mb_strlen($word);

            $words = preg_split('/\s+/',$word,-1,PREG_SPLIT_NO_EMPTY);

            foreach ($words as $word) {
              $numberOfWords++;
            }
          }
          return $numberOfSentences / $numberOfWords;
        }

        function mb_strrev($str){
          $r = '';
          for ($i = mb_strlen($str); $i>=0; $i--) {
              $r .= mb_substr($str, $i, 1);
          }
          return $r;
        }

        if ($fh = fopen('text.txt','r')) {
          while (! feof($fh)) {
            if ($s = fgets($fh)) {
              echo '<span class="alert alert-info">' . mb_strrev($s) . '</span>';
              echo ('Средняя длина предложения ' .countSentences($s) . ' символов<br>');
              $words = preg_split('/\s+/',$s,-1,PREG_SPLIT_NO_EMPTY);
              foreach ($words as $word) {
                $word_count++;
                $word_length += mb_strlen($word);
              }
            }
          }
        }

        echo "Средняя длина " , $word_count , " слов, приблизительно, " , round($word_length / $word_count, 0) , " символов.";
      ?>
      <hr>
    </h6>
	</div>
</body>
</html>
