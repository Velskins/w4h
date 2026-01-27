<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\UserRepository;
use App\Repository\IncidentRepository; 

final class CitizenController extends Controller
{
    private UserRepository $users;
    private IncidentRepository $incidents;

    public function __construct(Request $request, UserRepository $users, IncidentRepository $incidents)
    {
        parent::__construct($request);
        $this->users = $users;
        $this->incidents = $incidents; 
    }

    public function index(): Response
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Vérification de sécurité
        if (!isset($_SESSION['user_id'])) {
            return Response::redirect('/login');
        }

        $myIncidents = $this->incidents->findByUserId($_SESSION['user_id']);

        return $this->view('citizen/dashboard', [
            'title' => 'Espace Citoyen',
            'my_incidents' => $myIncidents 
        ]);
    }
}