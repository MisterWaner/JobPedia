<?php

namespace App\Controllers;

use Framework\Database;

class HomeController
{

    protected $db;

    public function __construct()
    {
        $confiq = require basePath('config/db.php');
        $this->db = new Database($confiq);
    }

    public function index()
    {

        $listings = $this->db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

        loadView('home', ['listings' => $listings]);
    }
}
