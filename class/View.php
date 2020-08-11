<?php

class View {
    const VIEWS_DIR = 'views';
    const VIEW_EXTENSION = 'php';

    protected $headers = [
        '<meta charset="utf-8">',
        true ? '<meta name="robots" content="noindex,nofollow">' : '',
    ];
    protected $title;
    protected $css = [
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css',
        '/css/common.css'
    ];
    protected $js = [
        '//code.jquery.com/jquery-3.2.1.min.js',
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
        '/js/jquery.inputmask.bundle.min.js',
        '/js/phone.min.js',
        '/js/common.js'
    ];
    private $app;
    private $viewPath;
    private $output = [];

    function __construct($app) {
        $this->app = $app;
        $this->viewPath = $this->app->projectRoot.DIRECTORY_SEPARATOR.self::VIEWS_DIR;
    }

    public function render($viewName, $params = []) {
        foreach ($params as $key => $value) { $$key = $value; }
        ob_start();
        $this->setupHeaders();
        require_once implode('.', [$this->viewPath.DIRECTORY_SEPARATOR.$viewName, self::VIEW_EXTENSION]);
        $content = ob_get_flush();
        ob_flush();
        return $content;
    }

    private function setupHeaders() {
        $this->output[] = '<!DOCTYPE html>';
        $this->output[] = '<html><head>';
        foreach ($this->headers as $head) { $this->output[] = $head; }
        foreach ($this->css as $css) { $this->output[] = '<link rel="stylesheet" href="'.$css.'">'; }
        foreach ($this->js as $js) { $this->output[] = '<script type="text/javascript" src="'.$js.'"></script>'; }
        $this->output[] = '</head>';
        echo implode(PHP_EOL, $this->output);
    }
}
