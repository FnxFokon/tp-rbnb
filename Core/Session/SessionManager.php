<?php

namespace Core\Session;

abstract class SessionManager
{
    // Pour pouvoir Alimenter notre session
    public static function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    // Pour pouvoir récuperer notre session
    public static function get(string $key)
    {
        if (!isset($_SESSION[$key])) return null;
        return $_SESSION[$key];
    }

    // Pour pouvoir vider la session
    public static function remove(string $key): void
    {
        // Si j'aessaye de supprimer une session qui n'existe pas, je ne fais rien
        if (!self::get($key)) return;
        // Sinon je supprime la session
        unset($_SESSION[$key]);
    }
}
