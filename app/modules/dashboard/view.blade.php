@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<section class="section">
    <h1 class="title">แดชบอร์ด</h1>
    <h2 class="subtitle">ข้อมูลสรุประบบ</h2>
    
    <div class="columns">
        <!-- Card 1 -->
        <div class="column is-3">
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <span class="icon is-large has-text-info">
                                <i class="fas fa-users fa-2x"></i>
                            </span>
                        </div>
                        <div class="media-content">
                            <p class="title is-4">1,234</p>
                            <p class="subtitle is-6">ผู้ใช้งาน</p>
                        </div>
                    </div>
                </div>
                <footer class="card-footer">
                    <a href="#" class="card-footer-item">ดูทั้งหมด</a>
                </footer>
            </div>
        </div>
        
        <!-- Card 2 -->
        <div class="column is-3">
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <span class="icon is-large has-text-success">
                                <i class="fas fa-shopping-cart fa-2x"></i>
                            </span>
                        </div>
                        <div class="media-content">
                            <p class="title is-4">567</p>
                            <p class="subtitle is-6">คำสั่งซื้อ</p>
                        </div>
                    </div>
                </div>
                <footer class="card-footer">
                    <a href="#" class="card-footer-item">ดูทั้งหมด</a>
                </footer>
            </div>
        </div>
        
        <!-- Card 3 -->
        <div class="column is-3">
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <span class="icon is-large has-text-warning">
                                <i class="fas fa-box-open fa-2x"></i>
                            </span>
                        </div>
                        <div class="media-content">
                            <p class="title is-4">89</p>
                            <p class="subtitle is-6">สินค้า</p>
                        </div>
                    </div>
                </div>
                <footer class="card-footer">
                    <a href="#" class="card-footer-item">ดูทั้งหมด</a>
                </footer>
            </div>
        </div>
        
        <!-- Card 4 -->
        <div class="column is-3">
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <span class="icon is-large has-text-danger">
                                <i class="fas fa-exclamation-triangle fa-2x"></i>
                            </span>
                        </div>
                        <div class="media-content">
                            <p class="title is-4">12</p>
                            <p class="subtitle is-6">ปัญหา</p>
                        </div>
                    </div>
                </div>
                <footer class="card-footer">
                    <a href="#" class="card-footer-item">ดูทั้งหมด</a>
                </footer>
            </div>
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div class="box">
        <h2 class="title is-4">กิจกรรมล่าสุด</h2>
        <div class="table-container">
            <table class="table is-fullwidth is-striped">
                <thead>
                    <tr>
                        <th>วันที่</th>
                        <th>กิจกรรม</th>
                        <th>ผู้ใช้</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>10/06/2025</td>
                        <td>เพิ่มผู้ใช้ใหม่</td>
                        <td>admin</td>
                        <td><span class="tag is-success">สำเร็จ</span></td>
                    </tr>
                    <tr>
                        <td>09/06/2025</td>
                        <td>อัปเดตสินค้า</td>
                        <td>staff</td>
                        <td><span class="tag is-success">สำเร็จ</span></td>
                    </tr>
                    <tr>
                        <td>08/06/2025</td>
                        <td>ลบคำสั่งซื้อ</td>
                        <td>admin</td>
                        <td><span class="tag is-danger">ล้มเหลว</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection