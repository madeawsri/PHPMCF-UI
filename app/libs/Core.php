<?php

namespace App\Libs;

use App\Libs\App;

class Core
{
    protected $basePath;
    protected $module;
    protected $method;
    protected $params;

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->parseRoute($uri);
        // เก็บค่าลง global ก่อน
        
        App::set('module', $this->module);
        App::set('method', $this->method);
        App::set('params', $this->params);

        $this->runMvc(); // ค่อย run controller หลังจาก set ค่าแล้ว
    }

    protected function parseRoute(string $uri)
    {
        // logic ตัด basePath ออกจาก URI และ parse
        $this->basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');

        if (strpos($uri, $this->basePath) === 0) {
            $path = substr($uri, strlen($this->basePath));
        } else {
            $path = $uri;
        }
        $path = trim($path, '/');

        $segments = explode('/', trim($path, '/'));

        // $this->module = $segments[0] ?? 'index';
        // $this->method = $segments[1] ?? 'index';
        $this->module = isset($segments[0]) && trim($segments[0]) !== '' ? $segments[0] : 'index';
        $this->method = isset($segments[1]) && trim($segments[1]) !== '' ? $segments[1] : 'index';

        $this->params = array_slice($segments, 2);
    }

    protected function runMvc()
    {

        
        
        $controllerFile = __DIR__ . "/../modules/{$this->module}/index.php";
        $controllerName = 'IndexCtrl';
        if( !file_exists($controllerFile)) {
            // ถ้าไม่พบไฟล์ index.php ให้ลองค้นหาไฟล์ตามชื่อโมดูล
            $controllerName = ucfirst($this->module) . 'Ctrl';
            $controllerFile = __DIR__ . "/../modules/{$this->module}/{$controllerName}.php";
        }
        
        //$controllerFile = __DIR__ . "/../modules/{$this->module}/{$controllerName}.php";

        if (!file_exists($controllerFile)) {
            http_response_code(404);
            echo "404 Module not found.";
            exit;
        }

        require_once $controllerFile;

        if (!class_exists($controllerName)) {
            http_response_code(500);
            echo "Class $controllerName not found.";
            exit;
        }

        // สร้าง Controller พร้อมส่งค่า basePath, module, method, params
        $controller = new $controllerName($this->basePath, $this->module, $this->method, $this->params);

        if (!method_exists($controller, $this->method)) {
            http_response_code(404);
            echo "Method not found.";
            exit;
        }

        call_user_func_array([$controller, $this->method], $this->params);
    }
}
