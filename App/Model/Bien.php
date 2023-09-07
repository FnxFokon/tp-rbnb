<?php

namespace App\Model;

use App\Model\User;
use Core\Model\Model;
use App\Model\TypeBien;

class Bien extends Model
{
    public string $titre;
    public string $addresse;
    public string $description;
    public int $prix;
    public int $taille;
    public int $nbr_piece;
    public int $nbr_couchage;
    public int $type_bien_id;
    public int $user_id;

    // Propriété associatives
    // Relation entre les tables dans la BDD
    public ?TypeBien $type_bien;
    public ?User $user;
}
