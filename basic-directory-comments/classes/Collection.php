<?php
/**
 * The main application file
 *
 * PHP version > 5.6
 *
 * @category  PHP
 * @package   Extending_Object-Oriented_PHP
 * @author    Alena Holligan <alena@teamtreehouse.com>
 * @copyright 2017 Treehouse Island, Inc.
 * @license   https://en.wikipedia.org/wiki/MIT_License MIT License
 * @link      https://teamtreehouse.com/library/extending-objectoriented-php
 */

/**
 * Collection class is the main class of the application
 *
 * @category  PHP
 * @package   Extending_Object-Oriented_PHP
 * @author    Alena Holligan <alena@teamtreehouse.com>
 * @copyright 2017 Treehouse Island, Inc.
 * @license   https://en.wikipedia.org/wiki/MIT_License MIT License
 * @link      https://teamtreehouse.com/library/extending-objectoriented-php
 */

    // statuses used for listings, form drop down and db selection order
    // database connection passed on construction
    // collection array of listing objects

    /**
     * Collection constructor.
     *
     * @param PDO $db Connection to the Database
     */

    /**
     * Select listings from the database
     *
     * @param array $filter Associtive array of columns and values to filter
     *
     * @return bool If listing inserted true/false
     */
        // select all from the "listings" table
        // if there is a filter to use, add a where clause to the sql statement
            // check if filter has a status equal to 'active'
                // append the sql to search for all statuses NOT equal to 'inactive'
                // append ' AND ' to the sql
                // unset the filter status
            // loop through any remaining filters
                // use the field key to create a
                // append ' AND ' to the sql
            //remove the final ' AND';
        // order using the key=>value order from statuses property
        // after status, order by case insensitive title

        // prepare the sql statement
        // try binding parameters and executing the statement
            // if there is an exception, add an alert
        // loop through the associative array of results to add a new listing
        // return the row count for selected listings

    /**
     * Getter for local property $statuses
     *
     * @return array Local property
     */

    /**
     * Filter input and insert new listing
     *
     * @param array $data User Data
     *
     * @return bool If listing inserted true/false
     */
        // filter incoming data
        // add a new listing

        /* create a sql statement to insert the data into the listings table
        using the array keys to bind values */
        // prepare the sql statement

        // bind parameters and execute the sql statement

        // if the insert was successful, set and alert and return true
        // if the insert was NOT successful, set and alert and return false


    /**
     * Filter incoming data and update listing
     *
     * @param array $data User Data
     *
     * @return integer Indicates the number of records updated
     */
        // filter incoming data

        // add a new listing

        /* create a sql statement to update the data in the listings table
        using the array keys to bind values */

        // prepare the sql statement
        // try binding parameters and executing the statement

        // set an alert based on whether the update was successful or not

        //return the count of affected rows

    /**
     * Add listing to collection
     *
     * @param array $data User Data or null
     *
     * @return object Listing object
     */
        // Create a new listing object from received data
        // Add the new listing object to the collection
        // Return the new listing object

    /**
     * Delete a single listing
     *
     * @param integer $id ID of the single listing to remove
     *
     * @return bool true/false
     */
        // create a update statement to change the status of a listing to "inactive"
        // prepare the sql statement

        // try binding the id and executing the statement

        // if the insert was successful, set and alert and return true
        // if the update was NOT successful, set and alert and return false

    /**
     * Store alerts to show user
     *
     * Multidimensional array with associative array for each alert
     *
     * @param string $type Options: primary/success/info/warning/danger
     * @param string $msg  Message to display
     *
     * @return null sets super global $_SESSION
     */
        /* use an "alert" element to the global session variable
        set the "type" and "message" of the associative array*/

    /**
     * Get alerts to show user
     *
     * @return array Session alerts or empty
     */
        // if no session alerts, return empty array
        // retrieve all session alerts
        // clear session alerts
        // return retrieved alerts