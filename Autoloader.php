<?php

namespace App;

class Autoloader
{
    static function register()
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }

    static function autoload($class)
    {
        // on recupere ds class, la totalité du namespace de la classe concernée
        // echo $class;

        // on enleve App\ pour avoir chemin d'acces au fichier
        // echo __NAMESPACE__;
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);
        // echo $class;

        // on remplace les \ par des /
        $class = str_replace('\\', '/', $class);

        // __DIR__ = dossier dans lequel se trouve autoloader
        $fichier =  __DIR__ . '/' . $class . '.php';

        if (file_exists($fichier)) {
            require_once $fichier;
        }
    }
}
