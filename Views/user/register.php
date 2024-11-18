<!-- <h1>Inscription</h1>
<?= $registerForm ?>
<a href="/<?= APP_NAME ?>/user/login">Déjà inscrit - me connecter</a> -->

<?php if (!empty($_SESSION['erreur'])) : ?>
    <div class="alert alert-danger" role="alert">
        <p>
            <?php echo $_SESSION['erreur'];
            unset($_SESSION['erreur']); ?>

        </p>
    </div>
<?php endif; ?>

<h1>Inscription</h1>
<form action="" method="post">
    <div class="pseudoContainer">
        <input
            type="text"
            name="pseudo"
            id="pseudo"
            placeholder="Votre pseudo (*) ..."
            required />
    </div>

    <!-- <div class="emailContainer">
        <input
            type="email"
            name="email"
            id="email"
            placeholder="Votre email..."
            required />
    </div> -->

    <div class="passwordContainer">
        <input
            type="password"
            name="password"
            id="password"
            placeholder="Votre mot de passe (*) ..."
            required />
    </div>
    <div class="submitContainer">
        <button type="submit" name="submit" id="btnSubmit">
            Inscription
        </button>
    </div>
</form>

<div class="optionsContainer">
    <div></div>
    <div class="loginContainer">
        <p class="loginQuestion">
            <a href="/<?= APP_NAME ?>/user/login">Déjà inscrit(e) ?</a>
        </p>
    </div>
    <div></div>
</div>