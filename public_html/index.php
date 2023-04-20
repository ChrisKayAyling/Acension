<?php

use Ascension\Core;

require_once('../vendor/autoload.php');

Core::$Debug = false;
Core::$TemplateDevelopmentMode = true;

try {
    session_start();
    /* Load Core settings */
    Core::__loadSettings();
    /* End load core settings */

    /* Add Custom Templating Objects */
    Core::addCustomTemplate('Header', 'components/header.twig');
    Core::addCustomTemplate('Navigation', 'components/navigation.twig');
    Core::addCustomTemplate('Footer', 'components/footer.twig');
    /* End Custom Templating */

    /* Support Cli based routing */
    if (isset($argv[1]) && isset($argv[2])) {
        Core::$defaultRouting['controller'] = $argv[1];
        Core::$defaultRouting['method'] = $argv[2];
    } else {
        Core::$defaultRouting['controller'] = "Home";
        Core::$defaultRouting['method'] = "main";
    }
    /* End of support for Cli based routing

    /* Add data storage objects here */
    Core::addDataStorageObjects();
    /* End of addDataStorageObjects */

    Core::ascend();

} catch (Exception $e) {
    d($e);
    if (isset($e['xdebug_message'])) {
        echo $e['xdebug_message'];
    }
}
