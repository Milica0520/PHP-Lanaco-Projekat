<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/php-lanaco-projekat/artikal.php":
			$CURRENT_PAGE = "Artikal"; 
			$PAGE_TITLE = "Artikal";
			break;
		case "/php-template/contact.php":
			$CURRENT_PAGE = "Contact"; 
			$PAGE_TITLE = "Contact Us";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Welcome to my homepage!";
	}
?>