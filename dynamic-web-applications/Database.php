<?php

class PGSQLDatabase {
    public $connection;
    public function __construct($config)
    {
        $dsn = 'pgsql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, 'michaelkidby', '', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
    public function query($query, $params = [])
    {
        // prepare statement
        $statement = $this->connection->prepare($query);
        // execute statement
        $statement->execute($params);
        // fetch all results
        return $statement;
    }
}
