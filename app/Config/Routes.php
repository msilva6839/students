<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rutas para personas
$routes->get('personas', 'Home::personas_index');
$routes->get('personas/(:num)', 'Home::personas_show/$1');
$routes->put('personas/(:num)', 'Home::personas_update/$1');


// Rutas para empleos
$routes->get('empleos', 'Home::empleos_index');
$routes->get('empleos/(:num)', 'Home::empleos_show/$1');
$routes->put('empleos/(:num)', 'Home::empleos_update/$1');



// Ruta para crear un nuevo registro de persona y empleo
$routes->post('crear', 'Home::registro_create');
$routes->delete('eliminar/(:num)', 'Home::registro_delete/$1');



