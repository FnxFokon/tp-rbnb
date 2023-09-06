<?php

namespace Core\Database;

use PDO;

// Designe Pattern Singleton
class Database
{
    private static ?PDO $pdoInstance = null;

    private const PDO_OPTIONS = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    // On crée une méthode statique qui va nous permettre de récupérer une instance de PDO
    // On lui passe en paramètre une instance de DatabaseConfigInterface
    public static function getPDO(DatabaseConfigInterface $config): PDO
    {
        // Si l'instance de PDO n'a jamais été instancié on la crée
        if (is_null(self::$pdoInstance)) {
            // $dsn = 'mysql:dbname=site_mvc;host=database';
            $dsn = sprintf('mysql:dbname=%s;host=%s', $config->getName(), $config->getHost());
            self::$pdoInstance = new PDO(
                $dsn,
                $config->getUser(), // ici les infos de l'utilisateur
                $config->getPass(), // Ici le mot de passe
                self::PDO_OPTIONS
            );
        }
        // On retourne l'instance de PDO
        return self::$pdoInstance;
    }

    // On déclare le constructeur en private pour bloquer l'instanciation de la classe
    private function __construct()
    {
    }

    // On déclare la méthode clone en private pour bloquer le clonage de la classe
    private function __clone()
    {
    }

    // On déclare la méthode wakeup en private pour bloquer la deserialisation de la classe
    public function __wakeup()
    {
    }
}
