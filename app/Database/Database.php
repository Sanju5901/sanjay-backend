<?php

namespace App\Database;

use Medoo\Medoo;

class Database {
    private $database;

    public function __construct()
    {
        $this->database = new Medoo([
            'type' => $_ENV['DATABASE_TYPE'],
            'host' => $_ENV['DATABASE_HOST'],
            'database' => $_ENV['DATABASE_NAME'],
            'username' => $_ENV['DATABASE_USER'],
            'password' => $_ENV['DATABASE_PASS'],
        ]);

        $this->database->create('logs', [
            'id' => [
                'INT',
                'NOT NULL',
                'AUTO_INCREMENT'
            ],
            'latitude' => [
                'VARCHAR(255)',
                'NOT NULL'
            ],
            'longitude' => [
                'VARCHAR(255)',
                'NOT NULL'
            ],
            'space' => [
                'BIGINT',
                'NOT NULL'
            ],
            'created_at' => [
                'TIMESTAMP',
                'NULL',
                'DEFAULT current_timestamp()'
            ],
            'PRIMARY KEY (<id>)',
        ]);
    }

    public function getDB()
    {
        return $this->database;
    }
}
