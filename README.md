```markdown
# PHPMCF-UI

> Modular-Core Framework สำหรับ PHP + BladeOne + JavaScript  
> เน้นโครงสร้างแยกโมดูลง่ายต่อการขยาย และพัฒนา Frontend UI

---

## เนื้อหาใน README นี้

- [แนะนำโปรเจค](#แนะนำโปรเจค)
- [โครงสร้างโปรเจค](#โครงสร้างโปรเจค)
- [ขั้นตอนเริ่มต้นใช้งาน](#ขั้นตอนเริ่มต้นใช้งาน)
- [รายละเอียดแต่ละส่วน](#รายละเอียดแต่ละส่วน)
- [ตัวอย่างการใช้งาน](#ตัวอย่างการใช้งาน)
- [วิธีรันโปรเจค](#วิธีรันโปรเจค)
- [License](#license)

---

## แนะนำโปรเจค

PHPMCF-UI คือ **Modular-Core Framework** ที่เป็นพื้นฐานสำหรับการพัฒนาโปรเจค PHP แบบแยกโมดูล  
โดยใช้ BladeOne สำหรับ template และแยกส่วนของ JavaScript เป็นโมดูล ทำให้จัดการโค้ดง่ายและ scalable

---

## โครงสร้างโปรเจค

```

## Directory Overview

### `/app`
Contains the main application code
- `config/`: Configuration files
  - `Config.php`: Main configuration class
- `libs/`: Core libraries
  - `Controller.php`: Base controller
  - `View.php`: View handling
  - `Core.php`: Core framework functionality
- `modules/`: Feature modules
  - `index/`: Default module
    - `IndexCtrl.php`: Index controller
    - `view.blade.php`: View template
    - `js/`: Module-specific JavaScript
      - `index.js`: Main JS for index module
    - `views/`: Additional view files

### `/public`
Publicly accessible files
- `assets/`: Static assets
  - `js/`: JavaScript files
    - `core.js`: Core JavaScript
  - `css/`: Stylesheets
- `index.php`: Application entry point

### `/template`
Master templates
- `master.blade.php`: Main layout template
````

---

## ขั้นตอนเริ่มต้นใช้งาน

1. วางโครงสร้างไฟล์ตามที่กำหนด
2. เขียน Core PHP เพื่อจัดการ routing และโหลด Controller
3. สร้าง Base Controller สำหรับ Controller ต่าง ๆ
4. เขียน View Helper สำหรับ render Blade template
5. สร้าง Template Layout (master.blade.php)
6. สร้างโมดูลตัวอย่าง (เช่น index)
7. เขียน Core JS สำหรับจัดการโหลดโมดูล JavaScript
8. ตั้งค่า entry point ใน public/index.php

---

## รายละเอียดแต่ละส่วน (ตัวอย่างโค้ด)

### Core.php (Router แบบง่าย)

```php
class Core {
    public static function run() {
        $module = $_GET['module'] ?? 'index';
        $controllerName = ucfirst($module) . 'Ctrl';
        $controllerFile = __DIR__ . "/../modules/$module/{$controllerName}.php";

        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controller = new $controllerName();
            $controller->index();
        } else {
            echo "404 Module not found.";
        }
    }
}
````

### Controller.php (Base Controller)

```php
class Controller {
    protected $view;

    public function __construct() {
        $this->view = new View();
    }

    public function loadView($viewFile, $data = []) {
        $this->view->render($viewFile, $data);
    }
}
```

### View\.php (View helper ด้วย BladeOne)

```php
use eftec\bladeone\BladeOne;

class View {
    protected $blade;

    public function __construct() {
        $views = __DIR__ . '/../modules';
        $cache = __DIR__ . '/../cache';
        $this->blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);
    }

    public function render($view, $data = []) {
        echo $this->blade->run($view, $data);
    }
}
```

### ตัวอย่าง Module index

`IndexCtrl.php`

```php
class IndexCtrl extends Controller {
    public function index() {
        $data = ['name' => 'User'];
        $this->loadView('index.view', $data);
    }
}
```

`view.blade.php`

```blade
@extends('template.master')

@section('title', 'Welcome')

@section('content')
<h1>Hello, {{ $name }}!</h1>
<p>Welcome to Modular-Core Framework.</p>
@endsection

@section('js')
<script src="js/index.js"></script>
@endsection
```

---

## วิธีรันโปรเจค

1. ติดตั้ง Composer และไลบรารี BladeOne
2. ตั้งค่าเว็บเซิร์ฟเวอร์ให้ root ชี้ไปที่โฟลเดอร์ `public/`
3. เปิดเบราว์เซอร์เข้าที่ `http://localhost/`
4. ระบบจะโหลด Controller และ View ตามโมดูลที่ระบุ

---

## License

MIT License


