<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\HeroProfileRepository;
use App\Repository\UserRepository;
use App\Repository\IncidentRepository;
use App\Repository\InterventionRepository;

final class HeroController extends Controller
{
    private HeroProfileRepository $heroProfile;
    private UserRepository $users;
    private IncidentRepository $incidents;
    private InterventionRepository $interventions; 

    public function __construct(
        Request $request,
        HeroProfileRepository $heroProfile,
        UserRepository $users,
        IncidentRepository $incidents,
        InterventionRepository $interventions 
    ) {
        parent::__construct($request);
        $this->heroProfile = $heroProfile;
        $this->users = $users;
        $this->incidents = $incidents;
        $this->interventions = $interventions; 
    }

    public function dashboard(): Response
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();

        if (!isset($_SESSION['user_role'])) {
            return Response::redirect('/login');
        }
        $roles = json_decode($_SESSION['user_role'], true);
        if (!is_array($roles) || !in_array('ROLE_HERO', $roles)) {
            return Response::redirect('/citizen/dashboard');
        }

        $hero = $this->heroProfile->findByUserId($_SESSION['user_id']);

        if (!$hero || $hero['is_active'] == 0) {
            return Response::redirect('/citizen/dashboard');
        }

        $availableIncidents = $this->incidents->findAllValidated();

        $myInterventions = $this->interventions->findByHeroId($hero['id']);

        return $this->view('hero/dashboard', [
            'title' => 'QG des Héros',
            'hero' => $hero,
            'available_incidents' => $availableIncidents,
            'my_interventions' => $myInterventions
        ]);
    }

    public function takeIncident(): Response
    {
        if ($this->request->method() !== 'POST')
            return Response::redirect('/hero/dashboard');
        if (session_status() === PHP_SESSION_NONE)
            session_start();

        $incidentId = (int) $this->request->input('incident_id');
        $hero = $this->heroProfile->findByUserId($_SESSION['user_id']);

        if ($incidentId && $hero) {
            if (!$this->interventions->isIncidentTaken($incidentId)) {
                $this->interventions->create($incidentId, $hero['id']);

                $this->incidents->updateStatus($incidentId, 'En cours');
            }
        }

        return Response::redirect('/hero/dashboard');
    }

    public function resolveIncident(): Response
    {
        if ($this->request->method() !== 'POST')
            return Response::redirect('/hero/dashboard');

        $interventionId = (int) $this->request->input('intervention_id');
        $incidentId = (int) $this->request->input('incident_id');

        if ($interventionId && $incidentId) {
            $this->interventions->complete($interventionId);

            $this->incidents->updateStatus($incidentId, 'Terminé');
        }

        return Response::redirect('/hero/dashboard');
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