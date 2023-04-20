<?php

namespace ControlPanel\Repository;

use ControlPanel\Interfaces\IRepository;

/**
 * Class Repository
 * @package ControlPanel\Repository
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
