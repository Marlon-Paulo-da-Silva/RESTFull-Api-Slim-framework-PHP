<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/db.php';

use Psr\Http\Message\ResponseInterface  as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;


$app = AppFactory::create();

$app->get('/', function(Request $request, Response $response, $args){
  $response->getBody()->write('Olá, Marlon');
  return $response;
});

// Rotas dos produtos
require __DIR__ . '/../routes/products.php';
// $app->get('/', function(){

// });


// $app->get('/pagina/{name}', function(Request $request, Response $response, $args){
//   $response->getBody()->write('Olá, Marlon, você está na página: ' . $args['name']);
//   return $response;
// });

// $app->get('/fruits', function(Request $request, Response $response, $args){
//   $fruits = [
//     '1' => 'Banana',
//     '2' => 'Laranja',
//     '3' => 'Abacaxi'
//   ];

//   $response->getBody()->write(json_encode($fruits));
//   return $response->withHeader('Content-type', 'application/json');
// });

// $app->get('/fruits/{id}', function(Request $request, Response $response, $args){
//   $fruits = [
//     '1' => 'Banana',
//     '2' => 'Laranja',
//     '3' => 'Abacaxi'
//   ];

//   $fruit[$args['id']] = $fruits[$args['id']];

//   $response->getBody()->write(json_encode($fruit));
//   return $response->withHeader('Content-type', 'application/json');
// });

$app->run();
