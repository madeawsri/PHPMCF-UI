<nav class="navbar is-primary" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <strong>MyProject</strong>
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarMenu"
            @click="open = !open" :class="{ 'is-active': open }" x-data="{ open: false }">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarMenu" class="navbar-menu" :class="{ 'is-active': open }" x-show="open">
        <div class="navbar-start">
            <a class="navbar-item" href="/dashboard">แดชบอร์ด</a>
            <a class="navbar-item" href="/users">ผู้ใช้</a>
            <a class="navbar-item" href="/settings">ตั้งค่า</a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="button is-light">ออกจากระบบ</button>
                </form>
            </div>
        </div>
    </div>
</nav>
