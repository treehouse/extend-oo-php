<?php
/**
 * Update listing page
 */
// include config file

// if there was no id passed, add alert and redirect to the listing page
    // add alert
    // Redirect to the listing page
// now that we know there is an id, if this is a post, update the listing
        // Redirect to the listing page

// since we have a get request with a "id", select the corresponding listing from the database

// assign the selected listing to a $listing object

// set the $title for the page

// include the header file
?>
<form method="post" action="update.php">
    <?php // include the form from the views folder ?>
    <input type="hidden" name="id" id="id" value="<?php echo $listing->getId(); ?>" />
    <input class="btn btn-primary" type="submit" name="submit" value="Update Listing" />
</form>
<?php
//include the footer file