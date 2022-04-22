<?php

use Ascension\Core;
use CMA\DatabaseConnector\MSSQLConnector;

require_once('../vendor/autoload.php');

Core::$Debug = false;

try {
    Core::__loadSettings();
} catch (Exception $e) {
    d($e);
}

Core::addDataStorageObject("Default",
    new MSSQLConnector(
        Core::$Resources['Settings']->Database->Hostname,
        Core::$Resources['Settings']->Database->Database,
        Core::$Resources['Settings']->Database->UID,
        Core::$Resources['Settings']->Database->PWD
    )
);
try {
    Core::ascend();
} catch (\Exception $e) {
    d($e);
}

