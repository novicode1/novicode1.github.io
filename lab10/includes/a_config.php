<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/game.php":
			$CURRENT_PAGE = "Game";
			$PAGE_TITLE = "Game";
			break;
		case "/string.php":
			$CURRENT_PAGE = "String";
			$PAGE_TITLE = "String";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Welcome to my homepage!";
	}
?>
