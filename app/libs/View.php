<?php 
namespace App\Libs;
use eftec\bladeone\BladeOne;
use \App\Libs\App;
class View {
    protected $blade;

    public function __construct() {
        $views = [__DIR__ . '/../modules',__DIR__.'/../../template']; // โฟลเดอร์ view
        $cache = __DIR__ . '/../cache';   // โฟลเดอร์เก็บ cache
        $this->blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);
    }

    public function render($view, $data = []) {
        //var_dump($data['__js_module'], $data['__css_module'], $data['__jsConfig']);
        echo $this->blade->run(App::get('module').".".$view, $data);
    }

    
}
