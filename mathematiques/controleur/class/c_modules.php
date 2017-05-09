<?php

class c_modules {
	
			/* ### PARTIE LOI UNIFORME ### */
	/*
	 *	Génère un nombre aléatoire pour la loi uniforme
	 */
	public function genererNombreAleatoireLoiUniforme(){
		return (rand(0,10000) / 10000);
	}
	
	/*
	 * 
	 */
	public function loi_uniforme($borneMinimale, $borneMaximale, $nbPoints){
		$i = 0;
		while($i < $nbrPoints){
			$rand = $c_modules->generer_nombre_aleatoire();

			$resultat[$i] = $rand;
			$i++;
		}
		return 0;
	}

	/*
	 *	Génère un nombre aléatoire avec la loi exponentielle
	 */
	public function loi_exponentielle($nbPoints, $lambda){
		$i = 0;
		while($i < $nbPoints){
			$uniforme = $this->genererNombreAleatoireLoiUniforme();
			$rand = -log($uniforme)/$lambda;
			$resultat[$i] = $rand;
			$i++;
		}
		return $resultat;
	}

	/*
	 *	Génère un nombre aléatoire avec Box & Müller en utilisant la formule cos
	*/
	public function loi_normale_cos($nbPoints, $mu, $sigma){
		$i = 0;
		while($i < $nbPoints){
			$uniformeU = $this->genererNombreAleatoireLoiUniforme();
			$uniformeV = $this->genererNombreAleatoireLoiUniforme();
			$rand = sqrt(-2*log($uniformeU))*cos(2*pi()*$uniformeV);
			$rand = $rand * $sigma + $mu;
			$resultat[$i] = $rand;
			$i++;
		}
		return $resultat;
	}
	
	/*
	 *	Génère un nombre aléatoire avec Box & Müller en utilisant la formule sin
	*/
	public function loi_normale_sin($nbPoints, $mu, $sigma){
		$i = 0;

		while($i < $nbPoints){
			$uniformeU = $this->genererNombreAleatoireLoiUniforme();
			$uniformeV = $this->genererNombreAleatoireLoiUniforme();
			$rand = sqrt(-2*log($uniformeU))*sin(2*pi()*$uniformeV);
			$rand = $rand * $sigma + $mu;
			$resultat[$i] = $rand;
			$i++;
		}
		return $resultat;
	}

	public function calcul_d2($tabCompteTheorique, $tabComptePratique){
		$d2 = 0;

		for($i=0; $i<count($tabCompteTheorique); $i++) {
			if($tabCompteTheorique[$i] == 0){
				$d2 += pow(($tabComptePratique[$i] - $tabCompteTheorique[$i]), 2);
			}
			else {
				$d2 += pow(($tabComptePratique[$i] - $tabCompteTheorique[$i]), 2) / $tabCompteTheorique[$i];
			}
		}
		return $d2;
	}

	/* ### FONCTIONS UTILES ### */
	public function trier_tableau_ordre_croissant($tabvaleur){
		return asort($tabvaleur);
	}

	/*
	 * Création du tableau de classe pour la loi uniforme
	 */
	public function creer_tableau_classe($nbrclasse, $tabvaleur, $borneMinimale, $borneMaximale){
		// Initialisation du tableau de classes
		for($i=0; $i<$nbrclasse; $i++){
			$tabclasses[$i] = array();
		}
		// Calcul de l'amplitude des classe
		$amplitudeClasse = ($borneMaximale - $borneMinimale) / $nbrclasse;

		// Parcours lee nombre de classe
		for($i=0; $i<$nbrclasse; $i++) {
			// Parcour du tableau de valeur
			foreach ($tabvaleur as $key => $valeur) {
				if($valeur < $amplitudeClasse*($i+1)) { // si c'est compris dans l'amplitude
					array_push($tabclasses[$i], $valeur); // ajout
					unset($tabvaleur[$key]);
				}
			}
		}
		return $tabclasses;
	}

	/*
	 *	Génération nombre aléatoire en fonction de la loi
	 */
	public function generation_nombre_aleatoire($nombre, $loi){
		$tabValeur = array();

		for($i=0; $i<$nombre; $i++){
			switch ($loi) {
				case 'uniforme':
					$tabValeur[$i] = $this->genererNombreAleatoireLoiUniforme();
					break;
				case 'exponentielle':
					$tabValeur[$i] = $this->loi_exponentielle();
					break;
				case 'normale':
					$tabValeur[$i] = $this->loi_normale_sin();
					break;
				default:
					$tabValeur[$i] = $this->genererNombreAleatoireLoiUniforme();
					break;
			}
		}
		return $tabValeur;
	}

	/*
	 *	Compter le nombre d'éléments pratique dans chaque classe
	 */
	public function compte_pratique_nbr_element_classe($tabclasses){
		$tableau_nbr_element_classe = array();
		foreach ($tabclasses as $key => $value) {
			$tableau_nbr_element_classe[$key] = count($value);
		}

		return $tableau_nbr_element_classe;
	}

	/*
	 * Compte théorique de la loi uniforme
	 * Nbr d'éléments qu'on a divisé par le nbr de classe
	 */
	public function compte_nbr_element_classe_theorique_uniforme($tabclasses, $nbrElements) {
		$tabCompteTheorique = array();

		foreach ($tabclasses as $key => $value) {
			$tabCompteTheorique[$key] = $nbrElements / count($tabclasses);
		}

		return $tabCompteTheorique;
	}

	/*
	 *	 Calcul le tableau des valeurs théoriques de la loi uniforme
	 */
	public function calcul_tableau_theorique_uniforme($borneMinimale, $borneMaximale, $nbrElements){
		for($i=0;$i<$nbrElements;$i++) {
			$resultat[$i] = 1 / ($borneMaximale - $borneMinimale); // 1/B-A
		}
		return $resultat;
	}

	/*
	 * Compte théorique de la loi exponentielle
	 * On applique la formule utilisant loi uniforme
	 */
	public function compte_nbr_element_classe_theorique_exponentielle($nbrElements, $lambda, $borneMinimale, $borneMaximale, $nbrClasses) {
		// Calcul et stockage des bornes de chaque classe
		for($i=0; $i<=$nbrClasses; $i++){
			if($i == 0){
				$borne[$i] = $borneMinimale;
			}else {
				$borne[$i] = $borneMinimale + $i*($borneMaximale - $borneMinimale) / $nbrClasses;
			}
		}
		// Calcul du nombre d'éléments théorique dans chaque classe
		for($i=0; $i<$nbrClasses; $i++){
			// 1 - exp(-lambda*x) pour chaque borne et on soustrait inférieur à supérieur
			$classes[$i] = ((1 - exp(-$lambda * $borne[$i+1])) - (1 - exp(-$lambda * $borne[$i])))* $nbrElements;
		}
		return $classes;
	}

	public function lire_table_loi_normale(){
		//$contenu = file('table_loi_normale.txt');
		$contenu = file_get_contents('http://localhost:8098/mathematiques/vue/uploads/table_loi_normale.txt');
		$keyval= 0;
		$tab = explode(" ", $contenu);
		$lignes = array();
		foreach($tab as $key => $ligne) {
			$keyval += 0.01;
			$valeur = array($keyval => $ligne);
			array_push($lignes, $valeur);
			/*$lignes[$i] = $ligne;
			$i +=0.01;*/
		}
		$string = $lignes[0][0];
		$lignes = explode(';',$string);

		//var_dump($lignes);
		return $lignes;
	}

	/*
	 * Compte théorique de la loi normale
	 * On utilise la table de la loi normale et on fait la différence des intégrales
	 */
	public function compte_nbr_element_classe_theorique_normale($nbrElements, $mu, $sigma, $borneMinimale, $borneMaximale, $nbrClasses) {
		$table_loi_normale = $this->lire_table_loi_normale();

		// Calcul et stockage des bornes de chaque classe
		for($i=0; $i<=$nbrClasses; $i++){
			if($i == 0){
				$bornes[$i] = $borneMinimale;
			}else {
				$bornes[$i] = $borneMinimale + $i*($borneMaximale - $borneMinimale) / $nbrClasses;
			}
			$bornes[$i] = ($bornes[$i] - $mu) / $sigma;
		}
		//var_dump($bornes);
		// Calcul du nombre d'éléments théorique dans chaque classe
		for($i=0; $i<$nbrClasses; $i++){
			// On utilise la table de la loi normale à partir des bornes
			if(abs($bornes[$i+1]*100) >= 400){
				$sup = 1;
			}
			else{
				$sup = $table_loi_normale[abs($bornes[$i+1]*100)];
			}
			if(abs($bornes[$i]*100) >= 400){
				$inf = 1;
			}
			else{
				$inf = $table_loi_normale[abs($bornes[$i]*100)];
			}

			$classes[$i] = abs($sup - $inf) * $nbrElements * $sigma + $mu;
			
		}
		//var_dump($classes);
		return $classes;
	}


	/*
	 *	Processus de poisson
	 */
	public function processus_de_poisson($valeurLoiExponentielle){
		$tabValeursPoissons = array();
		$nbrElements = count($valeurLoiExponentielle);
		$abscisses = 0;

		// calcul valeurs tableau poissons
		for($i=0;$i<$nbrElements;$i++) {	
			$abscisses += $valeurLoiExponentielle[$i];
			$tabValeursPoissons[$i] = $abscisses;	
		}

		return $tabValeursPoissons;
	}

	/*
	 *	Moyenne écart processus poisson
	 */
	public function calcul_moyenne_ecart_poisson($tabValeurs) {
		$taille = count($tabValeurs);
		$calcul = 0;

		for($i=0;$i<$taille;$i++){
			$calcul += $tabValeurs[$i];
		}
		return $calcul/$taille;
	}

	public function calcul_moyenne_ecart_t_poisson($tabPratiqueCompte, $T) {
		$taille = count($tabPratiqueCompte);
		$calcul = 0;

		for($i=0;$i<$taille;$i++){
			$calcul += $tabPratiqueCompte[$i];
		}
		return $calcul/$taille;
	}

	/*
	 * Création du tableau de classe pour le processus de poisson
	 */
	public function creer_tableau_classe_processus_poisson($tabvaleur, $T){
		$nbrclasse = count($tabvaleur)/$T;
		// Initialisation du tableau de classes
		for($i=0; $i<$nbrclasse; $i++){
			$tabclasses[$i] = array();
		}

		// Parcours lee nombre de classe
		for($i=0; $i<$nbrclasse; $i++) {
			// Parcour du tableau de valeur
			foreach ($tabvaleur as $key => $valeur) {
				if($valeur < $T*($i+1)) { // si c'est compris dans l'amplitude
					array_push($tabclasses[$i], $valeur); // ajout
					unset($tabvaleur[$key]);
				}
			}
		}
		return $tabclasses;
	}
}
?>