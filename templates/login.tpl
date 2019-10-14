{extends file='base.tpl'}

{block name="title"}TLI - Connexion{/block}

{block name="stylesheet" append}
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
{/block}

{block name="content"}
	<div class="card columns six offset-by-three">
		<div class="card-header">Connexion</div>
		<div class="card-body">
			<div class="row">
				<form id="login-form">
					<label for="login">Identifiant</label>
					<input type="text" class="u-full-width" placeholder="identifiant" id="login" autocomplete="off" required>
					<label for="password">Mot de passe</label>
					<input type="password" class="u-full-width" placeholder="********" id="password" autocomplete="off" required>
					<input id="login-submit" class="button-primary" type="submit" value="Submit">
				</form>
			</div>
			<div id="feedback" class="feedback"></div>
			{if isset($disconnect)}
				<br/><div id="feedback" class="feedback success" style="display: block">Déconnexion réussie</div>
			{/if}
		</div>
	</div>
{/block}

{block name="script" append}
	<script src="../assets/js/login.js"></script>
{/block}
