<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- 1. Authentication Routes ---
$routes->get('/', 'AuthController::login');
$routes->get('register', 'AuthController::register');
$routes->post('register/store', 'AuthController::storeRegister');
$routes->post('login/auth', 'AuthController::loginAuth');
$routes->get('logout', 'AuthController::logout');

// --- 2. Dashboard Routes ---
$routes->get('dashboard', 'DashboardController::index');
$routes->get('inventory', 'DashboardController::inventory'); // Placeholder for your items

// --- 3. User Management CRUD Routes ---
// These routes handle the User management logic
$routes->get('users', 'UserController::index');             // View the list of users
$routes->post('users/store', 'UserController::store');      // Save a new user
$routes->post('users/update/(:num)', 'UserController::update/$1'); // Update a user
$routes->get('users/delete/(:num)', 'UserController::delete/$1');  // Delete a user