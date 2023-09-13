<?php
namespace ControlPanel\Controller;

use Ascension\Core;
use ControlPanel\Repository\Repository;
use Ascension\HTTP;

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

        $this->templates = array();

        if (isset($_SESSION['User'])) {
            $this->templates[] = "ControlPanel/default.twig";
        } else {
            $this->templates[] = "ControlPanel/login.twig";
        }
    }

    /**
     * loginSubmit
     *
     * Validate a login.
     *
     * @return void
     */
    public function loginSubmit() {
        if (isset($this->Request->data['Username']) && isset($this->Request->data['Password'])) {

            $UserID = Core::$Resources['DataStorage']['core']->query(
                sprintf(
                    "SELECT ID FROM users WHERE Username = '%s' AND Password = '%s'",
                    $this->Request->data['Username'],
                    $this->Request->data['Password']
                ));

            if ($UserID !== NULL) {
                $_SESSION['User'] = $UserID;
                $this->templates[] = "ControlPanel/default.twig";
                return true;
            } else {
                $this->templates[] = "ControlPanel/loginfailed.twig";
                return false;
            }

        } else {
            $this->templates[] = "ControlPanel/loginfailed.twig";
            return false;
        }
    }

    /**
     * logout
     *
     * Unset session and display login box.
     * @return void
     */
    public function logout() {
        unset($_SESSION['User']);
        $this->templates[] = "ControlPanel/login.twig";
    }

}