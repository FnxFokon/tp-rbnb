<?php

namespace Core;

use MiladRahimi\PhpRouter\Router;
use Exceptions\RouteNotFindException;
use Core\Database\DatabaseConfigInterface;
use MiladRahimi\PhpRouter\Exceptions\InvalidCallableException;

class App implements DatabaseConfigInterface
{

    // On va déclarer des constantes pour la connexion à la base de données
    private const DB_HOST = 'database';
    private const DB_NAME = 'site_jvd';
    private const DB_USER = 'admin';
    private const DB_PASS = 'admin';

    // On va créer une propriété qui va contenir l'instance de notre classe
    private static ?self $instance = null;

    // Propriété qui contient l'instance de Router (MiladRahimi)
    private Router $router;

    // Création d'une méthode qui sera appelé au démarrage de l'appli dans index.php
    public static function getApp(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Méthode qui instancie Router
    public function getRouter(): Router
    {
        return $this->router;
    }

    private function __construct()
    {
        // Router::create = méthode statique de la classe Router qui permet de créer uns instance de Router
        $this->router = Router::create();
    }

    // Un fois le Router instancié, on aura 3 méthode à définir

    // 1: Méthode start(): void
    public function start(): void
    {
        // On démarre la session
        session_start();

        // On enregistre les routes
        $this->registerRoutes();

        // On démarrer le router
        $this->startRouter();
    }

    // 2: Méthode registerRoutes (enregistrement des routes)
    private function registerRoutes(): void
    {
        // // On créer la route pour la page d'accueil
        // $this->router->get('/', function () {
        //     echo 'utiliser le controlleur pour envoyer la vue';
        // });

        // Déclaration des patterns pour tester les valeurs des arguments
        $this->router->pattern('id', '[0-9]\d*');
        $this->router->pattern('slug', '(\d+-)?[a-z]+(-[a-z-\d]+)*');

        // On crée la route pour la page d'accueil avec le controlleur
        // Exemple d'une route
        // $this->router->get('/', [ToyController::class, 'index']);
        $this->router->get('/', function () {
            return 'Hello World';
        });
    }

    // 3: Méthode startRouter (démarrage du router)
    private function startRouter(): void
    {
        try {
            $this->router->dispatch();
        } catch (RouteNotFindException $e) {
            echo $e->getMessage();
        } catch (InvalidCallableException $e) {
            echo $e->getMessage();
        }
    }

    // On doit obligatoirement déclarer les méthodes issu de l'interface
    public function getHost(): string
    {
        return self::DB_HOST;
    }

    public function getName(): string
    {
        return self::DB_NAME;
    }

    public function getUser(): string
    {
        return self::DB_USER;
    }

    public function getPass(): string
    {
        return self::DB_PASS;
    }
}
