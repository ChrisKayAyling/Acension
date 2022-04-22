<?php

use Ascension\HTTP;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    /**
     * @var HTTP - HTTP connector
     */
    public $HTTP;

    /**
     * @return void
     */
    public function setUp(): void {
        $this->HTTP = new HTTP($_SERVER, $_REQUEST, file_get_contents('php://input'), $_FILES);

        $_SERVER['HTTP_USER_AGENT'] = "Unit Test";
    }
}
