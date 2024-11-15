<?php

namespace App\Controllers;

class AlbumController extends Controller
{
    public function index()
    {
        // echo "ceci est la page d'accueil";

        $this->render('album/index', [], 'default');
    }
}
