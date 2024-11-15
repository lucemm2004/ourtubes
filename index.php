<?php

use App\Core\Main;
use App\Autoloader;

// fichier central du projet
// sert en petite partie de routeur en vue de chosir le bon routeur
// en fonction de l'url
// il sert à lancer le routeur
// chaque fois que l'on chargera une page, on passera par ce fichier
// oindex est appelé avant l'autoloader

// on definit une constante contenant le dossier racine du projet (AT_EDI)
// on fait un define car on n'est pas ds une classe
// dirname renvoie le dossier parent du dossier ds lequel on se trouve
// si index.php est ds public -> ROOT = c:\xampp\htdocs\Ourtubes
// avec index.php et htaccess dans public
// define('ROOT', dirname(__DIR__));

// avec index.php et htaccess à la racine comme autoloader
define('ROOT', __DIR__);
define('APP_NAME', 'ourtubes');
// var_dump(ROOT);
// die();

// on importe l'autoloader
require_once ROOT . '/Autoloader.php';
Autoloader::register();

// on instancie Main (routeur)
$app = new Main();
// on démarre l'application
$app->start();
