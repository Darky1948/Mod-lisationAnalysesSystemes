<?php	
	/**** SESSION ****/
	session_start();
	
	
	/**** CLASS CONTROLEUR ****/
	require_once('class/c_modules.php');

	/**** OBJETS ****/
	$c_modules = new c_modules();
	
	/*** DEVELOPPEMENT ***/
	$nom_page = 'Simulation ordinateurs de bord';

	$afficherResultat = false;

	unset($_SESSION['hashmap']);
	unset($_SESSION['nbrEvenements']);
	unset($_SESSION['total']);

	if(isset($_POST['nbrEvenements']) && isset($_POST['temps'])) {
		// On récupère les paramètres
		$nbrEvenements = filter_input(INPUT_POST, 'nbrEvenements', FILTER_VALIDATE_INT);
		$MTBFPratique = (float) 0;

		// Nombre d'ordis
		$beta = 3;
		
		// En heures
		$temps = filter_input(INPUT_POST, 'temps', FILTER_VALIDATE_FLOAT);
		
		if(isset($_POST['fiabilite']) && !empty($_POST['fiabilite'])){
			// Fiabilité en pourcent
			$fiabilite = filter_input(INPUT_POST, 'fiabilite', FILTER_VALIDATE_FLOAT);
		}else {
			$fiabilite = exp(-pow($lambda * $temps, $beta)); // Weibull
		}

		if(isset($_POST['lambda']) && !empty($_POST['lambda'])) {
			$lambda = filter_input(INPUT_POST, 'lambda', FILTER_VALIDATE_FLOAT);
		}else {
			$lambda = log($fiabilite/100) / (-$temps);
		}
		
		$MTBF = 1 / $lambda;

		// Ordi 1
		$valeurLoiExponentielle1 = $c_modules->loi_exponentielle($nbrEvenements, $lambda);
		$tabValeurPoisson1 = $c_modules->processus_de_poisson($valeurLoiExponentielle1);
		
		// Ordi 2
		$valeurLoiExponentielle2 = $c_modules->loi_exponentielle($nbrEvenements, $lambda);
		$tabValeurPoisson2 = $c_modules->processus_de_poisson($valeurLoiExponentielle2);
		
		// Ordi 3
		$valeurLoiExponentielle3 = $c_modules->loi_exponentielle($nbrEvenements, $lambda);
		$tabValeurPoisson3 = $c_modules->processus_de_poisson($valeurLoiExponentielle3);

		$total = array_unique(array_merge($tabValeurPoisson1, $tabValeurPoisson2, $tabValeurPoisson3));

		//trie par ordre croissant dans hashmap
		$hashmap = array();

		foreach ($tabValeurPoisson1 as $value) {
			$hashmap[$value] = 1;
		}
		foreach ($tabValeurPoisson2 as $value) {
			$hashmap[$value] = 2;
		}
		foreach ($tabValeurPoisson3 as $value) {
			$hashmap[$value] = 3;
		}

		// Calcul du MTBF pratique
		foreach ($tabValeurPoisson1 as $key => $value) {
			if($key == 0){
				$MTBFPratique += $value;
			}else{
				$MTBFPratique += $tabValeurPoisson1[$key] - $tabValeurPoisson1[$key-1];
			}
		}
		foreach ($tabValeurPoisson2 as $key => $value) {
			if($key == 0){
				$MTBFPratique += $value;
			}else{
				$MTBFPratique += $tabValeurPoisson2[$key] - $tabValeurPoisson2[$key-1];
			}
		}
		foreach ($tabValeurPoisson3 as $key => $value) {
			if($key == 0){
				$MTBFPratique += $value;
			}else{
				$MTBFPratique += $tabValeurPoisson3[$key] - $tabValeurPoisson3[$key-1];
			}	
		}

		$MTBFPratique = $MTBFPratique / (count($tabValeurPoisson1) + count($tabValeurPoisson2) + count($tabValeurPoisson3));
	
		$margeErreur = abs(($MTBFPratique - $MTBF)/$MTBF);

		ksort($hashmap);

		// Affectation des données à la session
		$_SESSION['total'] = $total;
		$_SESSION['hashmap'] = $hashmap;
		$_SESSION['nbrEvenements'] = $nbrEvenements;
	}
?>