<?php

$confiq = require basePath('config/db.php');
$db = new Database($confiq);

$id = $_GET['id'] ?? '';

$params = [
    'id' => $id
];

$listing = $db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

loadView('listings/show', ['listing' => $listing]);

