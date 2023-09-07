<?php

namespace App\Controller;

use Core\View\View;
use Core\Controller\Controller;
use Core\Repository\AppRepoManager;

class BienController extends Controller
{
    public function index()
    {
        // On créer un tableau de donnée à envoyer à la vue
        $data = [
            'title_tag' => 'Liste des biens',
            'biens' => AppRepoManager::getRm()->getBienRepository()->getAllBien(),
        ];

        // Instanciation de la vue
        $view = new View('bien/index');
        $view->render($data);
    }
}
