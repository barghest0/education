<?php

$pdo = new PDO('mysql:dbname=blog;host=localhost', 'root', 'root', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"]);
