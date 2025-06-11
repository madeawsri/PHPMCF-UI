<nav class="navbar is-primary is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/dashboard">
            <strong>Admin Panel</strong>
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasic">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasic" class="navbar-menu">
        <div class="navbar-start">
            <a href="/dashboard" class="navbar-item">
                <span class="icon">
                    <i class="fas fa-tachometer-alt"></i>
                </span>
                <span>แดชบอร์ด</span>
            </a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    <span class="icon">
                        <i class="fas fa-user-circle"></i>
                    </span>
                    <span>ผู้ดูแลระบบ</span>
                </a>

                <div class="navbar-dropdown is-right">
                    <a class="navbar-item">
                        <span class="icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span>โปรไฟล์</span>
                    </a>
                    <a class="navbar-item">
                        <span class="icon">
                            <i class="fas fa-cog"></i>
                        </span>
                        <span>ตั้งค่า</span>
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item" href="/logout">
                        <span class="icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                        <span>ออกจากระบบ</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Add a click event on each of them
        $navbarBurgers.forEach(el => {
            el.addEventListener('click', () => {
                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');
            });
        });
    });
</script>