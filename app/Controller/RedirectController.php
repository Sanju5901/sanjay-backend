<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RedirectController
{
    public function googleMaps(Request $request, Response $response): Response
    {
        $args = $request->getQueryParams();
        $googleMaps = "https://www.google.com/maps/@" . $args['la'] . "," . $args['lo'];

        return $response->withHeader('Location', $googleMaps)
            ->withStatus(301);
    }
}
