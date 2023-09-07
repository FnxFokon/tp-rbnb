<?php

namespace App\Model;

use App\Model\Bien;
use Core\Model\Model;


class Photo extends Model
{
    public string $image_path;
    public string $slug;
    public int $bien_id;

    // Propriété associatives
    // Relation entre les tables dans la BDD
    public ?Bien $bien;
}
