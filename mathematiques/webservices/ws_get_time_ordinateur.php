<?php	
	/**** SESSION ****/
	session_start();

	/**** CLASS CONTROLEUR ****/
	require_once('/controleur/class/c_modules.php');

	/**** OBJETS ****/
	$c_modules = new c_modules();

	if(isset($_POST['valeur']) && $_POST['valeur'] == 1 && isset($_SESSION['hashmap']) && isset($_SESSION['nbrEvenements'])) {
		$hashmap = $_SESSION['hashmap'];
		foreach ($hashmap as $key => $value) {
			echo $key . ' ';
		}
	}
	
?>