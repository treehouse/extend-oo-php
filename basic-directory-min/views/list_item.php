<?php
echo '<div class="listing panel panel-default">' . PHP_EOL;
    echo '<div class="panel-heading">';
        echo '<div class="input-group">' . PHP_EOL;
            echo '<h3 class="panel-title">' . $listing->getTitle() . '</h3>' . PHP_EOL;

            echo '<div class="input-group-btn">' . PHP_EOL;
                echo '<form method="post" action="delete.php">' . PHP_EOL;
                echo '<input type="hidden" name="id" value="' . $listing->getId() . '" />' . PHP_EOL;
                echo '<a class="btn glyphicon glyphicon-edit" title="Click here to update record in the database." '
                    . 'href="update.php?id=' . $listing->getId() . '"></a>' . PHP_EOL;
                echo '<button class="btn glyphicon glyphicon-remove" type="submit" name="action" id="action" '
                    . 'title="Click here to delete record in the database." value="DELETE" '
                    . 'onclick="return confirm(\'Are you sure you want to DEACTIVATE this listing? \')"></button>' . PHP_EOL;
                echo '</form>' . PHP_EOL;
            echo '</div>' . PHP_EOL;
        echo '</div>' . PHP_EOL;

    echo '</div>';
    echo '<div class="panel-body">';
    echo '<p>' . PHP_EOL;
if (!empty($listing->getWebsite())) {
    echo ' <a href="' . $listing->getWebsite() . '" target="_blank">' . $listing->getWebsite() . '</a> | ' . PHP_EOL;
}
if (!empty($listing->getEmail())) {
    echo ' <a href="mailto:' . $listing->getEmail() . '" target="_blank">' . $listing->getEmail() . '</a> | ' . PHP_EOL;
}
if (!empty($listing->getTwitter())) {
    echo ' <a href="https://twitter.com/' . $listing->getTwitter() . '" target="_blank">@' . $listing->getTwitter() . '</a> | ' . PHP_EOL;
}
    echo '</p>' . PHP_EOL;
    echo '</div>' . PHP_EOL;/**/
echo '</div>' . PHP_EOL;