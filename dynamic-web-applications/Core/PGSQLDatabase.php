<?php

namespace Core;

use PDO;

class PGSQLDatabase
{
    public mixed $connection;
    protected mixed $statement;

    public function __construct($config)
    {
        $dsn = 'pgsql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, 'michaelkidby', '', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function query(string $query, array $params = []): self
    {
        // prepare statement
        $this->statement = $this->connection->prepare($query);
        // execute statement
        $this->statement->execute($params);
        // fetch all results
        return $this;
    }

    public function find(): mixed
    {
        return $this->statement->fetch();
    }

    public function findOrFail(): mixed
    {
        $result = $this->find();
        if (!$result) {
            abort(Response::NOT_FOUND);
        }
        return $result;
    }

    public function get(): array
    {
        return $this->statement->fetchAll();
    }

    public function getOrFail(): array
    {
        $result = $this->get();
        if (!$result) {
            abort(Response::NOT_FOUND);
        }
        return $result;
    }

    public function insert(mixed $data): false|string
    {
        $this->statement->execute($data);
        return $this->connection->lastInsertId();
    }

    public function insertOrFail(mixed $data): false|string
    {
        $success = $this->insert($data);
        if (!$success) {
            abort(Response::NOT_FOUND);
        }
        return $success;

    }
}
