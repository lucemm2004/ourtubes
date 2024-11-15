<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\UserModel;

class UserController extends Controller
{
    /**
     * connexion de l'utilisateur
     * @return void
     */
    public function login()
    {
        echo "<script>alert('login')</script>";


        // unset($_SESSION['user']);

        // $_SESSION['user'] = ['id' => 1, 'email' => 'lucemm2004@hotmail.com'];
        // var_dump($_SESSION);

        // on verifie si le formulaire est valide
        // if (Form::validate($_POST, ['email', 'password'])) {
        //     // forumailre complet
        //     // on va chercher l'utilisateur en bd avec son email
        //     $usersModel = new UserModel;
        //     $userArray = $usersModel->findOneByEmail(strip_tags($_POST['email']));
        //     // l'utilisateur n'existe pas
        //     if (!$userArray) {
        //         $_SESSION['erreur'] = "L'adresse email et / ou mot de passe est incorrect";
        //         header('Location: /AT_EDI/public/users/login');
        //         exit;
        //     }
        //     // l'utilisateur existe
        //     // on hydrate l'objet
        //     $user = $usersModel->hydrate($userArray);
        //     // var_dump($user);

        //     // on verifie si le mot de passe est corect
        //     // if (password_verify($_POST['password'], $user->getPassword())) {
        //     // mot de passe bon
        //     // on cree la session
        //     $user->setSession();
        //     header('Location: /AT_EDI/public/cataloguepf');
        //     // L'adresse de la page (si elle existe) qui a conduit le client à la page courante
        //     // n'a pas l'air de fonctionner
        //     // header('Location: ' . $_SERVER['HTTP_REFERER']);
        //     exit;
        //     // } else {
        //     //     // erreur
        //     //     $_SESSION['erreur'] = "L'adresse email et / ou mot de passe est incorrect";
        //     //     header('Location: /AT_EDI/public/users/login');
        //     //     exit;
        //     // }
        // }

        $form = new Form;
        $form->debutForm()
            ->ajoutLabelFor("email", "E-mail : ")
            ->ajoutInput("email", "email", ["class" => "form-control", "id" => "email"])
            ->ajoutLabelFor("pass", "Mot de passe :")
            ->ajoutInput("password", "password", ["id" => "pass", "class" => "form-control"])
            ->ajoutBouton("Me connecter", ["class" => "btn btn-primary"])
            ->finForm();

        // echo $form->create();

        $this->render('user/login', ["loginForm" => $form->create()]);
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

            // on nettoie l'adresse mail
            $pseudo = strip_tags($_POST['pseudo']);
            $password = strip_tags($_POST['password']);

            // on chiffre le mot de passe
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            // echo $pass;

            // on hydrate l'utilisateur
            $user = new UserModel;
            $user->setPseudo($pseudo)
                ->setPassword_hash($password_hash);
            // // var_dump($user);

            // // on stocke en base de donnees
            $user->create();

            // on redirige vers la page login
            header("Location: /" . APP_NAME . "/user/login");
            exit();
        }

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
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        header('Location: /AT_EDI/public/users/login');
        exit;
        exit;
    }
}
