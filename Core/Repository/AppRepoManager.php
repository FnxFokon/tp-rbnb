<?php

namespace Core\Repository;

use Core\App;

class AppRepoManager
{
    // On importe le trait
    use RepositoryManagerTrait;

    // Exemple d'une déclaration d'un repo
    // private UserRepository $userRepository;

    // Exemple d'un getter
    // on créerle getter
    // Celui de UserRepository
    // public function getUserRepo(): UserRepository
    // {
    //     return $this->userRepository;
    // }

    protected function __construct()
    {
        $config = App::getApp();
        // Exemple d'un repo enrestrer
        // $this->userRepository = new UserRepository($config);
    }
}
