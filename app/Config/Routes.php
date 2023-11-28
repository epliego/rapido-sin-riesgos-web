<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('download_pdf_form_new_installation', 'Home::download_pdf_form_new_installation');
$routes->post('download_qr', 'Home::download_qr');
