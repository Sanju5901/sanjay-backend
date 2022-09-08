<?php

namespace App\Controller;

use App\Service\TwilioService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Database\Database;

class LogsController
{
    public function store(Request $request, Response $response)
    {
        $db = new Database();
        $twilio = new TwilioService();

        $body = json_decode($request->getBody()->getContents());
        $db->getDB()->insert('logs', [
            'latitude' => $body->latitude,
            'longitude' => $body->longitude,
            'space' => $body->space
        ]);

        if (((int) $body->space) <= 10) {
            foreach (contacts() as $contact) {
                $twilio->sendTrashAlert($contact, $body->latitude, $body->longitude);
            }
        }

        return response_json($response, [
            'type' => 'success',
            'message' => 'Saved data successfully',
            'data' => null
        ]);
    }

    public function list(Request $request, Response $response)
    {
        $db = new Database();

        $logs = $db->getDB()->select('logs', '*');

        return response_json($response, [
            'type' => 'success',
            'message' => null,
            'data' => $logs
        ]);
    }
}
