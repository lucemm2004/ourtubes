<?php

namespace App\Controllers;

class SingleController extends Controller
{
    public function index()
    {
        // echo "ceci est la page d'accueil";

        $this->render('single/index', [], 'default');
    }
}
