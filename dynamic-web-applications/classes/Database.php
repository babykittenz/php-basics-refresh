<?php

class PGSQLDatabase {
    public $connection;
    protected $statement;
    public function __construct($config)
    {
        $dsn = 'pgsql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, 'michaelkidby', '', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
    public function query($query, $params = [])
    {
        // prepare statement
        $this->statement = $this->connection->prepare($query);
        // execute statement
        $this->statement->execute($params);
        // fetch all results
        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();
        if (!$result) {
            abort(RESPONSE::NOT_FOUND);
        }
        return $result;
    }

    public function findAll()
    {
        return $this->statement->fetchAll();
    }
}
