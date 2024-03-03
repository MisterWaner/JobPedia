<?php

$confiq = require basePath('config/db.php');
$db = new Database($confiq);

$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

loadView('home', ['listings' => $listings]); 