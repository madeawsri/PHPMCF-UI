document.addEventListener('alpine:init', () => {
    Alpine.store('app', {
        // สถานะหลักของแอปพลิเคชัน
        user: JSON.parse(localStorage.getItem('user')) || null,
        token: localStorage.getItem('token') || null,
        projects: [],
        currentProject: null,

        // ตรวจสอบสถานะการล็อกอิน
        isAuthenticated() {
            return this.token !== null;
        },

        // ฟังก์ชันล็อกอิน
        async login(email, password) {
            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ email, password })
                });

                const data = await response.json();

                if (data.success) {
                    this.user = data.user;
                    this.token = data.token;

                    // บันทึกใน LocalStorage
                    localStorage.setItem('user', JSON.stringify(data.user));
                    localStorage.setItem('token', data.token);

                    return true;
                } else {
                    throw new Error(data.message);
                }
            } catch (error) {
                console.error('Login error:', error);
                return false;
            }
        },

        // ฟังก์ชันล็อกเอาท์
        logout() {
            this.user = null;
            this.token = null;
            localStorage.removeItem('user');
            localStorage.removeItem('token');
            window.location.href = '/login';
        },

        // โหลดโปรเจคทั้งหมด
        async loadProjects() {
            try {
                const response = await fetch('/api/projects', {
                    headers: {
                        'Authorization': `Bearer ${this.token}`
                    }
                });

                const data = await response.json();
                this.projects = data.projects;
            } catch (error) {
                console.error('Failed to load projects:', error);
            }
        },

        // สร้างโปรเจคใหม่
        async createProject(projectData) {
            try {
                const response = await fetch('/api/projects', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${this.token}`
                    },
                    body: JSON.stringify(projectData)
                });

                const data = await response.json();

                if (data.success) {
                    this.projects.push(data.project);
                    return data.project;
                } else {
                    throw new Error(data.message);
                }
            } catch (error) {
                console.error('Create project error:', error);
                return null;
            }
        }
    });
});
