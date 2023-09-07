<?php

namespace App\Model\Repository;

use App\Model\TypeBien;
use Core\Repository\Repository;

class TypeBienRepository extends Repository
{
    public function getTableName(): string
    {
        return 'type_bien';
    }

    public function getAllTypeBien()
    {
        return $this->readAll(TypeBien::class);
    }
}
