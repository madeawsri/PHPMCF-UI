<?php

namespace App\Libs;

use App\Libs\View;
use App\Libs\JsConfig;

class Controller
{
    protected $view;
    protected $jsConfig;

    public function __construct()
    {
        $this->jsConfig = new JsConfig();
        $this->view = new View();
    }

    public function loadView($viewFile, $data = [])
    {
        $data['__jsConfig'] = $this->jsConfig->render();
        $data['__js_module'] = $this->jsConfig->includeJs();
        $data['__css_module'] = $this->jsConfig->includeCss();

        $this->view->render($viewFile, $data);
    }

    protected function render(array $data = [], string $view = 'view')
    {
        $data['__jsConfig'] = $this->jsConfig->render();
        $data['__js_module'] = $this->jsConfig->includeJs();
        $data['__css_module'] = $this->jsConfig->includeCss();
        $viewObj = new View();
        $viewObj->render($view, $data);
    }
    protected function redirect(string $url)
    {
        header("Location: $url");
        exit;
    }
}
