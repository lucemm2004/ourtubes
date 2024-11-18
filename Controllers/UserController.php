<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\UserModel;
use App\Utilities\Utils;

class UserController extends Controller
{
    /**
     * connexion de l'utilisateur
     * @return void
     */
    public function login()
    {
        // echo "<script>alert('login')</script>";

        unset($_SESSION['user']);

        $_SESSION['user'] = ['id' => 1, 'email' => 'lucemm2004@hotmail.com'];
        // var_dump($_SESSION);

        // on verifie si le formulaire est valide
        if (Form::validate($_POST, ['pseudo', 'password'])) {
            // le formulaire est valide

            // on nettoye les données provenant du formulaire
            $utils = new Utils;
            $pseudo = $utils->nettoyer_donnee($_POST['pseudo']);
            $password = $utils->nettoyer_donnee($_POST['password']);

            // on va chercher l'utilisateur en bd avec son email
            $userModel = new UserModel;
            $userArray = $userModel->findOneByPseudo($pseudo);

            // l'utilisateur n'existe pas
            if (!$userArray) {
                $_SESSION['erreur'] = "Le pseudo et / ou mot de passe est incorrect";
                header('Location: /' . APP_NAME . '/user/login');
                exit();
            }
            // l'utilisateur existe
            // on hydrate l'objet
            $user = $userModel->hydrate($userArray);
            // var_dump($user);

            // on verifie si le mot de passe est corect
            if (password_verify($password, $user->getPassword_hash())) {
                // mot de passe bon =>  on cree la session
                $user->setSession();
                header('Location: /' . APP_NAME . '/main');
                // L'adresse de la page (si elle existe) qui a conduit le client à la page courante
                // n'a pas l'air de fonctionner
                // header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                // erreur
                $_SESSION['erreur'] = "L'adresse email et / ou mot de passe est incorrect";
                header('Location: /' . APP_NAME . '/user/login');
                exit();
            }
        }

        // $form = new Form;
        // $form->debutForm()
        //     ->ajoutLabelFor("email", "E-mail : ")
        //     ->ajoutInput("email", "email", ["class" => "form-control", "id" => "email"])
        //     ->ajoutLabelFor("pass", "Mot de passe :")
        //     ->ajoutInput("password", "password", ["id" => "pass", "class" => "form-control"])
        //     ->ajoutBouton("Me connecter", ["class" => "btn btn-primary"])
        //     ->finForm();

        // echo $form->create();

        // $this->render('user/login', ["loginForm" => $form->create()]);
        $this->render('user/login');
    }

    /**
     * inscription de l'utilisateur
     * @return void
     */
    public function register()
    {

        // on verifie si le formulaire est valide cad pseudo et password ds le $_POST et non vides
        if (Form::validate($_POST, ['pseudo', 'password'])) {
            // le formulaire est valide

            // on nettoye les données provenant du formulaire
            $utils = new Utils;
            $pseudo = $utils->nettoyer_donnee($_POST['pseudo']);
            $password = $utils->nettoyer_donnee($_POST['password']);

            // existence du pseudo en bdd
            $user = new UserModel;
            if ($user->findOneByPseudo($pseudo)) {
                $_SESSION['erreur'] = "Pseudo non valide !";
                header("Location: /" . APP_NAME . "/user/register");
                exit();
            }

            // on chiffre le mot de passe
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            // echo $pass;

            // on hydrate l'utilisateur
            // $roles = '{"roles": "ROLE_USER"}';

            $user = new UserModel;
            $user->setPseudo($pseudo)
                ->setPassword_hash($password_hash);
            // var_dump($user);
            // die();

            // // on stocke en base de donnees
            $user->create();

            // on redirige vers la page login
            $_SESSION['success'] = "Vous pouvez vous connecter !";
            header("Location: /" . APP_NAME . "/user/login");
            exit();
        }

        // $_SESSION['erreur'] = "Formulaire incomplet !";

        // $form = new Form;
        // $form->debutForm()
        //     ->ajoutLabelFor("email", "E-mail : ")
        //     ->ajoutInput("email", "email", ["class" => "form-control", "id" => "email"])
        //     ->ajoutLabelFor("pass", "Mot de passe :")
        //     ->ajoutInput("password", "password", ["id" => "pass", "class" => "form-control"])
        //     ->ajoutBouton("M'inscrire", ["class" => "btn btn-primary"])
        //     ->finForm();
        // $this->render('user/register', ['registerForm' => $form->create()]);

        $this->render('user/register');
    }

    /**
     * déconnexion de l'utilisateur
     * @return void
     */
    public function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['erreur']);
        unset($_SESSION['success']);
        session_destroy();
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        // header('Location: /' . APP_NAME . '/user/login');
        header('Location: /' . APP_NAME . '/');
        exit();
    }
}
