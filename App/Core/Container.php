<?php
declare(strict_types=1);

namespace App\Core;

use PDO;
use App\Core\Request;

use App\Controllers\UserController;
use App\Controllers\IncidentController;
use App\Controllers\AdminController;
use App\Controllers\HomeController;
use App\Controllers\CitizenController;
use App\Controllers\HeroController;


use App\Repository\UserRepository;
use App\Repository\IncidentRepository;
use App\Repository\VillainRepository;
use App\Repository\HeroProfileRepository;
use App\Repository\InterventionRepository;

final class Container
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function make(string $class, Request $request): object
    {
        $controllerClass = str_contains($class, 'App\\Controllers\\')
            ? $class
            : "App\\Controllers\\" . $class;

        return match ($controllerClass) {

            UserController::class => new UserController(
                $request,
                new UserRepository($this->pdo)
            ),

            CitizenController::class => new CitizenController(
                $request,
                new UserRepository($this->pdo),
                new IncidentRepository($this->pdo)
            ),

            IncidentController::class => new IncidentController(
                $request,
                new IncidentRepository($this->pdo)
            ),

            HeroController::class => new HeroController(
                $request,
                new HeroProfileRepository($this->pdo),
                new UserRepository($this->pdo),
                new IncidentRepository($this->pdo),
                new InterventionRepository($this->pdo) 
            ),

            AdminController::class => new AdminController(
                $request,
                new UserRepository($this->pdo),
                new IncidentRepository($this->pdo),
                new VillainRepository($this->pdo),
                new HeroProfileRepository($this->pdo)
            ),

            default => new $controllerClass($request),
        };
    }
}