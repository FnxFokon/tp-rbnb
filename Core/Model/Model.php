<?php

namespace Core\Model;

abstract class Model
{
    public int $id;

    public function __construct(array $data_row = [])
    {
        // Si on a des données, on les injecte dans l'objet
        foreach ($data_row as $column => $value) {
            // Si la propriété n'existe pas, on passe a la suivante
            if (!property_exists($this, $column)) continue;
            // On injecte la valeur dans la propriété
            $this->$column = $value;
        }
    }
}
