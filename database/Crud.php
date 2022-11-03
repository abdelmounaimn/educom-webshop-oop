<?php


class Crud
{
    private $pdoConn;
    public function __construct()
    {
        $username = 'webshopuser';
        $password = 'ZnYuNE6kEG7QHGa';
        $this->pdoConn = new PDO('mysql:host=127.0.0.1;dbname=abdel_webshop', $username, $password);
        $this->pdoConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function readMoreRow($sql, $params, $class)
    {
        try {
            $pdoStatement = $this->pdoConn->prepare($sql);
            foreach ($params as $col => $value) {
                $pdoStatement->bindValue($col, $value);
            }
            $pdoStatement->setFetchMode(PDO::FETCH_CLASS, $class);
            $pdoStatement->execute();
            $result = $pdoStatement->fetchAll();
            return $result;
        } finally {
            $this->pdoConn = null;
        }
    }
    public function readOneRow($sql, $params, $class)
    {
        try {
            $pdoStatement = $this->pdoConn->prepare($sql);
            foreach ($params as $col => $value) {
                $pdoStatement->bindValue($col, $value);
            }
            $pdoStatement->setFetchMode(PDO::FETCH_CLASS, $class);
            $pdoStatement->execute();
            $result = $pdoStatement->fetchAll();
            return $result;
        } finally {
            $this->pdoConn = null;
        }
    }

    public function createOne($sql, $params)
    {
        try {
            $pdoStatement = $this->pdoConn->prepare($sql);
            foreach ($params as $col => $value) {
                $pdoStatement->bindValue($col, $value);
            }
            $pdoStatement->execute();
            return  $this->pdoConn->lastInsertId();
        } finally {
            $this->pdoConn = null;
        }
    }
    public function updateRow($sql, $params)
    {
        try {
            $pdoStatement = $this->pdoConn->prepare($sql);
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
        try {
            $pdoStatement = $this->pdoConn->prepare($sql);
            foreach ($params as $col => $value) {
                $pdoStatement->bindValue($col, $value);
            }
            $pdoStatement->execute();
            return  $pdoStatement->rowCount();
        } finally {
            $this->pdoConn = null;
        }
    }
}
