@extends('master')

@section('title', 'Welcome')

@section('content')
<h1>Hello, {{ $name ?? $x ?? ''}}!</h1>
<p>Welcome to Modular-Core Framework. ({{ $code ?? '-' }})</p>
<div x-data="{ open: false }" class="p-6 max-w-sm mx-auto bg-white rounded shadow">
  <button @click="open = !open" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
    Toggle Content
  </button>

  <div x-show="open" class="mt-4 p-4 bg-gray-100 rounded" x-init="alert.home()">
    <p class="text-gray-700">นี่คือเนื้อหาที่ซ่อน/แสดงได้ด้วย Alpine.js</p>
  </div>
</div>

{{-- <pre>{{ module_path(\App\Libs\App::get('module')."/js/") }}</pre> --}}

@endsection

@section('js')
{{-- <script src="js/index.js"></script> --}}
@endsection
