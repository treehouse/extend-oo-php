<?php
/**
 * Update listing page
 */
// include config file
include 'inc/config.php';

// if there was no id passed, add alert and redirect to the listing page
if (!isset($_REQUEST['id'])) {
    // add alert
    $directory->setAlert(
        'danger',
        'Unknown Listing'
    );
    // Redirect to the listing page
    header('location: /index.php');
    exit;
}
// now that we know there is an id, if this is a post, update the listing
if ($_POST) {
    if ($directory->update($_POST) > 0) {
        // Redirect to the listing page
        header('location: /index.php');
        exit;
    }
}
// since we have a get request with a "id", select the corresponding listing from the database
$directory->selectListings(['id' => $_REQUEST['id']]);

// assign the selected listing to a $listing object
$listing = $directory->listings[0];

// set the $title for the page
$title = 'Update Listing';

// include the header file
require 'inc/header.php';
?>
<form method="post" action="update.php">
    <?php // include the form from the views folder 
    include 'views/list_item.php'; ?>
    <input type="hidden" name="id" id="id" value="<?php echo $listing->getId(); ?>" />
    <input class="btn btn-primary" type="submit" name="submit" value="Update Listing" />
</form>
<?php
//include the footer file
require 'inc/footer.php';