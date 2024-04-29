<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->post('/Login','Login::Validar_Usuario');
$routes->post('/Bienvenido','Home::index');
