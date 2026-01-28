<?php

use App\Controllers\{UserController, IncidentController, HomeController, AdminController, CitizenController, HeroController};
use App\Core\Router;

return function (Router $router) {
    $router->get('/', [HomeController::class, 'index']);

    $router->get('/register', [UserController::class, 'register']);
    $router->post('/register', [UserController::class, 'handleRegister']);

    $router->get('/login', [UserController::class, 'login']);
    $router->post('/login', [UserController::class, 'handleLogin']);

    $router->get('/logout', [UserController::class, 'logout']);

    $router->get('/forgot-password', [UserController::class, 'forgotPassword']);
    $router->post('/forgot-password', [UserController::class, 'handleForgotPassword']);
    $router->get('/reset-password', [UserController::class, 'resetPassword']);
    $router->post('/reset-password', [UserController::class, 'handleResetPassword']);

    $router->get('/citizen/dashboard', [CitizenController::class, 'index']);

    $router->get('/profile', [UserController::class, 'profile']);
    $router->get('/profile/edit', [UserController::class, 'editProfile']);
    $router->post('/profile/edit', [UserController::class, 'handleEditProfile']);

    $router->get('/heroes', [UserController::class, 'heroes']);
    $router->post('/user/heroes', [UserController::class, 'heroes']);

    $router->get('/incident', [IncidentController::class, 'index']);
    $router->get('/incident/show', [IncidentController::class, 'show']);
    $router->get('/incident/create', [IncidentController::class, 'create']);
    $router->post('/incident/store', [IncidentController::class, 'store']);
    $router->get('/incident/edit', [IncidentController::class, 'edit']);
    $router->post('/incident/update', [IncidentController::class, 'update']);
    $router->post('/incident/delete', [IncidentController::class, 'delete']);

    $router->get('/hero/create', [HeroController::class, 'create']);
    $router->post('/hero/store', [HeroController::class, 'store']);
    $router->get('/hero/liste', [HeroController::class, 'list']);

    $router->get('/hero/dashboard', [HeroController::class, 'dashboard']);
    $router->post('/hero/take', [HeroController::class, 'takeIncident']);
    $router->post('/hero/resolve', [HeroController::class, 'resolveIncident']); 

    $router->get('/admin', [AdminController::class, 'index']);
    $router->get('/admin/incidents', [AdminController::class, 'listIncidents']);
    $router->post('/admin/incident/validate', [AdminController::class, 'validateIncident']);
    $router->post('/admin/hero/validate', [AdminController::class, 'validateHero']);
};