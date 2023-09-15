<?php

namespace App\Controller;

use App\Model\User;
use Core\View\View;
use Core\Form\FormError;
use Core\Form\FormResult;
use Core\Session\Session;
use Core\Controller\Controller;
use Core\Repository\AppRepoManager;
use Laminas\Diactoros\ServerRequest;

// Identifiant:
// - admin: doe@doe.com - mdp: doe
// - admin: toto@toto.com - mdp: toto

class AuthController extends Controller
{
    public const AUTH_SALT = 'c56a7523d96942a834b9cdc249bd4e8c7aa9';
    public const AUTH_PEPPER = '8d746680fd4d7cbac57fa9f033115fc52196';

    public function login()
    {
        // On va créer une instance de View pour afficher la vue de connexion
        // On lui passe false en 2eme parametre pour is_complete = false
        // Du coup on ne chargera pas le header et le footer
        $view = new View('auth/login', false);

        $view_data = [
            'form_result' => Session::get(Session::FORM_RESULT)
        ];

        // render = méthode de la classe View qui permet d'afficher la vue
        $view->render($view_data);
    }

    // Méthode qui receptionne les données du formulaire de connexion
    public function loginPost(ServerRequest $request)
    {
        // On récupere les données du formulaire dans une variable
        $post_data = $request->getParsedBody();
        // On va créer une instance de FormResult
        $form_result = new FormResult();

        // On créer une instance de User
        $user = new User();


        // On vérifie que les champs sont remplis
        if (empty($post_data['email']) || empty($post_data['password'])) {
            $form_result->addError(new FormError('Tous les champs sont obligatoires'));
        } else {
            // Sinon on confonte les valeurs saisies avec les données en BDD

            // On redefinit des variables
            $email = $post_data['email'];
            $password = self::hash($post_data['password']);

            // Appel du repository pour vérifier que l'utilisateur existe
            $user = AppRepoManager::getRm()->getUserRepo()->checkAuth($email, $password);

            // Si retour négatif, on afficher un message d'erreur
            if (is_null($user)) {
                $form_result->addError(new FormError('Email ou mot de passe incorrect'));
            }
        }

        // Si il y a des erreurs, on renvoie vers la page connexion
        if ($form_result->hasError()) {
            Session::set(Session::FORM_RESULT, $form_result);
            self::redirect('/connexion');
        }

        // Si tout s'est bien passé on enregistre l'utilisateur en session et on redirige vers la page d'accueil
        // On efface le mot de passe
        $user->password = '';
        Session::set(Session::USER, $user);
        // Puis on redirige
        self::redirect('/');
    }

    // méthode de déconnexion
    public function logout()
    {
        // On détruit la session
        Session::remove(Session::USER);
        self::redirect('/');
    }

    // Méthode hashage du mot de passe
    public static function hash(string $password): string
    {
        return hash('sha512', self::AUTH_SALT . $password . self::AUTH_PEPPER);
    }

    public static function isAuth(): bool
    {
        return !is_null(Session::get(Session::USER));
    }

    private static function hasRole(int $role): bool
    {
        // On récupéere les infos de l'utilisateur en session
        $user = Session::get(Session::USER);
        if (!($user instanceof User)) {
            return false;
        }
        return $user->is_hote === $is_hote +;
    }

    public static function isSubscriber(): bool
    {
        return self::hasRole(User::ROLE_SUBSCRIBER);
    }


    public static function isAdmin(): bool
    {
        return self::hasRole(User::ROLE_ADMINISTRATOR);
    }
}