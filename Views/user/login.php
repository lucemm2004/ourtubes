<!-- <?php if (!empty($_SESSION['erreur'])) : ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['erreur'];
            unset($_SESSION['erreur']); ?>
    </div>
<?php endif; ?>
<h1>Connexion</h1>
<?= $loginForm ?>
<a href="/<?= APP_NAME ?>/user/register">Par encore inscrit - m'inscrire</a>
 -->

<h1>Connexion</h1>
<form action="" method="post">
    <div class="pseudoContainer">
        <input
            type="pseudo"
            name="pseudo"
            id="pseudo"
            placeholder="Votre pseudo (*) ..."
            required />
    </div>
    <div class="passwordContainer">
        <input
            type="password"
            name="password"
            id="password"
            placeholder="Votre mot de passe (*) ..."
            required />
    </div>

    <!-- <div class="rememberContainer">
        <input type="checkbox" name="remember" id="remember" />
        <label for="remember">Se souvenir de moi</label>
    </div> -->

    <div class="submitContainer">
        <button type="submit" name="submit" id="btnSubmit">
            Connexion
        </button>
    </div>
</form>

<div class="optionsContainer">
    <!--
                <div class="rememberContainer">
                    <input type="checkbox" name="remember" id="remember" />
                    <label for="remember">Se souvenir de moi</label>
                </div>
                -->
    <div></div>
    <div class="registerContainer">
        <p class="registerQuestion">
            <a href="/<?= APP_NAME ?>/user/register">Pas encore inscrit(e) ?</a>
        </p>
    </div>
    <div></div>
</div>