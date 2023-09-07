<?php

namespace App\Controller;

use Core\View\View;
use Core\Controller\Controller;

class UserController extends Controller
{
    public function login()
    {
        // On créer un tableau de donnée à envoyer à la vue
        $data = [
            'title_tag' => 'Connexion utilisateur',
        ];

        // Instanciation de la vue
        $view = new View('user/login');
        $view->render($data);
    }

    public function signin()
    {
        // On créer un tableau de donnée à envoyer à la vue
        $data = [
            'title_tag' => 'Connexion utilisateur',
        ];

        // Instanciation de la vue
        $view = new View('user/signin');
        $view->render($data);
    }
}
