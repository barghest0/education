<?php

class Student
{
    public function add($lastname)
    {
        $host = 'localhost';
        $db = 'tests';
        $user = 'root';
        $pass = 'root';
        $charset = 'utf8';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $pdo = new PDO($dsn, $user, $pass);
        $sth = $pdo->prepare("INSERT INTO test (lastname) values ('$lastname')");
        $sth->execute();
        return $pdo->lastInsertId();
    }

    public function getLastName($id)
    {
        $host = 'localhost';
        $db = 'tests';
        $user = 'root';
        $pass = 'root';
        $charset = 'utf8';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $pdo = new PDO($dsn, $user, $pass);
        $sth = $pdo->prepare("SELECT * FROM test where id = $id");
        $sth->execute();
        $row = $sth->fetch();
        return $row['lastname'];
    }


    public function updateLastName($lastname, $id)
    {
        $host = 'localhost';
        $db = 'tests';
        $user = 'root';
        $pass = 'root';
        $charset = 'utf8';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $pdo = new PDO($dsn, $user, $pass);
        $sth = $pdo->prepare("UPDATE test SET lastname = '$lastname' where id = $id");
        $sth->execute();
        return $this->getLastName($id);
    }


    public function delete($id)
    {
        $host = 'localhost';
        $db = 'tests';
        $user = 'root';
        $pass = 'root';
        $charset = 'utf8';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $pdo = new PDO($dsn, $user, $pass);
        $sth = $pdo->prepare("DELETE FROM test where id = $id");
        $sth->execute();

    }
}

