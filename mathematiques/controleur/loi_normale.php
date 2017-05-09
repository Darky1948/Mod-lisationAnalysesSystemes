<?php	
	/**** SESSION ****/
	session_start();

	/**** CLASS CONTROLEUR ****/
	require_once('class/c_modules.php');

	/**** OBJETS ****/
	$c_modules = new c_modules();
	
	/*** DEVELOPPEMENT ***/
	$nom_page = 'Loi normale';

	$afficherResultat = false;
	if(isset($_POST['taillePopulation']) && isset($_POST['mu']) && isset($_POST['sigma']) && isset($_POST['taillePopulation']) && isset($_POST['borneMinimale']) && isset($_POST['borneMaximale']) && isset($_POST['nbrClasses']) && isset($_POST['nomLoi'])) {
		
		// On récupère les paramètres
		$taillePopulation = filter_input(INPUT_POST, 'taillePopulation', FILTER_VALIDATE_INT);
		$borneMinimale = filter_input(INPUT_POST, 'borneMinimale', FILTER_VALIDATE_INT);
		$borneMaximale = filter_input(INPUT_POST, 'borneMaximale', FILTER_VALIDATE_INT);
		$nbrClasses = filter_input(INPUT_POST, 'nbrClasses', FILTER_VALIDATE_INT);
		$nomLoi = $_POST['nomLoi'];
		$mu = filter_input(INPUT_POST, 'mu', FILTER_VALIDATE_INT);
		$sigma = filter_input(INPUT_POST, 'sigma', FILTER_VALIDATE_INT);

		$tabvaleur = $c_modules->loi_normale_cos($taillePopulation, $mu, $sigma);

		$tabClasses = $c_modules->creer_tableau_classe($nbrClasses, $tabvaleur, $borneMinimale, $borneMaximale);

		//var_dump($tabClasses);

		$compteTheorique = $c_modules->compte_nbr_element_classe_theorique_normale($taillePopulation, $mu, $sigma, $borneMinimale, $borneMaximale, $nbrClasses);
		$comptePratique = $c_modules->compte_pratique_nbr_element_classe($tabClasses);

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