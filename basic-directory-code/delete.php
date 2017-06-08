<?php
/**
 * delete listing page
 */
// include config file
include 'inc/config.php';

// if a form was posted with the id, delete the corresponding listing
if (isset($_POST['id'])) {
    $directory->delete($_POST['id']);
}
// if a form was NOT posted with the id, add an alert
else {
    $directory->setAlert(
        'danger',
        'Unknown Listing'
    );
}
// Redirect to the listing page
header('location: /index.php');
exit;