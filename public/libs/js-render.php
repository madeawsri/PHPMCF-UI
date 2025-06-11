<?php
$ENV = 'dev'; // เปลี่ยนเป็น 'production' เวลาขึ้น production
$module = $_GET['module'] ?? '';
$file = $_GET['file'] ?? '';
$allowedExt = ['js']; // หรือเพิ่ม css ถ้าจะใช้รวม

if ($ENV === 'production') {
    header('Cache-Control: public, max-age=31536000, immutable');
} else {
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: 0');
    header('Pragma: no-cache');
}


// === SECURITY CHECK ===
if (!$module || !$file || !preg_match('/^[a-zA-Z0-9_\-]+$/', $module) || !preg_match('/^[a-zA-Z0-9_\-\.]+$/', $file)) {
    http_response_code(400);
    echo "// Invalid module or file";
    exit;
}

// === PATH SETUP ===
$basePath = realpath(__DIR__ . "/../../app/modules/$module/js/");
$targetFile = realpath($basePath . '/' . $file);

// ป้องกัน path traversal
if (!$basePath || !$targetFile || strpos($targetFile, $basePath) !== 0 || !file_exists($targetFile)) {
    http_response_code(404);
    echo "// File not found";
    exit;
}

// === MIME + HEADER ===
$ext = pathinfo($targetFile, PATHINFO_EXTENSION);
if (!in_array($ext, $allowedExt)) {
    http_response_code(403);
    echo "// Forbidden file type";
    exit;
}
header("Content-Type: application/javascript; charset=utf-8");

// === CACHE CONTROL ===
$lastModified = gmdate('D, d M Y H:i:s', filemtime($targetFile)) . ' GMT';
$etag = md5_file($targetFile);

header("Last-Modified: $lastModified");
header("ETag: \"$etag\"");

if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) || isset($_SERVER['HTTP_IF_NONE_MATCH'])) {
    if (@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) === filemtime($targetFile) || trim($_SERVER['HTTP_IF_NONE_MATCH'], '"') === $etag) {
        http_response_code(304);
        exit;
    }
}

if ($ENV === 'production') {
    // Cache นานมากใน production
    header('Cache-Control: public, max-age=31536000, immutable');
} else {
    // Dev ห้าม cache
    header('Cache-Control: no-cache, must-revalidate');
}

// === OUTPUT FILE ===
readfile($targetFile);
exit;
