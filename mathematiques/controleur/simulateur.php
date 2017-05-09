<?php	
	/**** SESSION ****/
	session_start();
	session_destroy();
	
	/**** CLASS CONTROLEUR ****/
	require_once('class/c_simulation.php');

	/**** OBJETS ****/
	$c_simulation = new c_simulation();
	
	/*** DEVELOPPEMENT ***/
	$nom_page = 'Simulation ordinateurs de bord';

	$afficherResultat = false;
?>