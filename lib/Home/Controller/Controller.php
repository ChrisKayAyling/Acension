<?php
namespace Home\Controller;

use Home\Repository\Repository;
use Ascension\HTTP;
use Ascension\Core;

/**
 * Class Controller
 * @package Home\Controller
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
     * @var HTTP
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

        $this->data['DatabaseResult'] = Core::$Resources['DataStorage']['SQLiteConnector']->query("SELECT * FROM main");

        $this->templates = array();
        $this->templates[] = "default.twig";
    }

}