<?php

$email = 'testme@gmail.com';
$pw = password_hash('Passwort1234', PASSWORD_DEFAULT);

// Erstellen der Datenbank
$db = new PDO('sqlite:database.sqlite');

$db->query('CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT, 
    email VARCHAR,
    pw VARCHAR)');

$db->exec("INSERT INTO users ( 
    email, 
    pw) VALUES (
    '$email',
    '$pw')");

$users = [];

$stmt = $db->query('SELECT * from users');

while (false !== ($row = $stmt->fetch(PDO::FETCH_ASSOC))) {
    $users[] = $row;
};

var_dump($users);
