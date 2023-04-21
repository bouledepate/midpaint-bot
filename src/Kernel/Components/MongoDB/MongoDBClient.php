<?php

declare(strict_types=1);

namespace Kernel\Components\MongoDB;

use MongoDB\Client;
use MongoDB\Database;

final class MongoDBClient
{
    protected ?Client $client = null;
    protected ?Database $database = null;

    public function __construct()
    {
        $this->establishConnection();
        $this->selectDefaultDatabase();;
    }

    protected function establishConnection(): void
    {
        $this->client = new Client("mongodb://{$_ENV['DB_HOST']}:{$_ENV['DB_PORT']}", [
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'authSource' => 'midpaint_db',
            'authMechanism' => 'SCRAM-SHA-1',
        ]);
    }

    protected function selectDefaultDatabase(): void
    {
        $this->database = $this->client->selectDatabase($_ENV['DB_NAME']);
    }

    /**
     * @return Database
     */
    public function getDatabase(): Database
    {
        return $this->database;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}