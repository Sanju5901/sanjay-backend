<?php

namespace App\Service;

use Twilio\Rest\Client;

class TwilioService
{
    private $client;

    public function __construct()
    {
        $this->client = new Client(
            $_ENV['TWILIO_SID'],
            $_ENV['TWILIO_TOKEN']
        );
    }

    public function sendTrashAlert(string $contact, string $latitude, string $longitude)
    {
        $link = $_ENV['APP_HOST'] . '/location?la=' . $latitude . '&lo=' .$longitude;

        return $this->client->messages->create($contact, [
            'from' => '+14454475070',
            'body' => 'A Trash bin is nearly full. Please collect it by following this link: ' . $link
        ]);
    }
}
