<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/php-lanaco-projekat/artikal.php":
			$CURRENT_PAGE = "Artikal"; 
			$PAGE_TITLE = "Artikal";
			break;
		case "/php-lanaco-projekat/about.php":
			$CURRENT_PAGE = "Lager"; 
			$PAGE_TITLE = "Lager";
			break;
			case "/php-lanaco-projekat/racun.php":
				$CURRENT_PAGE = "Racun"; 
				$PAGE_TITLE = "Racun";
				break;
				case "/php-lanaco-projekat/radnik.php":
					$CURRENT_PAGE = "Radnik"; 
					$PAGE_TITLE = "Radnik";
					break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Dobrodosli na stranicu!";
	}
?>