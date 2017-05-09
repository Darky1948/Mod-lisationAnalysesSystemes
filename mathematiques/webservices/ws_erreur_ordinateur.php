<?php	
	/**** SESSION ****/
	session_start();

	/**** CLASS CONTROLEUR ****/
	require_once('/controleur/class/c_modules.php');

	/**** OBJETS ****/
	$c_modules = new c_modules();

	if(isset($_SESSION['hashmap']) && isset($_SESSION['nbrEvenements'])) {
		$hashmap = $_SESSION['hashmap'];
		foreach ($hashmap as $key => $value) {
			if($value == 1){
				echo 'ordinateur1 ';
			}
			if($value == 2){
				echo 'ordinateur2 ';
			}
			if($value == 3){
				echo 'ordinateur3 ';
			}
		}
	}
	
?>