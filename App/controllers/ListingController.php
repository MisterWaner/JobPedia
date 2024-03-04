<?php

namespace App\Controllers;

use Framework\Database;

class ListingController
{
    protected $db;

    public function __construct()
    {
        $confiq = require basePath('config/db.php');
        $this->db = new Database($confiq);
    }

    /**
     * Show all listings
     *
     * @return void
     */
    public function index()
    {

        $listings = $this->db->query('SELECT * FROM listings')->fetchAll();

        loadView('listings/index', ['listings' => $listings]);
    }

    /**
     * Show the create listing form
     *
     * @return void
     */
    public function create()
    {
        loadView('listings/create');
    }

    /**
     * Show a single listing
     *
     * @return void
     */
    public function show()
    {
        $id = $_GET['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        inspect($listing);

        loadView('listings/show', ['listing' => $listing]);
    }
}
