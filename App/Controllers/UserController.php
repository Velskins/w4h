<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\UserRepository;
use App\Core\Mailer;

final class UserController extends Controller
{
    private UserRepository $users;
    private Mailer $mailer;

    public function __construct(
        Request $request,
        UserRepository $users,
        Mailer $mailer = null
    ) {
        parent::__construct($request);
        $this->users = $users;
        $this->mailer = $mailer ?? new Mailer();
    }


    public function profile(): Response
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $userId = $_SESSION['user_id'] ?? null;
        if (!$userId) {
            return Response::redirect('/login');
        }

        $user = $this->users->findOneById((int) $userId);
        if (!$user) {
            return Response::redirect('/login');
        }

        return $this->view('user/profile', [
            'title' => 'Mon Profil',
            'user' => $user
        ]);
    }


    public function register(): Response
    {
        return $this->view('auth/register', [
            'title' => 'Inscription'
        ]);
    }

    public function handleRegister(): Response
    {
        $email = trim((string) $this->request->input('email'));
        $pwd = (string) $this->request->input('pwd');
        $lastname = trim((string) $this->request->input('lastname'));
        $firstname = trim((string) $this->request->input('firstname'));
        $isHero = $this->request->input('is_hero');

        if (empty($email) || empty($pwd) || empty($lastname) || empty($firstname)) {
            return $this->view('auth/register', [
                'error' => 'Tous les champs obligatoires doivent être remplis',
                'title' => 'Inscription'
            ], 422);
        }

        if ($this->users->findOneByEmail($email)) {
            return $this->view('auth/register', [
                'error' => 'Cet email est déjà utilisé',
                'title' => 'Inscription'
            ], 422);
        }

        $role = $isHero ? ['ROLE_HERO_PENDING'] : ['ROLE_CITIZEN'];

        $data = [
            'email' => $email,
            'pwd' => password_hash($pwd, PASSWORD_DEFAULT),
            'lastname' => $lastname,
            'firstname' => $firstname,
            'gender' => $this->request->input('gender') ?? 'other',
            'birthdate' => $this->request->input('birthdate'),
            'phone' => $this->request->input('phone') ?: '0000000000',
            'street_number' => $this->request->input('street_number') ?: 0,
            'complement_number' => $this->request->input('complement_number') ?: '',
            'street' => $this->request->input('street') ?: '',
            'zipcode' => $this->request->input('zipcode') ?: 0,
            'city' => $this->request->input('city') ?: '',
            'role' => json_encode($role)
        ];

        $this->users->create($data);

        return Response::redirect('/login');
    }


    public function login(): Response
    {
        return $this->view('auth/login', [
            'title' => 'Connexion'
        ]);
    }

    public function handleLogin(): Response
    {
        $email = trim((string) $this->request->input('email'));
        $pwd = (string) $this->request->input('pwd');

        $user = $this->users->findOneByEmail($email);

        if ($user && password_verify($pwd, $user['pwd'])) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_firstname'] = $user['firstname'];
            $_SESSION['user_role'] = $user['role'];

            $roles = json_decode($user['role'], true);
            $redirectUrl = '/citizen/dashboard';

            if (is_array($roles)) {
                if (in_array('ROLE_ADMIN', $roles)) {
                    $redirectUrl = '/admin';
                } elseif (in_array('ROLE_HERO', $roles)) {
                    $redirectUrl = '/hero/dashboard';
                }
            }

            return Response::redirect($redirectUrl);
        }

        return $this->view('auth/login', [
            'error' => 'Identifiants incorrects',
            'title' => 'Connexion'
        ], 401);
    }

    public function logout(): Response
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_destroy();

        return Response::redirect('/login');
    }


    public function forgotPassword(): Response
    {
        return $this->view('auth/forgot', [
            'title' => 'Mot de passe oublié'
        ]);
    }

    public function handleForgotPassword(): Response
    {
        $email = trim((string) $this->request->input('email'));

        if (empty($email)) {
            return $this->view('auth/forgot', ['error' => 'Veuillez entrer votre email.', 'title' => 'Oubli']);
        }

        $user = $this->users->findOneByEmail($email);

        if ($user) {
            $host = $_SERVER['HTTP_HOST'];

            $resetLink = "http://$host/reset-password?token=demo123&email=" . urlencode($email);

            $subject = "Réinitialisation de votre mot de passe";
            $message = "
                <h1>Bonjour {$user['firstname']},</h1>
                <p>Pour définir un nouveau mot de passe, cliquez ici :</p>
                <p><a href='$resetLink'><strong>Changer mon mot de passe</strong></a></p>
            ";

            $this->mailer->send($email, $subject, $message);
        }

        return $this->view('auth/forgot_success', ['title' => 'Email envoyé']);
    }

    public function resetPassword(): Response
    {
        $token = $this->request->query('token');
        $email = $this->request->query('email');

        if ($token !== 'demo123' || empty($email)) {
            return Response::redirect('/login');
        }

        return $this->view('auth/reset_password', [
            'title' => 'Nouveau mot de passe',
            'email' => $email,
            'token' => $token
        ]);
    }

    public function handleResetPassword(): Response
    {
        $token = $this->request->input('token');
        $email = $this->request->input('email');
        $pwd = (string) $this->request->input('pwd');
        $pwdConfirm = (string) $this->request->input('pwd_confirm');

        if ($token !== 'demo123' || empty($email)) {
            return Response::redirect('/login');
        }

        if ($pwd !== $pwdConfirm) {
            return $this->view('auth/reset_password', [
                'title' => 'Nouveau mot de passe',
                'email' => $email,
                'token' => $token,
                'error' => 'Les mots de passe ne correspondent pas.'
            ]);
        }

        $user = $this->users->findOneByEmail($email);

        if ($user) {
            $this->users->updatePassword($user['id'], password_hash($pwd, PASSWORD_DEFAULT));
        }

        return Response::redirect('/login');
    }


    public function editProfile(): Response
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $userId = $_SESSION['user_id'] ?? null;
        if (!$userId) {
            return Response::redirect('/login');
        }

        $user = $this->users->findOneById((int) $userId);

        return $this->view('user/edit_profile', [
            'title' => 'Éditer mon profil',
            'user' => $user
        ]);
    }

    public function handleEditProfile(): Response
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $userId = $_SESSION['user_id'] ?? null;
        if (!$userId) {
            return Response::redirect('/login');
        }

        $existingUser = $this->users->findOneById((int) $userId);
        if (!$existingUser) {
            return Response::redirect('/login');
        }

        $data = [
            'email' => trim((string) $this->request->input('email')),
            'firstname' => trim((string) $this->request->input('firstname')),
            'lastname' => trim((string) $this->request->input('lastname')),
            'gender' => $this->request->input('gender') ?? 'other',
            'birthdate' => $this->request->input('birthdate'),
            'phone' => $this->request->input('phone') ?? '',
            'street_number' => $this->request->input('street_number') ?? null,
            'complement_number' => $this->request->input('complement_number') ?? null,
            'street' => $this->request->input('street') ?? '',
            'zipcode' => $this->request->input('zipcode') ?? null,
            'city' => $this->request->input('city') ?? '',

            'pwd' => $existingUser['pwd'],
            'role' => $existingUser['role']
        ];

        $this->users->update((int) $userId, $data);

        return Response::redirect('/profile');
    }

    public function heroes(): Response
    {
        $heroes = $this->users->findHeroes();

        return $this->view('user/heroes', [
            'title' => 'Liste des héros',
            'heroes' => $heroes
        ]);
    }

    public function showProfile(): Response
    {
        $id = (int) $this->request->query('id');
        $hero = $this->users->findOneById($id);

        if (!$hero) {
            return new Response('Héros introuvable', 404);
        }

        return $this->view('user/show_profile', [
            'title' => 'Profil du héros',
            'hero' => $hero
        ]);
    }
}