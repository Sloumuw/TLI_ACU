{extends file='base.tpl'}

{block name="title"}TLI - Connexion{/block}

{block name="stylesheet" append}
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
{/block}

{block name="content"}
	<h2>Connexion</h2>
	<div class="row">
		<form class="columns six offset-by-three">
			<label for="login">Identifiant</label>
			<input type="text" class="u-full-width" placeholder="identifiant" id="login" required>
			<label for="password">Mot de passe</label>
			<input type="email" class="u-full-width" placeholder="********" id="password" required>
			<input class="button-primary" type="submit" value="Submit">
		</form>
	</div>
{/block}

{block name="stylesheet" append}
	<script src="../assets/js/login.js"></script>
{/block}
