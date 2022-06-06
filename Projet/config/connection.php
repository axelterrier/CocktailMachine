<?php

class Connection extends PDO {

    private $stmt;

    public function __construct(string $dsn, string $user, string $pass) {

        parent::__construct($dsn,$user,$pass);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    /** * @param string $query
     * @param array $parameters *
     * @return bool Returns `true` on success, `false` otherwise
     */

    public function executeQuery(string $query, array $parameters = []) : bool{
        $this->stmt = parent::prepare($query);
        foreach ($parameters as $name => $value) {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }

        return $this->stmt->execute();
    }

    public function getResults() : array {
        return $this->stmt->fetchall();

    }
}