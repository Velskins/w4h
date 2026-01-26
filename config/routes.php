<?php

use App\Controllers\{UserController, IncidentController, HomeController, AdminController, CitizenController};
use App\Core\Router;

return function (Router $router) {
    $router->get('/', [HomeController::class, 'index']);

    $router->get('/register', [UserController::class, 'register']);
    $router->post('/register', [UserController::class, 'handleRegister']);

    $router->get('/login', [UserController::class, 'login']);
    $router->post('/login', [UserController::class, 'handleLogin']);

    $router->get('/logout', [UserController::class, 'logout']);

    $router->get('/citizen/dashboard', [CitizenController::class, 'index']);

    $router->get('/profile', [UserController::class, 'profile']);
    $router->get('/profile/edit', [UserController::class, 'editProfile']);
    $router->post('/profile/edit', [UserController::class, 'handleEditProfile']);


    $router->get('/incident', [IncidentController::class, 'index']);
    $router->get('/incident/show', [IncidentController::class, 'show']);
    $router->get('/incident/create', [IncidentController::class, 'create']);
    $router->post('/incident/store', [IncidentController::class, 'store']);
    $router->get('/incident/edit', [IncidentController::class, 'edit']);
    $router->post('/incident/update', [IncidentController::class, 'update']);
    $router->post('/incident/delete', [IncidentController::class, 'delete']);

    $router->get('/admin', [AdminController::class, 'index']);
    $router->get('/admin/incidents', [AdminController::class, 'listIncidents']);

    $router->get('/heroes', [UserController::class, 'heroes']);
    $router->get('/profile/show', [UserController::class, 'showProfile']);






    /* EXEMPLE
    $router->get('/products', [ProductController::class, 'index']);
    $router->get('/products/show', [ProductController::class, 'show']);
    $router->get('/products/create', [ProductController::class, 'create']);
    $router->post('/products/store', [ProductController::class, 'store']);
    $router->get('/products/edit', [ProductController::class, 'edit']);
    $router->post('/products/update', [ProductController::class, 'update']);
    $router->post('/products/delete', [ProductController::class, 'delete']);
    $router->get('/products/category', [ProductController::class, 'findByCategory']);

    $router->get('/categories', [CategoryController::class, 'index']);
    $router->get('/categories/create', [CategoryController::class, 'create']);
    $router->post('/categories/store', [CategoryController::class, 'store']);
    $router->get('/categories/edit', [CategoryController::class, 'edit']);
    $router->post('/categories/update', [CategoryController::class, 'update']);
    $router->post('/categories/delete', [CategoryController::class, 'delete']);
    */
};
