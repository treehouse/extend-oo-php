<?php
/**
 * Website home page
 */
// include config file
include 'inc/config.php';

// add a default $filter array. This is an associative array of field => values to filter the data
$filter = ['status'=>'active'];
// if a status has been passed in the URI, set the filter status to the passed value.
// Be sure you sanitize incoming data.
if (isset($_GET['status'])) {
    $filter['status'] = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_STRING);
}

// use the $filter to selectListings from the main application $directory
$directory->selectListings($filter);

// set the $title variable for the page header
$title = "PHP Conferences";

// include the header file
require 'inc/header.php';

// loop through the listings to create a $listing variable
foreach ($directory->listings as $listing) {
    // include the file from the views folder for creating individual listing
    include 'views/list_item.php';
}

// include the footer file
require 'inc/footer.php';