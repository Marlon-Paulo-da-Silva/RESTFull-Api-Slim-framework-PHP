<?php

require __DIR__ . '/../vendor/autoload.php';


use Psr\Http\Message\ResponseInterface  as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;


$app = AppFactory::create();

$app->get('/products/all', function(Request $request, Response $response){
  $sql = "SELECT * FROM produtos";

  try {
    $db = new DB();
    $conn = $db->connect();

    $stmt = $conn->query($sql);
    $produtos = $stmt->fetchAll(PDO::FETCH_OBJ);

    $db = null;
    $response->getBody()->write(json_encode($produtos));

    return $response
          ->withHeader('Content-type', 'application/json')
          ->withStatus(200);
  } catch (PDOException $th) {
    $error = array(
      "message" => $th->getMessage()
    );

    $response->getBody()->write($error);

    return $response
          ->withHeader('Content-Type', 'application/json')
          ->withStatus(500);


    // return $response
    //     ->withHeader('content-type', 'application/json')
    //     ->withStatus(500);

    // return $response->withStatus(500);

  }
});

$app->get('/products/{id}', function(Request $request, Response $response, array $args){
  $id = $args['id'];

  
  $sql = "SELECT * FROM produtos WHERE id_produto = $id";

  // $response->getBody()->write(json_encode($sql));

  // return $response
  //         ->withHeader('Content-type', 'application/json')
  //         ->withStatus(200);

  try {
    $db = new DB();
    $conn = $db->connect();

    $stmt = $conn->query($sql);
    $product = $stmt->fetchAll(PDO::FETCH_OBJ);

    $db = null;
    $response->getBody()->write(json_encode($product));

    return $response
          ->withHeader('Content-type', 'application/json')
          ->withStatus(200);
  } catch (PDOException $th) {
    $error = array(
      "message" => $th->getMessage()
    );

    $response->getBody()->write($error);

    return $response
          ->withHeader('Content-Type', 'application/json')
          ->withStatus(500);

    return $response->withStatus(500);

  }


});
