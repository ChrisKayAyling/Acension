<?php

namespace DataStorageObjects;

/**
 * SQLite3 Connector
 */
class SQLiteConnector
{

    protected $handle;

    /**
     * __construct
     */
    public function __construct() {
        $this->connect();
    }

    /**
     * connect
     * @return bool
     */
    public function connect() {
        try {
            $this->handle = new \SQLite3(ROOT . DS . "etc" . DS . "db.db");
            return true;
        } catch (\Exception $e) {
            throw new \Exception("SQLite Connector: Could not open database. Check path");
        }
    }


    /**
     * query
     * @param $query
     * @return false
     */
    public function query($query) {
        $result = $this->handle->query($query);

        if ($result !== FALSE) {
            return $result->fetchArray(SQLITE3_ASSOC);
        }

        return FALSE;
    }
}