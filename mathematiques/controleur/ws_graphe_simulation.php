	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<?php	
	/**** SESSION ****/
	session_start();

	/**** CLASS CONTROLEUR ****/
	require_once('class/c_modules.php');

	/**** OBJETS ****/
	$c_modules = new c_modules();

	$afficherResultat = false;
	if(isset($_SESSION['total'])){
		/*
		 *	Pour javascript
		 */
		$afficherResultat = true;
		$strClassesEncodePratique = '';
		foreach ($_SESSION['total'] as $key => $value) {
			$strClassesEncodePratique .= $value . ' ';
		}
	}
?>