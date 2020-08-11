<?php

class Config {
    const SEO_INDEXATION = true;
    const DEBUG_MODE = true;

    public $projectRoot;
    public $serverURL;
    public $uri;
    public $routing;
    public $args;
    public $authenticated;
    public $requestMethod;

    function __construct() {
        @session_start();
        ini_set('display_errors', self::DEBUG_MODE ? E_ALL : E_ERROR);
        $this->projectRoot = $_SERVER['DOCUMENT_ROOT'];
        $this->serverURL = $_SERVER['HTTP_HOST'];
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->title = 'Test Application';
        $this->parseUri();
        $this->authenticated = (isset($_SESSION['auth']) && $_SESSION['auth'] == true) ? true : false;
    }

    private function parseUri() {
        $this->routing = new stdClass();
        $uri = explode('/', $_SERVER['REQUEST_URI']); array_shift($uri);
        $this->routing->controller = strlen($uri[0]) > 0 ? $uri[0] : 'Application';
        $this->routing->action = (isset($uri[1]) && strlen($uri[1]) > 0) ? $uri[1] : 'index';
        if (isset($uri[2]) && strlen($uri[2]) > 0) { $this->args = $uri[2]; } else { $this->args = false; }
    }
}
