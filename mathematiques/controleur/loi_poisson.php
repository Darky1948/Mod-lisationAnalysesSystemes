<?php	
	/**** SESSION ****/
	session_start();

	/**** CLASS CONTROLEUR ****/
	require_once('class/c_modules.php');

	/**** OBJETS ****/
	$c_modules = new c_modules();
	
	/*** DEVELOPPEMENT ***/
	$nom_page = 'Processus de poisson';

	$afficherResultat = false;

	unset($_SESSION['tabValeurPoisson']);
	unset($_SESSION['taillePopulation']);

	if(isset($_POST['taillePopulation']) && isset($_POST['T']) && isset($_POST['lambda'])){
		// On récupère les paramètres
		$taillePopulation = filter_input(INPUT_POST, 'taillePopulation', FILTER_VALIDATE_INT);
		//$borneMinimale = filter_input(INPUT_POST, 'borneMinimale', FILTER_VALIDATE_INT);
		//$borneMaximale = filter_input(INPUT_POST, 'borneMaximale', FILTER_VALIDATE_INT);
		$T = filter_input(INPUT_POST, 'T', FILTER_VALIDATE_INT);
		$lambda = $_POST['lambda'];

		$valeurLoiExponentielle = $c_modules->loi_exponentielle($taillePopulation, $lambda);
		$tabValeurPoisson = $c_modules->processus_de_poisson($valeurLoiExponentielle);

		// Affectation des données à la session
		$_SESSION['tabValeurPoisson'] = $tabValeurPoisson;
		$_SESSION['taillePopulation'] = $taillePopulation;
		$afficherResultat = true;

		$moyenneTheorique = (1/$lambda);
		$moyennePratique = $c_modules->calcul_moyenne_ecart_poisson($valeurLoiExponentielle);

		$margeErreur = abs(((1-($moyenneTheorique/$moyennePratique))*100));
		$mu = $lambda * $T;

		// Compte nbr element classse
		$tabClassePoissonT = $c_modules->creer_tableau_classe_processus_poisson($tabValeurPoisson, $T);
		$tabPratiqueCompte = $c_modules->compte_pratique_nbr_element_classe($tabClassePoissonT);
		$moyennePratiqueT = $c_modules->calcul_moyenne_ecart_t_poisson($tabPratiqueCompte, $T);

		$margeErreurT = ((1-($moyennePratiqueT/$mu))*100);
	}
?>