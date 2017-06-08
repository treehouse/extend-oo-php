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
class ListingBasic
{
    // properties for the listing: id, title, website, email, twitter
    private $id, $title, $website, $email, $twitter;
    // default status property to "basic"
    protected $status = 'basic';
    public static $static = 'parent static';

    /**
     * ListingBasic constructor
     * @param array $data Initial data to set from user or database
     */
    public function __construct($data = [])
    {
        // if data was passed on instantiation, setValues
        if (!empty($data)) {
            $this->setValues($data);
        }
    }

    /**
     * Add setValues method to call individual setter methods for object properties.
     * @param array $data Data to set from user or database
     */
    public function setValues($data = []) {
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
        if (isset($data['title'])) {
            $this->setTitle($data['title']);
        }
        if (isset($data['website'])) {
            $this->setWebsite($data['website']);
        }
        if (isset($data['email'])) {
            $this->setEmail($data['email']);
        }
        if (isset($data['twitter'])) {
            $this->setTwitter($data['twitter']);
        }
        if (isset($data['status'])) {
            $this->setStatus($data['status']);
        }
    }

    /**
     * Gets the local property $id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Filter and trim parameter to set the local property $id
     * @param int $value Data may be from database or user
     */
    public function setId($value)
    {
        $this->id = trim(filter_var($value, FILTER_SANITIZE_NUMBER_INT));
    }

    /**
     * Gets the local property $title
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Filter and trim parameter to set the local property $title
     * @param string $value to set property
     */
    public function setTitle($value)
    {
        $this->title = trim(filter_var($value, FILTER_SANITIZE_STRING));
    }

    /**
     * Gets the local property $website
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Filter and trim parameter to set the local property $website
     * @param string $value to set property
     */
    public function setWebsite($value)
    {
        $value = trim(filter_var($value, FILTER_SANITIZE_STRING));
        // if value is empty, set to null
        if (empty($value)) {
            $this->website = null;
            return;
        }
        // if value does not start with http, add "http://"
        if (substr($value, 0, 4) != 'http') {
            $value = 'http://' . $value;
        }
        $this->website = $value;
    }

    /**
     * Gets the local property $email
     * @return string email address
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Filter and trim parameter to set the local property $email
     * @param string $value to set property
     */
    public function setEmail($value)
    {
        $this->email = trim(filter_var($value, FILTER_SANITIZE_STRING));
    }

    /**
     * Gets the local property $twitter
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Filter and trim parameter to set the local property $twitter
     * @param string $value to set property
     */
    public function setTwitter($value)
    {
        // remove the @ sign
        $this->twitter = str_replace('@', '', trim(filter_var($value, FILTER_SANITIZE_STRING)));
    }

    /**
     * Gets the local property $status
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Filter and trim parameter to set the local property $status
     * @param string $value to set property
     */
    public function setStatus($value)
    {
        $value = trim(filter_var($value, FILTER_SANITIZE_STRING));
        // if value is empty, set the status to "basic"
        if (empty($value)) {
            $this->status = 'basic';
            return;
        }
        // if the value is not empty, update the status
        $this->status = $value;
    }

    /**
     * Add toArray to convert the current object to an associative array of parameters
     * @return array of object parameters
     */
    public function toArray()
    {
        return get_object_vars($this);
    }
}