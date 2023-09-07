<?php

namespace App\Model\Repository;

use App\Model\Bien;
use Core\Repository\Repository;
use Core\Repository\AppRepoManager;

class BienRepository extends Repository
{
    public function getTableName(): string
    {
        return 'bien';
    }

    public function getAllBien()
    {
        return $this->readAll(Bien::class);
    }
}
