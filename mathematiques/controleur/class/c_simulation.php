<?php

class c_simulation {
	/*
	 *	Génère un nombre aléatoire pour la loi uniforme
	 */
	public function genererNombreAleatoireLoiUniforme(){
		return (rand(0,10000) / 10000);
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

	/* ### FONCTIONS UTILES ### */
	public function trier_tableau_ordre_croissant($tabvaleur){
		return asort($tabvaleur);
	}
	
}
?>