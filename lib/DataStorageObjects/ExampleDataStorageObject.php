<?php

namespace DataStorageObjects;

/**
 * Example data storage object that could be used to obtain data from an external service.
 */
class ExampleDataStorageObject
{

    /**
     * Example construct
     */
    public function __construct($Settings) {
        $this->connect();
    }

    /**
     * Example connect to service
     * @return bool
     */
    public function connect() {
        return true;
    }


    /**
     * Example data return
     * @return string[]
     */
    public function getData() {
        return array(
            1 => "Example Data"
        );
    }

}