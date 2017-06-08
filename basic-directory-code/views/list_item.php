<?php
/**
 * This file creates an individual listing
 *
 * Uses individual $listing object
 * Replace %TITLE% and %ID% with listing variables
 */
?>
<div class="listing panel panel-default">
    <div class="panel-heading">
        <div class="input-group">
            <h3 class="panel-title">%TITLE%</h3>

            <div class="input-group-btn">
                <form method="post" action="delete.php">
                <input type="hidden" name="id" value="' . $listing->getId() . '" />
                <a class="btn glyphicon glyphicon-edit" title="Click here to update record in the database." href="update.php?id=%ID%"></a>
                <button class="btn glyphicon glyphicon-remove" type="submit" name="action" id="action" title="Click here to delete record in the database." value="DELETE" onclick="return confirm('Are you sure you want to DEACTIVATE this listing? ')"></button>
                </form>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <p><?php
        // if there is a website for the listing, show the website link
        if (!empty($listing->getWebsite())) {
            echo ' <a href="' . $listing->getWebsite() . '" target="_blank">' . $listing->getWebsite() . '</a>';
            // show a spacer
            echo ' |  ' . PHP_EOL;
        }
        // if there is an email for the listing, show the email link
        if (!empty($listing->getEmail())) {
            echo ' <a href="mailto:' . $listing->getEmail() . '" target="_blank">' . $listing->getEmail() . '</a>';
            // show a spacer
            echo ' | ' . PHP_EOL;
        }
        // if there is a twitter handle for the listing, show the twitter link
        if (!empty($listing->getTwitter())) {
            echo ' <a href="https://twitter.com/' . $listing->getTwitter() . '" target="_blank">@' . $listing->getTwitter() . '</a>';
            // show a spacer
            echo ' |  ' . PHP_EOL;
        }
        ?></p>
    </div>
</div>