{extends file='base.tpl'}

{block name="title"}TLI - Inscription{/block}

{block name="content"}
    <div class="card columns six offset-by-three">
        <div class="card-header">Inscription</div>
        <div class="card-body">
            <div class="row">
                <form id="login-form" method="post" onsubmit="event.preventDefault(); validateSignUpForm();">
                    <label for="login">Identifiant<span style="color:red"> *</span></label>
                    <input type="text" class="u-full-width" placeholder="identifiant" id="login" name="login" autocomplete="off" required>

                    <label for="password">Mot de passe<span style="color:red"> *</span></label>
                    <input type="password" class="u-full-width" placeholder="********" id="password" name="password" autocomplete="off" required>

                    <label for="password-confirm">Confirmer le mot de passe<span style="color:red"> *</span></label>

                    <input type="password" class="u-full-width" placeholder="********" id="password-confirm" name="password-confirm" autocomplete="off" required>
                    <input id="sign-up-submit" class="button-primary" type="submit" value="Inscription">
                </form>
            </div>
            <div id="feedback" class="feedback"></div>
            {if isset($feedback)}
                <div id="feedback" class="feedback {$feedback}" style="display: block">{$signedMsg}</div>
            {/if}
        </div>
    </div>
{/block}

{block name="script" append}
    <script src="../assets/js/sign-up.js"></script>
{/block}
