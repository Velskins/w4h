<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\UserRepository;
use App\Repository\IncidentRepository;
use App\Repository\VillainRepository;
use App\Repository\HeroProfileRepository;

final class AdminController extends Controller
{
    private UserRepository $users;
    private IncidentRepository $incidents;
    private VillainRepository $villains;
    private HeroProfileRepository $heroProfile;

    public function __construct(
        Request $request,
        UserRepository $users,
        IncidentRepository $incidents,
        VillainRepository $villains,
        HeroProfileRepository $heroProfile
    ) {
        parent::__construct($request);
        $this->users = $users;
        $this->incidents = $incidents;
        $this->villains = $villains;
        $this->heroProfile = $heroProfile;

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!$this->isAdmin()) {
            header('Location: /login');
            exit;
        }
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

        $pendingIncidents = $this->incidents->findAllPending();

        $statsByType = $this->incidents->getStatsByType();

        return $this->view('admin/dashboard', [
            'title' => 'DASHBOARD ADMIN',
            'pending_heroes' => $pendingHeroes,
            'pending_incidents' => $pendingIncidents,
            'total_incidents' => count($this->incidents->findAll()),
            'total_villains' => count($this->villains->findAll()),
            'total_users' => count($this->users->findAll()),

            'stats_by_type' => $statsByType
        ]);
    }

    public function validateIncident(): Response
    {
        if (!$this->isAdmin()) {
            return Response::redirect('/login');
        }

        if ($this->request->method() === 'POST') {
            $id = (int) $this->request->input('id');
            $status = (string) $this->request->input('status');

            if ($id && ($status === 'Validé' || $status === 'Refusé')) {
                $this->incidents->updateStatus($id, $status);
            }
        }

        return Response::redirect('/admin');
    }

    public function validateHero(): Response
    {
        if (!$this->isAdmin()) {
            return Response::redirect('/login');
        }

        if ($this->request->method() === 'POST') {
            $userId = (int) $this->request->input('user_id');
            $decision = (string) $this->request->input('decision');

            if ($userId && $decision) {
                if ($decision === 'approve') {
                    $this->heroProfile->activateByUserId($userId);
                    $this->users->updateRole($userId, json_encode(['ROLE_HERO']));
                } elseif ($decision === 'reject') {
                    $this->heroProfile->deleteByUserId($userId);
                    $this->users->updateRole($userId, json_encode(['ROLE_CITIZEN']));
                }
            }
        }
        return Response::redirect('/admin');
    }

    public function listIncidents(): Response
    {
        return $this->view('admin/incidents_list', [
            'title' => 'Gestion des Incidents',
            'incidents' => $this->incidents->findAll()
        ]);
    }
}