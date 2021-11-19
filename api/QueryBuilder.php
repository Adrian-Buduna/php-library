<?php

class QueryBuilder
{
    // Macke conection PDO
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    //Select Table
    public function selectAll($table)
    {

        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
}
