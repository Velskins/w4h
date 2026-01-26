<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\HeroProfileRepository;
use App\Repository\UserRepository;

final class HeroController extends Controller
{
    private HeroProfileRepository $heroProfile;
    private UserRepository $users;

    public function __construct(Request $request, HeroProfileRepository $heroProfile, UserRepository $users)
    {
        parent::__construct($request);
        $this->heroProfile = $heroProfile;
        $this->users = $users;
    }

    public function create(): Response
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();

        if (!isset($_SESSION['user_id'])) {
            return Response::redirect('/login');
        }

        if ($this->heroProfile->findByUserId($_SESSION['user_id'])) {
            return $this->view('hero/already_applied', ['title' => 'Candidature envoyée']);
        }

        return $this->view('hero/create', ['title' => 'Devenir un Super-Héros']);
    }

    public function store(): Response
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();

        if (!isset($_SESSION['user_id'])) {
            return Response::redirect('/login');
        }

        $userId = $_SESSION['user_id'];

        $alias = trim((string) $this->request->input('alias'));
        $description = trim((string) $this->request->input('description'));
        $specialty = trim((string) $this->request->input('specialty'));
        $sector = $this->request->input('sector');

        $photoUrl = trim((string) $this->request->input('photo_url'));

        $this->heroProfile->create([
            'alias' => $alias,
            'description' => $description,
            'photo_path' => $photoUrl, 
            'specialty' => $specialty,
            'sector' => $sector,
            'users_id' => $userId,
            'is_active' => 0
        ]);


        $user = $this->users->findOneById($userId);
        $roles = json_decode($user['role'], true);

        if (!is_array($roles)) {
            $roles = [];
        }

        if (!in_array('ROLE_HERO_PENDING', $roles)) {
            $roles[] = 'ROLE_HERO_PENDING';
            $this->users->updateRole($userId, json_encode($roles));
        }

        return Response::redirect('/citizen/dashboard');
    }
}