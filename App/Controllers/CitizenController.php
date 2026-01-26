<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\UserRepository;

final class CitizenController extends Controller
{
    private UserRepository $users;

    public function __construct(Request $request, UserRepository $users)
    {
        parent::__construct($request);
        $this->users = $users;

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index(): Response
    {
        if (!isset($_SESSION['user_id'])) {
            return Response::redirect('/login');
        }

        return $this->view('citizen/dashboard', [
            'title' => 'Tableau de bord Citoyen'
        ]);
    }

    public function createIncident(): Response
    {
        if (!isset($_SESSION['user_id'])) {
            return Response::redirect('/login');
        }

        return $this->view('citizen/create_incident', [
            'title' => 'Déclarer un incident'
        ]);
    }
}