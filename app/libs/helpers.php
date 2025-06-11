<?php
function base_path($path = ''): string
{
    $base = realpath(__DIR__ . '/../../'); // หรือคำนวณจากจุดเริ่มที่เหมาะสม
    return rtrim($base, '/') . '/' . ltrim($path, '/');
}

function app_path($path = ''): string
{
    return base_path('app/' . ltrim($path, '/'));
}

function module_path($path = ''): string
{
    return base_path('app/modules/' . ltrim($path, '/'));
}

function public_path($path = ''): string
{
    return base_path('public/' . ltrim($path, '/'));
}

function view_path($path = ''): string
{
    return base_path('template/' . ltrim($path, '/'));
}

function base_url($path = ''): string
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $scriptDir = str_replace(basename($scriptName), '', $scriptName);
    return rtrim($protocol . $host . $scriptDir, '/') . '/' . ltrim($path, '/');
}

/*
base_path() → root ของโปรเจกต์
app_path() → สำหรับโหลดไฟล์ใน app/
public_path() → สำหรับ asset จริง (ไม่ใช่ URL)
base_url() → สำหรับ URL
view_path() → สำหรับโหลด blade template (หรืออาจใช้กับ template/)
*/