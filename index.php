<?php
require __DIR__ . '/vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->get('/uma-api', function (Request $request, Response $response) {
    $data = ['mensagem' => 'Uma API (Interface de Programação de Aplicações) permite que diferentes sistemas se comuniquem entre si por meio de protocolos e padrões.'];
    $response->getBody()->write(json_encode($data));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/codigos', function (Request $request, Response $response) {
    $data = [
        '200' => 'OK - Requisição bem-sucedida.',
        '201' => 'Created - Recurso criado com sucesso.',
        '400' => 'Bad Request - Requisição inválida.',
        '401' => 'Unauthorized - Não autorizado.',
        '404' => 'Not Found - Recurso não encontrado.',
        '500' => 'Internal Server Error - Erro interno do servidor.'
    ];
    $response->getBody()->write(json_encode($data));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/erro', function (Request $request, Response $response) {
    $data = ['erro' => 'Não encontrado'];
    $response->getBody()->write(json_encode($data));
    return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
});

$app->run();
?>