<?php

namespace App\Controllers;

abstract class Controller
{
    public function render(string $fichier, array $donnees = [], string $template = 'default')
    {
        // on extrait le contenu des donnees
        extract($donnees);
        // on démarre le buffer de sortie
        ob_start();
        // à partir de ce point toute sortie est conservée en mémoire

        // on crée le chemin vers la vue
        require_once ROOT . '/Views/' . $fichier . '.php';

        // on recupere le contenu du buffer
        $contenu = ob_get_clean();

        // le template default utilise la variable $contenu => affichage
        require_once ROOT . '/Views/' . $template . '.php';
    }

    /**
     * retourne la vue en HTML
     * @param string $fichier
     * @param array $donnees
     * @param string $template
     * @return string
     */
    public function renderView(string $fichier, array $donnees = [], string $template = 'default'): string
    {
        // on extrait le contenu des donnees
        extract($donnees);
        // on démarre le buffer de sortie
        ob_start();
        // à partir de ce point toute sortie est conservée en mémoire

        // on crée le chemin vers la vue
        require_once ROOT . '/Views/' . $fichier . '.php';

        // on recupere le contenu du buffer
        $contenu = ob_get_clean();
        // var_dump($contenu);
        // die();

        return $contenu;
    }
}
