<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="stylesheet" href="<?php echo BOOTSTRAP_CSS;?>">
		<link rel="stylesheet" href="<?php echo STYLE_CSS;?>">
		<link rel="icon" href="<?php echo FAVICON; ?>" />
		<meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php echo DESCRIPTION_DEFAUT; ?>">
		<meta name="keywords" content="<?php echo KEYWORDS_DEFAUTS; ?>">
		<meta name="Author" content="Kristen VIGUIER, Anthony PEREIRA, Florian POURTUGAU" />

		<title><?php TITRE_DEFAUTS; ?></title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	</head>
	<body>

	    <div class="container">
			<div class="header clearfix">
				<nav>
				<ul class="nav nav-pills pull-right">
					<li role="presentation" <?php if($page == 'loi_uniforme'){ echo 'class="active"';} ?>><a href="loi_uniforme">Loi uniforme</a></li>
					<li role="presentation" <?php if($page == 'loi_exponentielle'){ echo 'class="active"';} ?>><a href="loi_exponentielle">Loi exponentielle</a></li>
					<li role="presentation" <?php if($page == 'loi_normale'){ echo 'class="active"';} ?>><a href="loi_normale">Loi normale</a></li>
					<li role="presentation" <?php if($page == 'loi_poisson'){ echo 'class="active"';} ?>><a href="loi_poisson">Processus de poisson</a></li>
					<li role="presentation" <?php if($page == 'simulateur'){ echo 'class="active"';} ?>><a href="simulateur">Simulation</a></li>
				</ul>
				</nav>
				<h3 class="text-muted">Projet de mathématiques - MAS</h3>
			</div>