<div x-data="{
    email: '',
    password: '',
    isLoading: false,
    error: null,

    async handleLogin() {
        this.isLoading = true;
        this.error = null;

        const success = await Alpine.store('app').login(this.email, this.password);

        if (success) {
            window.location.href = '/dashboard';
        } else {
            this.error = 'อีเมลหรือรหัสผ่านไม่ถูกต้อง';
        }

        this.isLoading = false;
    }
}">
    <div class="box">
        <h1 class="title">เข้าสู่ระบบ</h1>

        <div x-show="error" class="notification is-danger">
            <button @click="error = null" class="delete"></button>
            <span x-text="error"></span>
        </div>

        <div class="field">
            <label class="label">อีเมล</label>
            <div class="control">
                <input x-model="email" class="input" type="email" placeholder="อีเมลของคุณ">
            </div>
        </div>

        <div class="field">
            <label class="label">รหัสผ่าน</label>
            <div class="control">
                <input x-model="password" class="input" type="password" placeholder="รหัสผ่าน">
            </div>
        </div>

        <div class="field">
            <button @click="handleLogin" :disabled="isLoading" class="button is-primary is-fullwidth">
                <span x-show="!isLoading">เข้าสู่ระบบ</span>
                <span x-show="isLoading" class="icon">
                    <i class="fas fa-spinner fa-spin"></i>
                </span>
            </button>
        </div>
    </div>
</div>
