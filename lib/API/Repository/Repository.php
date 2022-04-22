<?php

namespace API\Repository;

use API\Interfaces\IRepository;

/**
 * Class Repository
 * @package API\Repository
 */
class Repository implements IRepository
{

    /**
     * @var $dataStorage - Datastorage connector
     */
    protected $dataStorage;

    /**
     * @var object
     */
    protected $settings;

    /**
     * @var
     */
    public $http_status_code;


    /**
     * @param $dataStorage
     * @param $settings
     */
    public function __construct(
        $dataStorage,
        $settings
    ) {
        $this->dataStorage = $dataStorage;
        $this->settings = $settings;
    }
}
