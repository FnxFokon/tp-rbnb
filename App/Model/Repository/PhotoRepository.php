<?php

namespace App\Model\Repository;

use App\Model\Bien;
use App\Model\Photo;
use Core\Repository\Repository;
use Core\Repository\AppRepoManager;

class PhotoRepository extends Repository
{
    public function getTableName(): string
    {
        return 'photo';
    }

    public function getAllPhoto()
    {
        return $this->readAll(Photo::class);
    }

    public function getAllPhotoById(int $id): ?array
    {
        // On crée la requete
        // SELECT photo.image_path, photo.slug
        // FROM photo
        // WHERE photo.bien_id= 2
        $q = sprintf(
            'SELECT 
                   *
                    FROM %s
                    WHERE bien_id = :id',
            $this->getTableName(), // %s

        );
        // On déclare un tableau vide
        $arr_result = [];

        // On prépare la requete
        $stmt = $this->pdo->prepare($q);

        // On vérifie que la requete est bien préparé
        if (!$stmt) return $arr_result;

        // On éxécute la requete
        $stmt->execute(['id' => $id]);

        // Si la requete n'est pas valide on retourne le tableau vide
        if (!$stmt) return $arr_result;

        // On boucle sur les données de la requete
        while ($row_data = $stmt->fetch()) {
            // On stock dans $arr_result un nouvel objet de la classe $class_name
            $photo = new Photo($row_data);

            $arr_result[] = $photo;
        }

        // On retourne le tableau
        return $arr_result;
    }
}
