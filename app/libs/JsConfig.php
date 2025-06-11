<?php

namespace App\Libs;

use \App\Libs\App;

class JsConfig
{
    protected array $data = [];

    public function set(string $key, $value): self
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function setMany(array $data): self
    {
        $this->data = array_merge($this->data, $data);
        return $this;
    }

    public function render(string $globalVar = 'AppData'): string
    {
        $json = json_encode($this->data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return "<script>window.{$globalVar} = {$json};</script>";
    }

    function includeJs(string $subPath = ''): string
    {
        $module = App::get('module');
        $path = module_path($module . '/js/' . trim($subPath, '/'));
        $output = '';

        if (is_dir($path)) {
            foreach (glob($path . '/*.js') as $file) {
                $fileName = basename($file);

                // 👉 กำหนด URL ให้ผ่าน proxy
                if (App::get('env') === 'production') {
                    // ชี้ไปยังไฟล์ที่ถูก build แล้วใน public
                    $this->deployModuleJs($module, $fileName);
                    $src = base_url("assets/modules/{$module}/js/{$fileName}");
                } else {
                    // โหลดผ่าน proxy PHP ใน dev
                    $src = base_url("/libs/js-render.php?module=$module&file=$fileName");
                }
                $output .= '<script src="' . $src . '" defer></script>' . PHP_EOL;
            }
        }

        return $output;
    }

    function deployModuleJs(string $module, string $file)
    {
        // ป้องกัน path traversal
        if (!preg_match('/^[a-zA-Z0-9_\-]+$/', $module) || !preg_match('/^[a-zA-Z0-9_\-\.]+$/', $file)) {
            //echo "❌ Invalid module or file name.\n";
            return;
        }

        // Path ตั้งต้น
        $sourceFile = realpath(__DIR__ . "/../../app/modules/{$module}/js/{$file}");
        $targetDir = __DIR__ . "/../../public/assets/modules/{$module}/js";
        $targetFile = $targetDir . '/' . $file;

        // ตรวจสอบว่าไฟล์ต้นทางมีอยู่จริง
        if (!$sourceFile || !file_exists($sourceFile)) {
            //echo "❌ Source file not found: $sourceFile\n";
            return;
        }

        // สร้างโฟลเดอร์ปลายทางหากยังไม่มี
        if (!is_dir($targetDir)) {
            if (!mkdir($targetDir, 0777, true)) {
                echo "❌ Failed to create directory: $targetDir\n";
                return;
            }
            //echo "📁 Created directory: $targetDir\n";
        }

        // คัดลอกไฟล์
        if (copy($sourceFile, $targetFile)) {
            //echo "✅ Copied: {$file} to modules/{$module}/js\n";
        } else {
            //echo "❌ Failed to copy file: {$file}\n";
        }
    }



    function includeCss(string $subPath = ''): string
    {
        $module = App::get('module');
        $path = module_path($module . '/css/' . trim($subPath, '/'));
        $output = '';

        if (is_dir($path)) {

            foreach (glob($path . '/*.css') as $file) {
                $fileName = basename($file);
                $href = base_url("app/modules/{$module}/css/{$fileName}");
                $output .= '<link rel="stylesheet" href="' . $href . '">' . PHP_EOL;
            }
        }

        return $output;
    }



    public function getData(): array
    {
        return $this->data;
    }
}
