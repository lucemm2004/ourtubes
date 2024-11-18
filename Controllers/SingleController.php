<?php

namespace App\Controllers;

use App\Models\SingleModel;

class SingleController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) {
            $singleModel = new SingleModel;
            $singles = $singleModel->showAll();

            $this->render('single/index', compact('singles'), 'default');
        } else {
            // utilisateur non connecté
            $_SESSION['erreur'] = "Vous devez être connecté(e) pour accéder à cette page";
            header('Location: /' . APP_NAME . '/user/login');
            exit();
        }
    }
}
