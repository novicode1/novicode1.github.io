<?php include("includes/a_config.php");?>
<?
	if (session_id() == '') {
		session_start();
		ini_set('session.gc_maxlifetime', 172800);
		ini_set('session.cookie_lifetime', 172800);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<?php include("includes/head-tag-contents.php");?>

		<style>
			form, .alert-danger, .alert-success {
				width: 220px;
				margin: 10px auto 4px;
			}

			.hidden {
				display: none !important;
			}

			.btn-primary, span {
				display: block;
				margin: auto;
			}

			.form-group {
				width: 100%;
			}
		</style>
	</head>
<body>
	<?php include("includes/navigation.php");?>

	<div class="container main-content">
		<h2>Game</h2>

		<form method="post" action="game.php" class="user-form">
			<label class="form-group">
				Введите число от 1 до 3
				<input type="number" class="form-control" min="1" max="3" name="userValue" required>
			</label>

			<?
				if ($_SERVER['REQUEST_METHOD'] == 'POST' and $_POST['userValue'] !== 0) {
					$gameState = 'play';

					$userValue = $_POST['userValue'];
					$botValue = mt_rand(1,3);

					if (!isset($_SESSION['botHp'])) {
						$_SESSION['botHp'] = 10;
					}

					if (!isset($_SESSION['userHp'])) {
						$_SESSION['userHp'] = 10;
					}

					$subtractedValue = mt_rand(1,4);
					if ($userValue == $botValue) {
						$_SESSION["userHp"] = $_SESSION["userHp"] - $subtractedValue;
						echo "<span class='text-danger'>Бот нанес ", $subtractedValue, " HP </span>";
						echo "<span>у ВАС осталось ", $_SESSION["userHp"], " HP </span>";
						echo "<span>у БОТА осталось ", $_SESSION["botHp"], " HP </span>";
					}
					else if ($userValue !== $botValue) {
						$_SESSION["botHp"] = $_SESSION["botHp"] - $subtractedValue;
						echo "<span class='text-success'>Вы нанесли ", $subtractedValue, " HP </span>";
						echo "<span>у БОТА осталось ", $_SESSION["botHp"], " HP </span>";
						echo "<span>у ВАС осталось ", $_SESSION["userHp"], " HP </span>";
					}

					if ($_SESSION["botHp"] <= 0) {
						unset($_SESSION["userHp"]);
						unset($_SESSION["botHp"]);
						$gameState = 'restart';
						echo "<span class='alert alert-success'>Вы выиграли!</span>";
					}

					else if ($_SESSION["userHp"] <= 0) {
						unset($_SESSION["userHp"]);
						unset($_SESSION["botHp"]);
						$gameState = 'restart';
						echo "<span class='alert alert-danger'>Вы проиграли	!</span>";
					}
					$userValue = 0;
					$_POST['userValue'] = 0;
				}
			?>

			<button type="submit" class="btn btn-primary <?php if($gameState == 'restart'){echo 'hidden';} ?>">Походить</button>
			<a href="redirect.html" class="btn btn-secondary <?php if($gameState !== 'restart'){echo 'hidden';} ?>">Рестарт</a>
		</form>
	</div>
	<script src="index.js"></script>
</body>
</html>
