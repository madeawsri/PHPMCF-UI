@extends('master')

@section('title', 'หน้าแรก')

@section('header')
    <div class="p-4 bg-blue-600 text-white text-center">ยินดีต้อนรับ About</div>
@endsection

@section('content')
    <div class="p-6 max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">หน้าแรก</h1>

        <div x-data="{ open: false }">
            <button @click="open = !open" class="px-4 py-2 bg-green-500 text-white rounded">Toggle</button>
            <div x-show="open" x-cloak class="mt-2 bg-gray-100 p-4 rounded">เนื้อหาถูกแสดง</div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    console.log('Home page loaded');
</script>
@endpush
