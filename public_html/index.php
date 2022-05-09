<?php

use Ascension\Core;

require_once('../vendor/autoload.php');

/* Verbose debugging */
Core::$Debug = false;

// Default Routing
Core::$defaultRouting['controller'] = "Home";
Core::$defaultRouting['method'] = "main";

/* Do not edit below this line */

try {
    Core::__loadSettings();
    Core::addDataStorageObjects();
} catch (Exception $e) {
    d($e);
}

try {
    Core::ascend();
} catch (\Exception $e) {
    d($e);
}

