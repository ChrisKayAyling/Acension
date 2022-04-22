<?php
namespace API\Controller;

use API\Repository\Repository;
use Ascension\HTTP;
use CMA\DatabaseConnector\MSSQLConnector;
use Logging\LOG_CATEGORY;
use Logging\LogObject;

/**
 * Class Controller
 * @package API\Controller
 */
class Controller
{

    /**
     * @var $Repository
     */
    protected $Repository;

    /**
     * @var $data
     */
    public $data;

    /**
     * @var array
     */
    public $templates = array();


    /**
     * @var Request
     */
    protected $Request;

    /**
     * @var object
     */
    protected $settings;

    /**
     * Controller constructor.
     * @param Repository $Repository
     */
    public function __construct(
        HTTP $Request,
        $settings,
        Repository $Repository
    )
    {
        $this->Request = $Request;
        $this->settings = $settings;
        $this->Repository = $Repository;
    }

    /**
     * main
     */
    public function main()
    {

        $this->data = array(
            "Information" => "Ascension CMS/API Framework",
            "Route" => "Default",
            "AvailableRoutes" => array(
                "You are here" => "/"

            )
        );
    }

}