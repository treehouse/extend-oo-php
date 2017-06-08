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
class Collection
{
    // statuses used for listings, form drop down and db selection order
    private $statuses = ['basic', 'inactive'];
    // database connection passed on construction
    private $db;
    // collection array of listing objects
    public $listings = [];

    /**
     * Collection constructor.
     *
     * @param PDO $db Connection to the Database
     */
    function __construct($db)
    {
        // set db property
        $this->db = $db;
    }

    /**
     * Select listings from the database
     *
     * @param array $filter Associtive array of columns and values to filter
     *
     * @return bool If listing inserted true/false
     */
    public function selectListings($filter = null)
    {
        // select all from the "listings" table
        $sql = "SELECT * FROM listings";
        // if there is a filter to use, add a where clause to the sql statement
        if (!empty($filter)) {
            $sql .= " WHERE ";
            // check if filter has a status equal to 'active'
            if (isset($filter['status']) && $filter['status'] === 'active') {
                // append the sql to search for all statuses NOT equal to 'inactive'
                $sql .= " status <> 'inactive'";
                // append ' AND ' to the sql
                $sql .= " AND ";
                // unset the filter status
                unset($filter['status']);
            }
            // loop through any remaining filters
            foreach (array_keys($filter) as $field) {
                // use the field key to create a
                $sql .= " $field = :$field";
                // append ' AND ' to the sql
                $sql .= " AND ";
            }
            //remove the final ' AND';
            $sql = substr($sql, 0, -4);
        }
        // order using the key=>value order from statuses property
        $sql .= ' ORDER BY CASE ';
        foreach ($this->statuses as $key=>$status) {
            $sql .= ' WHEN status=\'' . $status . '\' THEN ' . $key;
        }
        $sql .= ' END ASC';
        // after status, order by case insensitive title
        $sql .= ', LOWER(title)';

        // prepare the sql statement
        $statement = $this->db->prepare($sql);
        // try binding parameters and executing the statement
        try {
            $statement->execute($filter);
        } catch (Exception $e) {
            // if there is an exception, add an alert
            $this->setAlert('danger', 'Database Error: ' . $e->getMessage());
        }
        // loop through the associative array of results to add a new listing
        foreach ($statement->fetchAll(PDO::FETCH_ASSOC) as $data) {
            $this->addListing($data);
        }
        // return the row count for selected listings
        return $statement->rowCount();
    }

    /**
     * Getter for local property $statuses
     *
     * @return array Local property
     */
    public function getStatuses()
    {
        return $this->statuses;
    }

    /**
     * Insert listing
     *
     * @param array $data User Data
     *
     * @return bool If listing inserted true/false
     */
    public function insert($data)
    {
        // filter incoming data
        $data = array_filter($data);

        // add a new listing
        $this->addListing($data);

        /* create a sql statement to insert the data into the listings table
        using the array keys to bind values */
        $sql = "INSERT INTO listings("
            . implode(', ', array_keys($data))
            . ") VALUES(:"
            . implode(', :', array_keys($data))
            . ")";
        // prepare the sql statement
        $statement = $this->db->prepare($sql);

        // bind parameters and execute the sql statement
        $statement->execute($data);

        // if the insert was successful, set and alert and return true
        if ($statement->rowCount() > 0) {
            $this->setAlert(
                'success',
                '<strong>Add listing successful!</strong> ' . $data['title']
            );
            return true;
        }
        // if the insert was NOT successful, set and alert and return false
        else {
            $this->setAlert('danger', 'Unable to update listing');
            return false;
        }
    }


    /**
     * Filter incoming dataUpdate listing
     *
     * @param array $data User Data
     *
     * @return integer Indicates the number of records updated
     */
    public function update($data)
    {
        // filter incoming data
        $data = array_filter($data);

        // add a new listing
        $this->addListing($data);

        /* create a sql statement to update the data in the listings table
        using the array keys to bind values */
        $sql = 'UPDATE listings SET ';
        foreach (array_keys($data) as $key) {
            if ($key != 'id') {
                $sql .= " $key = :$key, ";
            }
        }
        $sql = substr($sql, 0, -2);
        $sql .= ' WHERE id = :id';

        // prepare the sql statement
        $statement = $this->db->prepare($sql);
        // try binding parameters and executing the statement
        try {
            $statement->execute($data);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        // set an alert based on whether the update was successful or not
        if ($statement->rowCount() > 0) {
            $this->setAlert(
                'success',
                '<strong>Update listing successful!</strong> ' . $data['title']
            );
        } else {
            $this->setAlert('danger', 'Unable to update listing');
        }

        //return the count of affected rows
        return $statement->rowCount();
    }

    /**
     * Add listing to collection
     *
     * @param array $data User Data or null
     *
     * @return object Listing object
     */
    public function addListing($data = null)
    {
        // Create a new listing object from received data
        $listing = new ListingBasic($data);
        // Add the new listing object to the collection
        $this->listings[] = $listing;
        // Return the new listing object
        return $listing;
    }

    /**
     * Delete a single listing
     *
     * @param integer $id ID of the single listing to remove
     *
     * @return bool true/false
     */
    public function delete($id)
    {
        // create a update statement to change the status of a listing to "inactive"
        $sql = "UPDATE listings SET status='inactive' WHERE id=?";
        // prepare the sql statement
        $statement = $this->db->prepare($sql);

        // try binding the id and executing the statement
        try {
            $statement->bindValue(1, $id, PDO::PARAM_INT);
            $statement->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        // if the insert was successful, set and alert and return true
        if ($statement->rowCount() > 0) {
            $this->setAlert(
                'danger',
                'Listing Deactivated'
            );
            return true;
        }
        // if the update was NOT successful, set and alert and return false
        else {
            $this->setAlert(
                'danger',
                '<strong>Unable to deactivate listing</strong>'
            );
            return false;
        }
    }

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
    public function setAlert($type, $msg)
    {
        /* use an "alert" element to the global session variable
        set the "type" and "message" of the associative array*/
        $_SESSION['alerts'][] = ['type' => $type, 'message' => $msg];
    }

    /**
     * Get alerts to show user
     *
     * @return array Session alerts or empty
     */
    public function getAlert()
    {
        // if no session alerts, return empty array
        if (!isset($_SESSION['alerts'])) {
            return [];
        }
        // retrieve all session alerts
        $alerts = $_SESSION['alerts'];
        // clear session alerts
        unset($_SESSION['alerts']);
        // return retrieved alerts
        return $alerts;
    }
}
