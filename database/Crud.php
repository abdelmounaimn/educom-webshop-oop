<?php


class Crud
{
    private $pdoConn;
    public function __construct()
    {
    }

    public function connection()
    {
        $username = 'webshopuser';
        $password = 'ZnYuNE6kEG7QHGa';
        $pdoConn = new PDO('mysql:host=127.0.0.1;dbname=abdel_webshop', $username, $password);
        $pdoConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdoConn;
    }

    public function readMoreRow($sql, $params, $class)
    {
        $pdoConn = $this->connection();
        try {

            $pdoStatement = $pdoConn->prepare($sql);
            foreach ($params as $col => $value) {
                $pdoStatement->bindValue($col, $value);
            }
            $pdoStatement->setFetchMode(PDO::FETCH_CLASS, $class);
            $pdoStatement->execute();
            $result = $pdoStatement->fetchAll();
            return $result;
        } finally {
            $pdoConn = null;
        }
    }
    public function readOneRow($sql, $params, $class)
    {
        $pdoConn = $this->connection();
        try {
            $pdoStatement = $pdoConn->prepare($sql);
            foreach ($params as $col => $value) {
                $pdoStatement->bindValue($col, $value);
            }
            $pdoStatement->setFetchMode(PDO::FETCH_CLASS, $class);
            $pdoStatement->execute();
            $result = $pdoStatement->fetchAll();
            return $result;
        } finally {
            $pdoConn = null;
        }
    }

    public function createOne($sql, $params)
    {
        $pdoConn = $this->connection();
        try {
            $pdoStatement = $pdoConn->prepare($sql);
            foreach ($params as $col => $value) {
                $pdoStatement->bindValue($col, $value);
            }
            $pdoStatement->execute();
            return  $pdoConn->lastInsertId();
        } finally {
            $pdoConn = null;
        }
    }
    public function updateRow($sql, $params)
    {
        $pdoConn = $this->connection();
        try {
            $pdoStatement = $pdoConn->prepare($sql);
            foreach ($params as $col => $value) {
                $pdoStatement->bindValue($col, $value);
            }
            $pdoStatement->execute();
            return  $pdoStatement->rowCount();
        } finally {
            $this->pdoConn = null;
        }
    }
    public function delete($sql, $params)
    {
        $pdoConn = $this->connection();
        try {
            $pdoStatement = $pdoConn->prepare($sql);
            foreach ($params as $col => $value) {
                $pdoStatement->bindValue($col, $value);
            }
            $pdoStatement->execute();
            return  $pdoStatement->rowCount();
        } finally {
            $pdoConn = null;
        }
    }
}
