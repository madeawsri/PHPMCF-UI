window.AppConfig = {
    apiUrl: 'https://api.example.com/'
};

function loadModuleJS(moduleName) {
    let script = document.createElement('script');
    script.src = `/modules/${moduleName}/js/${moduleName}.js`;
    document.head.appendChild(script);
}

// โหลดโมดูล JS index เริ่มต้น
//loadModuleJS('index');
