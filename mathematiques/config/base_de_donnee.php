<?php

    /*
     * base_de_donnee.php 18/04/2017
     * Définit l'ensemble des codes retours (erreurs, informations, messages...)
     * Réalisé par Kristen VIGUIER et Simon BAUMANN
     * COPYRIGHT & COPYLEFT
     */

	try {	
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		/* spécificé le port */
		//$base_de_donnee = new PDO('mysql:host='.CONST_DB_HOST.';port='.CONST_DB_PORT.';dbname='.CONST_DB_NAME, CONST_DB_USER, CONST_DB_PASS, $pdo_options);
		$base_de_donnee = new PDO('mysql:host='.CONST_DB_HOST.';dbname='.CONST_DB_NAME, CONST_DB_USER, CONST_DB_PASS, $pdo_options);
		$base_de_donnee->exec('SET NAMES utf8');
	} catch(Exception $e) {
        $_GET['url'] = 'erreur';
        $message_erreur = "Impossible de se connecter à la base de donnée.";
	}	
?>