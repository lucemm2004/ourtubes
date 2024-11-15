<?php

namespace App\Controllers;

class MainController extends Controller
{
    public function index()
    {
        // echo "ceci est la page d'accueil";

        $this->render('main/index', [], 'default');
    }
}
