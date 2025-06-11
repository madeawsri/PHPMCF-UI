@extends('master')

@section('title', 'Login')

@section('content')
    <div class="columns is-centered is-vcentered full-height">
        <div class="column is-4">
            <div class="box">
                <h1 class="title has-text-centered">ระบบเข้าสู่ระบบ</h1>

                <form method="POST" action="">
                    @csrf

                    <div class="field">
                        <label class="label">อีเมล</label>
                        <div class="control has-icons-left">
                            <input class="input" type="email" name="email" required autofocus>
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">รหัสผ่าน</label>
                        <div class="control has-icons-left">
                            <input class="input" type="password" name="password" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="checkbox">
                            <input type="checkbox" name="remember">
                            จดจำฉัน
                        </label>
                    </div>

                    <div class="field">
                        <button type="submit" class="button is-primary is-fullwidth">
                            เข้าสู่ระบบ
                        </button>
                    </div>

                    {{-- @if ($errors->any())
                    <div class="notification is-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                </form>
            </div>
        </div>
    </div>

    <style>
        .full-height {
            min-height: 100vh;
        }
    </style>
@endsection
