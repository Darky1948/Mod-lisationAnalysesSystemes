<?php

    /*
     * const.php 18/04/2017
     * Fichier principal de configuration
     * Paramétrage du site + appel d'autre page de config
     * Config de la bdd
     * Config du mode développeur
     * Config des paths
     * Réalisé par Kristen VIGUIER et Simon BAUMANN
     * COPYRIGHT & COPYLEFT
     */

	/* CHEMINS */
	define('DS', '/'); //DIRECTORY_SEPARATOR
	define('ROOT', dirname(dirname(__FILE__)));


	/* BASE DE DONNEE */
	define('CONST_DB_HOST', "localhost");
	//define('CONST_DB_PORT', "8098");
	define('CONST_DB_NAME', "mathematiques");
	define('CONST_DB_USER', "root");
	define('CONST_DB_PASS', "root");
	
	/* PARAMETRES */
	define('AFFICHER_ERREURS', true);
	define('PAGE_DEFAUT', 'loi_uniforme');
	define('TIMEOUT_CONNEXION', 2592000);
	define('TIMEOUT_MOBILE_SESSION', 3600);
	define('NB_ELEMENT_PAGE', 10);
	define('TAILLE_MINIMAL_PASSWORD', 6);

    /* CHAINES */
    define('NOM_PAGE_DEFAUT', '');
    define('DESCRIPTION_DEFAUT', '');
    define('KEYWORDS_DEFAUTS', '');
    define('TITRE_DEFAUTS', '');

    /* PATH  */
    define('ADRESSE_ABSOLUE_URL', 'http://localhost:8098/mathematiques/');

    define('BOOTSTRAP_CSS', ADRESSE_ABSOLUE_URL . 'vue/css/bootstrap.min.css');
    define('BOOTSTRAP_JS', ADRESSE_ABSOLUE_URL . 'vue/js/bootstrap.min.js');
    define('STYLE_CSS', ADRESSE_ABSOLUE_URL . 'vue/css/style.css');
    define('IMAGES_STYLE', ADRESSE_ABSOLUE_URL .  'vue/images/');
    define('CHART_JS', ADRESSE_ABSOLUE_URL . 'vue/js/Chart.js-master/src/chart.js');
    define('FAVICON', ADRESSE_ABSOLUE_URL . 'vue/images/favicon.ico');
    define('JQUERY_JS', ADRESSE_ABSOLUE_URL . 'vue/js/jquery.js');

    /* INCLUSION DE FICHIERS CONF */
    require_once('pages_existantes.php');
    require_once('upload_file_config.php');
    require_once('code_retour.php');


    /* CONSTANTES TAILLES CHAMPS FORMULAIRES CONTACT */
    define('INPUT_LENGTH_NAME', 30);
    define('INPUT_LENGTH_FIRSTNAME', 30);
    define('INPUT_LENGTH_EMAIL', 100);
    define('INPUT_LENGTH_SUBJECT', 50);
    define('INPUT_LENGTH_MESSAGE', 500);

?>