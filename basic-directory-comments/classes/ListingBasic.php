<?php
/**
 * Base "listing" class
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
 * ListingBasic is the main class that will be extended throughout the application.
 *
 * @category  PHP
 * @package   Extending_Object-Oriented_PHP
 * @author    Alena Holligan <alena@teamtreehouse.com>
 * @copyright 2017 Treehouse Island, Inc.
 * @license   https://en.wikipedia.org/wiki/MIT_License MIT License
 * @link      https://teamtreehouse.com/library/extending-objectoriented-php
 */
    // properties for the listing: id, title, website, email, twitter
    // default status property to "basic"

    /**
     * ListingBasic constructor
     * @param array $data Initial data to set from user or database
     */
        // if data was passed on instantiation, setValues

    /**
     * Add setValues method to call individual setter methods for object properties.
     * @param array $data Data to set from user or database
     */

    /**
     * Gets the local property $id
     * @return int
     */

    /**
     * Filter and trim parameter to set the local property $id
     * @param int $value Data may be from database or user
     */

    /**
     * Gets the local property $title
     * @return string
     */

    /**
     * Filter and trim parameter to set the local property $title
     * @param string $value to set property
     */

    /**
     * Gets the local property $website
     * @return string
     */

    /**
     * Filter and trim parameter to set the local property $website
     * @param string $value to set property
     */
        // if value is empty, set to null
        // if value does not start with http, add "http://"

    /**
     * Gets the local property $email
     * @return string email address
     */

    /**
     * Filter and trim parameter to set the local property $email
     * @param string $value to set property
     */

    /**
     * Gets the local property $twitter
     * @return string
     */

    /**
     * Filter and trim parameter to set the local property $twitter
     * @param string $value to set property
     */
        // remove the @ sign

    /**
     * Gets the local property $status
     * @return string
     */

    /**
     * Filter and trim parameter to set the local property $status
     * @param string $value to set property
     */
        // if value is empty, set the status to "basic"
        // if the value is not empty, update the status


    /**
     * Add toArray to convert the current object to an associative array of parameters
     * @return array of object parameters
     */