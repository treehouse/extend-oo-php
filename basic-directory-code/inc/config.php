<?php
// start a session
session_start();

// include the classes
require __DIR__ . '/../classes/Collection.php';
require __DIR__ . '/../classes/ListingBasic.php';

// connect to the database
try {
    // create PDO connection
    $db = new PDO("sqlite:".__DIR__."/database.db");
    // set error mode
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    //show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//instantiate the main application $directory object from the Collection class
$directory = new Collection($db);