<?php	
	/**** SESSION ****/
	session_start();

	/**** CLASS CONTROLEUR ****/
	require_once('class/c_modules.php');

	/**** OBJETS ****/
	$c_modules = new c_modules();
	
	/*** DEVELOPPEMENT ***/
	$nom_page = 'Loi uniforme';

	$afficherResultat = false;
	if(isset($_POST['taillePopulation']) && isset($_POST['borneMinimale']) && isset($_POST['borneMaximale']) && isset($_POST['nbrClasses']) && isset($_POST['nomLoi'])){
		// On récupère les paramètres
		$taillePopulation = filter_input(INPUT_POST, 'taillePopulation', FILTER_VALIDATE_INT);
		$borneMinimale = filter_input(INPUT_POST, 'borneMinimale', FILTER_VALIDATE_INT);
		$borneMaximale = filter_input(INPUT_POST, 'borneMaximale', FILTER_VALIDATE_INT);
		$nbrClasses = filter_input(INPUT_POST, 'nbrClasses', FILTER_VALIDATE_INT);
		$nomLoi = $_POST['nomLoi'];

		$tabvaleur = $c_modules->generation_nombre_aleatoire($taillePopulation, $nomLoi);
		$tabClasses = $c_modules->creer_tableau_classe($nbrClasses, $tabvaleur, $borneMinimale, $borneMaximale);

		$compteTheorique = $c_modules->compte_nbr_element_classe_theorique_uniforme($tabClasses, $taillePopulation);
		$comptePratique = $c_modules->compte_pratique_nbr_element_classe($tabClasses);

		//var_dump($tabClasses);
		//var_dump($comptePratique);
		//var_dump($compteTheorique);

		$calculD2 = $c_modules->calcul_d2($compteTheorique, $comptePratique);
		echo 'D2 : ' . $calculD2;



		/*
		 *	Pour javascript
		 */
		$afficherResultat = true;
		$strClassesEncodePratique = '';
		foreach ($comptePratique as $key => $value) {
			$strClassesEncodePratique .= $value . ' ';
		}
		$strClassesEncodeTheorique = '';
		foreach ($compteTheorique as $key => $value) {
			$strClassesEncodeTheorique .= $value . ' ';
		}
	}

?>