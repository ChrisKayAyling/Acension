<?php

use Ascension\Core;
use Ascension\HTTP;
use ControlPanel\Controller;
use PHPUnit\Framework\TestCase;

class ControlPanelTest extends TestCase
{
    /**
     * @var HTTP - HTTP connector
     */
    public $HTTP;


    public $DataStorage;

    /**
     * @return void
     */
    public function setUp(): void {
        $this->HTTP = new HTTP($_SERVER, $_REQUEST, file_get_contents('php://input'), $_FILES);

        $_SERVER['HTTP_USER_AGENT'] = "Unit Test";

       // $Repository = new ControlPanel\Repository\Repository(Core::Resources['DataStorage'], Core::Resources['Settings']);
    }
    
}
