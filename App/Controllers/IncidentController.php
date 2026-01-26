<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\IncidentRepository;

final class IncidentController extends Controller
{
    private IncidentRepository $incidents;

    public function __construct(
        Request $request,
        IncidentRepository $incidents
    ) {
        parent::__construct($request);
        $this->incidents = $incidents;
    }

    public function index(): Response
    {
        $incidents = $this->incidents->findAll();
        return $this->view('incident/index', [
            'title' => 'Incidents en cours',
            'incidents' => $incidents
        ]);
    }

    public function show(): Response
    {
        $id = (int) $this->request->query('id');
        $incident = $this->incidents->findOneById($id);

        if (!$incident) {
            return new Response('Incident introuvable', 404);
        }

        return $this->view('incident/show', ['incident' => $incident]);
    }

    public function create(): Response
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();
        if (!isset($_SESSION['user_id'])) {
            return Response::redirect('/login');
        }

        return $this->view('citizen/create_incident', ['title' => 'Déclarer un incident']);
    }

    public function store(): Response
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();
        if (!isset($_SESSION['user_id'])) {
            return Response::redirect('/login');
        }

        $data = [
            'title' => trim((string) $this->request->input('title')),
            'description' => trim((string) $this->request->input('description')),
            'date' => date('Y-m-d H:i:s'),
            'priority' => 'Low',
            'type' => $this->request->input('type'),
            'status' => 'En attente',
            'users_id' => $_SESSION['user_id'],
            'villain_profile_id' => null,

            'address_numero' => (int) $this->request->input('numero'),
            'address_complement' => $this->request->input('complement_numero'),
            'address_street' => trim((string) $this->request->input('street')),
            'address_zipcode' => (int) $this->request->input('zipcode'),
            'address_city' => trim((string) $this->request->input('city')),
        ];

        if (empty($data['title']) || empty($data['address_city']) || empty($data['address_street'])) {
            return Response::redirect('/incident/create');
        }

        $this->incidents->create($data);

        return Response::redirect('/citizen/dashboard');
    }
}