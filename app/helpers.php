<?php

if(!function_exists('response_json')) {
    function response_json(\Slim\Psr7\Response $response, array $data): \Slim\Psr7\Response
    {
        $response->getBody()->write(json_encode($data));

        return $response->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}

if(!function_exists('contacts')) {
    function contacts(): array
    {
        return [
            '+919080508847',
            '+918778304893',
        ];
    }
}
