<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titre</title>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> -->

    <!-- <link rel="stylesheet" href="http://localhost/ourtubes/public/css/ourtubes.css"> -->


    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- datatable -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"> -->
    <link
        rel="stylesheet"
        href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

    <link rel="stylesheet" href="http://localhost/ourtubes/public/css/ourtubes.css">

</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/<?= APP_NAME ?></a>
            <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/<?= APP_NAME ?>/single">Singles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/<?= APP_NAME ?>/album">Albums</a>
                        </li>
                    </ul>

                    <!-- gestion des connexions / inscriptions / deconnexion -->
                    <ul class="navbar-nav ml-auto">
                        <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) : ?>
                            <?php if (isset($_SESSION['user']['roles']) && in_array('ROLE_ADMIN', $_SESSION['user']['roles'])) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/<?= APP_NAME ?>/admin">Admin</a>
                                </li>
                            <?php endif; ?>
                            <!--
                    <li class="nav-item">
                        <a class="nav-link" href="/AT_EDI/public/users/profil">Profil</a>
                    </li>
-->
                            <li class="nav-item active">
                                <a class="nav-link" href="/<?= APP_NAME ?>/user/logout">Déconnexion</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/<?= APP_NAME ?>/user/register">S'inscrire</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/<?= APP_NAME ?>/user/login">Connexion</a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
        </nav>


        <?php if (!empty($_SESSION['success'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($_SESSION['erreur'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['erreur'];
                unset($_SESSION['erreur']); ?>
            </div>
        <?php endif; ?>


        <!-- <div class="container"> -->
        <?= $contenu ?>
    </div>


    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> -->


    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Datatables  -->
    <!-- <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script> -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <!-- Bootstrap  -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- JS  -->
    <!-- <script src="code.js"></script> -->




</body>

</html>