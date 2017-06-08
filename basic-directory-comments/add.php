<?php
/**
 * add listing page
 */
// include config file

// if this page is the result of a form post, try update the listing
    // if the listing was not added to the database, set a $listing object equal to the current listing
// if this page is NOT the result of a form post, instantiate a new $listing object

// add $title for the page
//include header
?>
<form method="post" action="add.php">
    <?php // include the form from the views folder ?>
    <input class="btn btn-primary" type="submit" name="submit" value="Add Listing" />
</form>
<?php
//include footer
