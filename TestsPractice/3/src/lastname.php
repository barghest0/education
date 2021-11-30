<?php

declare(strict_types=1);

final class Lastname
{
    public $lastname;

    public function __construct(string $lastname)
    {
        $this->lastname = $lastname;
    }

    public static function add($lastname)
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


    public static function getLastName($id)
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


    public static function validData(string $lastname): self
    {
        return new self($lastname);
    }
}
