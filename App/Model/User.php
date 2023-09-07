<?php

namespace App\Model;

use Core\Model\Model;

class User extends Model
{
    public string $nom;
    public string $prenom;
    public string $email;
    public string $password;
    public bool $is_hote;
}
