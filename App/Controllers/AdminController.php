<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\UserRepository;
use App\Repository\IncidentRepository;
use App\Repository\VillainRepository;

final class AdminController extends Controller
{
    private UserRepository $users;
    private IncidentRepository $incidents;
    private VillainRepository $villains;

    public function __construct(
        Request $request,
        UserRepository $users,
        IncidentRepository $incidents,
        VillainRepository $villains
    ) {
        parent::__construct($request);
        $this->users = $users;
        $this->incidents = $incidents;
        $this->villains = $villains;

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        /*
        TODO: A remettre quand isAdmin Actif
        if (!$this->isAdmin()) {
            header('Location: /login');
            exit;
        }*/
    }

    private function isAdmin(): bool
    {
        if (!isset($_SESSION['user_role'])) {
            return false;
        }

        $roles = json_decode($_SESSION['user_role'], true);
        return is_array($roles) && in_array('ROLE_ADMIN', $roles);
    }

    public function index(): Response
    {
        $pendingHeroes = array_filter($this->users->findAll(), function ($user) {
            $roles = json_decode($user['role'], true);
            return is_array($roles) && in_array('ROLE_HERO_PENDING', $roles);
        });

        return $this->view('admin/dashboard', [
            'title' => 'DASHBOARD ADMIN',
            'pending_heroes' => $pendingHeroes,
            'total_incidents' => count($this->incidents->findAll()),
            'total_villains' => count($this->villains->findAll()),
            'total_users' => count($this->users->findAll())
        ]);
    }

    public function listIncidents(): Response
    {
        return $this->view('admin/incidents_list', [
            'title' => 'Gestion des Incidents',
            'incidents' => $this->incidents->findAll()
        ]);
    }

    
}