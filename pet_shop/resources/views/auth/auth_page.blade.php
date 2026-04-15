<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員系統 - Pet Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
        <div class="flex border-b mb-6">
            <button id="loginTab" class="flex-1 py-2 text-center border-b-2 border-blue-500 font-bold" onclick="showForm('login')">登入</button>
            <button id="registerTab" class="flex-1 py-2 text-center text-gray-500 font-bold" onclick="showForm('register')">註冊</button>
        </div>

        <div id="message" class="hidden mb-4 p-3 rounded text-sm"></div>

        <form id="loginForm" class="space-y-4" method="POST" action="{{ route('login.post') }}">
            @csrf
            <div>
                <label for="loginEmail" class="block text-sm font-medium text-gray-700">電子郵件</label>
                <input type="email" id="loginEmail" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="loginPassword" class="block text-sm font-medium text-gray-700">密碼</label>
                <input type="password" id="loginPassword" name="password" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">登入</button>
        </form>

        <form id="registerForm" class="hidden space-y-4">
            <div>
                <label for="regName" class="block text-sm font-medium text-gray-700">名稱</label>
                <input type="text" id="regName" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>
            <div>
                <label for="regEmail" class="block text-sm font-medium text-gray-700">電子郵件</label>
                <input type="email" id="regEmail" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>
            <div>
                <label for="regPassword" class="block text-sm font-medium text-gray-700">密碼 (最少8碼)</label>
                <input type="password" id="regPassword" name="password" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>
            <div>
                <label for="regPasswordConfirm" class="block text-sm font-medium text-gray-700">確認密碼</label>
                <input type="password" id="regPasswordConfirm" name="password_confirmation" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 transition">註冊</button>
        </form>

        <div id="loggedInView" class="hidden space-y-4 text-center">
            <h2 class="text-xl font-bold">驗證中...</h2>
        </div>
        <!-- 回到官網按鈕 -->
        <div class="mt-6 pt-6 border-t text-center">
            <button onclick="window.location.href='{{ url('/') }}'" class="text-gray-500 hover:text-orange-400 transition-all text-sm flex items-center justify-center gap-2 w-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                回到 Haven Pets 官網
            </button>
        </div>
        </div>

        <script>
        const API_URL = "{{ url('api') }}";
        const CSRF_TOKEN = "{{ csrf_token() }}";

        function showForm(type) {
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            const loginTab = document.getElementById('loginTab');
            const registerTab = document.getElementById('registerTab');
            if (type === 'login') {
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
                loginTab.classList.add('border-blue-500', 'text-blue-500');
                registerTab.classList.remove('border-blue-500', 'text-blue-500');
            } else {
                loginForm.classList.add('hidden');
                registerForm.classList.remove('hidden');
                registerTab.classList.add('border-blue-500', 'text-blue-500');
                loginTab.classList.remove('border-blue-500', 'text-blue-500');
            }
        }

        function showMsg(text, isError = false) {
            const msgBox = document.getElementById('message');
            msgBox.textContent = text;
            msgBox.className = `mb-4 p-3 rounded text-sm ${isError ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700'}`;
            msgBox.classList.remove('hidden');
        }

        document.getElementById('registerForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const data = {
                name: document.getElementById('regName').value,
                email: document.getElementById('regEmail').value,
                password: document.getElementById('regPassword').value,
                password_confirmation: document.getElementById('regPasswordConfirm').value
            };
            try {
                const response = await fetch(`${API_URL}/register`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': CSRF_TOKEN },
                    body: JSON.stringify(data)
                });
                const resData = await response.json();
                if (response.ok) {
                    showMsg('註冊成功！請登入');
                    showForm('login');
                } else {
                    let errorMsg = resData.message;
                    if (resData.errors) {
                        const details = Object.values(resData.errors).flat().join(' | ');
                        errorMsg += `: ${details}`;
                    }
                    showMsg(errorMsg || '註冊失敗', true);
                }
            } catch (err) {
                showMsg('連線失敗', true);
            }
        });

        // The login form is now handled by Laravel's web routes, so no JS event listener is needed for it.

        window.onload = async () => {
            // Check for previous errors from Laravel's web redirection
            @if ($errors->any())
                showMsg('登入失敗，請檢查您的電子郵件或密碼。', true);
            @endif

            // This part is for API token based login (future expansion), no longer directly for web login.
            // If you want to keep API login for other parts of the app, this would be handled differently.
            // For now, it's commented out/removed to focus on web-based authentication.
            /*
            const token = localStorage.getItem('auth_token');
            if (token) {
                document.getElementById('loginForm').classList.add('hidden');
                document.querySelector('.flex.border-b').classList.add('hidden');
                document.getElementById('loggedInView').classList.remove('hidden');

                try {
                    const response = await fetch(`${API_URL}/user`, {
                        headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json' }
                    });
                    if (response.ok) {
                        window.location.href = "{{ route('admin.dashboard') }}";
                    } else {
                        localStorage.removeItem('auth_token');
                        location.reload();
                    }
                } catch (e) {
                    localStorage.removeItem('auth_token');
                    location.reload();
                }
            }
            */
        };
        </script>
        </body>
        </html>
