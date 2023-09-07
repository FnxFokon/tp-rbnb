<?php

namespace Core\Repository;

use Core\App;
use App\Model\Repository\BienRepository;
use App\Model\Repository\PhotoRepository;
use App\Model\Repository\TypeBienRepository;

class AppRepoManager
{
    // On importe le trait
    use RepositoryManagerTrait;

    // Exemple d'une déclaration d'un repo
    // private UserRepository $userRepository;
    private BienRepository $bienRepository;
    private TypeBienRepository $typeBienRepository;
    private PhotoRepository $photoRepository;

    // Exemple d'un getter
    // on créerle getter
    // Celui de UserRepository
    // public function getUserRepo(): UserRepository
    // {
    //     return $this->userRepository;
    // }

    // Get the value of bienRepository
    public function getBienRepository()
    {
        return $this->bienRepository;
    }

    // Get the value of typeBienRepository
    public function getTypeBienRepository()
    {
        return $this->typeBienRepository;
    }


    // Get the value of photoRepository
    public function getPhotoRepository()
    {
        return $this->photoRepository;
    }

    protected function __construct()
    {
        $config = App::getApp();
        // Exemple d'un repo enrestrer
        // $this->userRepository = new UserRepository($config);
        $this->bienRepository = new BienRepository($config);
        $this->typeBienRepository = new TypeBienRepository($config);
        $this->photoRepository = new PhotoRepository($config);
    }
}
