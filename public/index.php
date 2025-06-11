<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/libs/helpers.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === '/js-render.php') {
    require __DIR__ . '/../app/libs/js-render.php';
    exit;
}


use App\Libs\Core;

try {
    $core = new Core();
    $core->run();
} catch (\Throwable $e) {
    echo "Error: " . $e->getMessage();
    // หรือใช้ log_error($e) แล้วแสดงหน้าสวย ๆ
}
