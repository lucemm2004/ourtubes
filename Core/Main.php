<?php

namespace App\Core;

use App\Controllers\MainController;

class Main
{
    public function start()
    {
        // on démarre la session => cree un cookie
        session_start();

        // die(ROOT);

        // sert à lire les url
        // http://AT_EDI/controleur/methode/parametres
        // http://AT_EDI/clients/edit/15
        // url reecrite ci-dessous grace au fichier htaccess ne sera pas visible
        // http://AT_EDI/public/index.php?p=clients/edit/15

        // on tape l'url sous cette forme => http://localhost/AT_EDI/public/clients/details
        // var_dump($_GET);
        // die;

        // on retire le trailing slash éventuel (dernier slash à droite)
        // pour eviter le duplicate content
        // on récupère l'url
        $uri = $_SERVER['REQUEST_URI'];
        // die($uri);   // => /AT_EDI/public/clients/details

        // on verifie que uri n'est pas vide et se termine par un slash
        if (!empty($uri) && $uri != '/' && $uri[-1] === "/") {
            // die('ici');

            // on enleve le slash
            $uri = substr($uri, 0, -1);
            // on envoie un code de redirection permanente
            http_response_code(301);
            // on redirige vers l'url sans le slash
            // var_dump($uri . " - " . '/' . strtolower(APP_NAME) . '/public');
            // die();

            // die($uri);

            // if ($uri == '/' . strtolower(APP_NAME) . '/public') {
            if ($uri == '/' . strtolower(APP_NAME)) {
                // on n'a pas de parametre
                // on instancie le controleur par defaut
                // die('ici');
                $controller = new MainController();
                $controller->index();
                exit;
            }
            // die("header");
            header('Location: ' . $uri);
            exit();
        }
        // die($uri);

        // on gere les parametres d'url
        // on separe les parametres dans un tableau
        $params = [];
        if (isset($_GET['p']))
            $params = explode('/', $_GET['p']);

        // if ($params[0] != '') {
        if (count($params) > 0) {
            // on a au moins un parametre
            // on recupere le nom du controlleur à instancier
            // on met une majuscule en 1ere lettre, on ajoute le namespace complet avant et on ajoute Controller apres
            $controller = '\\App\\Controllers\\' . ucfirst(array_shift(($params))) . 'Controller';
            // die($controller);
            echo "<script>alert(" . $controller . ")</script>";

            // on met le namespace complet car on va instancier le controleur
            $controller = new $controller();

            // on recupere un eventuel 2e parametre = action
            $action = (isset($params[0])) ? array_shift($params) : 'index';

            echo "<script>alert(" . $action . ")</script>";


            // est ce que la methode existe ds le controleur
            if (method_exists($controller, $action)) {
                // s'il reste des parametres on les passe à la methode sous forme de tableau
                // (isset($params[0])) ? $controller->$action($params) : $controller->$action();
                (isset($params[0])) ? call_user_func_array([$controller, $action], $params) : $controller->$action();
            } else {
                http_response_code(404);
                echo "La page recherchée n'existe pas";
            }
        } else {
            die('pas de parametre');

            // on n'a pas de parametre
            // on instancie le controleur par defaut
            $controller = new MainController();
            $controller->index();
        }
    }
}
