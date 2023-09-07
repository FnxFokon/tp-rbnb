<?php

namespace App\Model;

use App\Model\Bien;
use Core\Model\Model;
use App\Model\Equipement;


class BienEquipement extends Model
{
    public int $equipement_id;
    public int $bien_id;

    // Propriété associatives
    // Relation entre les tables dans la BDD
    public ?Equipement $equipement;
    public ?Bien $bien;
}
