<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rutas para personas
$routes->get('personas', 'Home::personas_index');
$routes->get('personas/(:num)', 'Home::personas_show/$1');
$routes->post('personas', 'Home::personas_create');
$routes->put('personas/(:num)', 'Home::personas_update/$1');
$routes->delete('personas/(:num)', 'Home::personas_delete/$1');

// Rutas para empleos
$routes->get('empleos', 'Home::empleos_index');
$routes->get('empleos/(:num)', 'Home::empleos_show/$1');
$routes->post('empleos', 'Home::empleos_create');
$routes->put('empleos/(:num)', 'Home::empleos_update/$1');
$routes->delete('empleos/(:num)', 'Home::empleos_delete/$1');


// Ruta para crear un nuevo registro de persona y empleo
$routes->post('nuevoregistro', 'Home::registro_create');

