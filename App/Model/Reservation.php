<?php

namespace App\Model;

use App\Model\Bien;
use App\Model\User;
use Core\Model\Model;


class Reservation extends Model
{
    public int $date_debut;
    public int $date_fin;
    public int $bien_id;
    public int $user_id;

    // Propriété associatives
    // Relation entre les tables dans la BDD
    public ?Bien $bien;
    public ?User $user;
}
