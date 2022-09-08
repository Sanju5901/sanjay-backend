<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RedirectController
{
    public function googleMaps(Request $request, Response $response, array $args): Response
    {
        $googleMaps = "https://www.google.com/maps/@" . $args['latitude'] . "," . $args['longitude'];

        return $response->withHeader('Location', $googleMaps)
            ->withStatus(301);
    }
}
