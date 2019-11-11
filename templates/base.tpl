<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{block name="title"}TLI - Accueil{/block}</title>
	<link rel="icon" type="image/png" href="../assets/images/favicon.png">

    {block name="stylesheet"}
		<link rel="stylesheet" type="text/css" href="../vendor/components/font-awesome/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/normalize.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/skeleton.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/app.css">
    {/block}
</head>
<body>
	<header>
		<nav id="nav-bar">
			<ul class="row">
				<li class="nav-item columns two" id="nav-item-1">
					<a href="/" class="navLinks">
						<img class="logo" src="../assets/images/logo.png">
					</a>
				</li>
				<li class="nav-item columns two" id="nav-item-2">
					<a href="#" class="navLinks">Accueil</a>
				</li>
				<li class="nav-item columns two" id="nav-item-2">
					<a href="/pathology" class="navLinks">Pathologies</a>
				</li>
				<li class="nav-item columns one offset-by-three" id="nav-item-3">
					<a href="/project" class="navLinks">Projet</a>
				</li>
				<li class="nav-item columns two" id="nav-item-4">
					{if $session }
						<a href="/logout" class="navLinks">Déconnexion</a>
					{else}
						<a href="/login" class="navLinks">Connexion</a>
					{/if}
				</li>
			</ul>
		</nav>
	</header>
	<footer>
		© Guillaume BARILLET - Kilian DECADERINCOURT - Marceau GUYONNET - Marine MOLLIER - CPE Lyon - Projet TIDAL - 2019
	</footer>
	<div class="container">
		{block name="content"}{/block}
	</div>
	{block name="script"}
		<script src="../assets/js/app.js"></script>
	{/block}
</body>
</html>
