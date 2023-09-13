<?php

use Ascension\Core;
use Ascension\HTTP;
use ControlPanel\Controller;
use DataStorageObjects\SQLiteConnector;
use PHPUnit\Framework\TestCase;

class ControlPanelControllerTest extends TestCase
{
    /**
     * @var HTTP - HTTP connector
     */
    public $HTTP;


    public $DataStorage;

    protected $request;


    /**
     * @return void
     */
    public function setUp(): void {

    }

    /**
     * testLoginSubmit
     * @return void
     */
    public function testLoginSubmit() {
        Core::$Resources['DataStorage']['core'] = $this->getMockBuilder(SQLiteConnector::class)
            ->disableOriginalConstructor()
            ->getMock();

        Core::$Resources['DataStorage']['core']->method('query')->willReturnOnConsecutiveCalls(
           1
        );

        $Repository = new ControlPanel\Repository\Repository(Core::$Resources['DataStorage'], Core::$Resources['Settings']);

        $Controller = new ControlPanel\Controller\Controller(
            new HTTP(array(), array(), array(
                'Username' => "Test",
                'Password' => "Test"
            ), array()),
            Core::$Resources['Settings'],
            $Repository
        );

        $result = $Controller->loginSubmit();

        $this->assertEquals(1, $_SESSION['User']);

        $this->assertTrue($result);
    }
    
}
