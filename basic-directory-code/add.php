<?php
/**
 * add listing page
 */
// include config file
include 'inc/config.php';

// if this page is the result of a form post, try update the listing
if ($_POST) {
    if ($directory->insert($_POST) > 0) {
        header('location: /index.php');
        exit;
    }
    // if the listing was not added to the database, set a $listing object equal to the current listing
    $listing = $directory->listings[0];
}
// if this page is NOT the result of a form post, instantiate a new $listing object
else {
    $listing = new ListingBasic();
}

// add $title for the page
$title = 'Add Conference';
//include header
require 'inc/header.php';
?>
<form method="post" action="add.php">
    <?php // include the form from the views folder 
    include 'views/list_item.php';
    ?>
    <input class="btn btn-primary" type="submit" name="submit" value="Add Listing" />
</form>
<?php
//include footer
require 'inc/footer.php';