<?php

namespace Core\Repository;

use PDO;
use Core\Model\Model;
use Core\Database\Database;
use Core\Database\DatabaseConfigInterface;

abstract class Repository
{
    protected PDO $pdo;

    abstract public function getTableName(): string;

    public function __construct(DatabaseConfigInterface $config)
    {
        $this->pdo = Database::getPDO($config);
    }

    protected function readAll(string $class_name): array
    {
        // On déclare un tableau vide
        $arr_result = [];

        // On crée la requete
        $q = sprintf("SELECT * FROM %s", $this->getTableName());

        // On execute la requete
        $stmt = $this->pdo->query($q);

        // Si la requete n'est pas valide on retourne le tableau vide
        if (!$stmt) return $arr_result;

        // On boucle sur les données de la requete
        while ($row_data = $stmt->fetch()) {
            // On stock dans $arr_result un nouvel objet de la classe $class_name
            $arr_result[] = new $class_name($row_data);
        }
        // On retourne le tableau
        return $arr_result;
    }

    protected function readById(string $class_name, int $id): ?Model
    {

        // On crée la requete
        $q = sprintf("SELECT * FROM %s WHERE id=:id", $this->getTableName());

        // On execute la requete
        $stmt = $this->pdo->prepare($q);

        // Si la requete n'est pas valide on retourne le tableau vide
        if (!$stmt) return null;

        // On execute la requete
        $stmt->execute(['id' => $id]);

        // On recupere les résultats
        $row_data = $stmt->fetch();

        return !empty($row_data) ? new $class_name($row_data) : null;
    }

    protected function delete(int $id)
    {
        // On crée la requete
        $q = sprintf("DELETE FROM %s WHERE id=:id", $this->getTableName());

        // On execute la requete
        $stmt = $this->pdo->prepare($q);

        // Si la requete n'est pas valide on retourne le tableau vide
        if (!$stmt) return false;

        // On execute la requete
        $stmt->execute(['id' => $id]);

        return true;
    }
}
