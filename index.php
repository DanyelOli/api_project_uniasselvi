<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

date_default_timezone_set("America/Sao_Paulo");

# Autoload

include_once "classes/autoload.class.php";
new Autoload();

# Rotas

$route = new Routes();

$route->add('POST', '/classes/requests', 'CreateRequest::create', true);
$route->add('GET', '/classes/listall', 'Requests::listAll', true);
$route->add('GET', '/classes/listonly/[ordernumber]', 'Requests::listOnly', true);

$route->go($_GET['path']);

// // Classes
// include_once "classes/db.class.php";

// // API's
// include_once "api/clientes/clientes.php";