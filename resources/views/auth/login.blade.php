<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Anisa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite('resources/css/app.css')
</head>

<body>
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-600 to-teal-500 overflow-hidden">
        <div class="flex w-full max-w-4xl bg-white rounded-lg shadow-lg overflow-hidden mx-3">
            <div class="hidden md:flex md:w-1/2 items-center justify-center relative">
                <div class="absolute w-72 h-72 bg-teal-400 opacity-60 rounded-full blur-3xl animate-pulse"></div>

                <img src="https://i.pinimg.com/736x/b1/c4/6f/b1c46f8ad48d88c7a065360a401d63a6.jpg" alt="Ibu Hamil"
                    class="relative w-3/4 rounded-full shadow-lg transform scale-110 animate-fade-in">
            </div>

            <div class="w-full md:w-1/2 p-8 m-3">
                <div class="flex md:hidden md:w-1/2 items-center justify-center relative">
                    <div class="absolute w-72 h-72 bg-teal-400 opacity-60 rounded-full blur-3xl animate-pulse"></div>

                    <img src="https://i.pinimg.com/736x/b1/c4/6f/b1c46f8ad48d88c7a065360a401d63a6.jpg" alt="Ibu Hamil"
                        class="relative w-3/4 rounded-full shadow-lg transform scale-110 animate-fade-in">
                </div>

                <div class="text-center my-6">
                    <h1 class="text-3xl font-bold text-teal-600">Produk Anisa</h1>
                    <p class="text-gray-600 text-sm">Solusi Sehat untuk Ibu & Bayi</p>
                </div>

                <h2 class="text-2xl font-semibold text-center text-gray-700">Masuk</h2>
                @if(session('success'))
                <p class="text-green-500 text-center">{{ session('success') }}</p>
                @endif
                <form action="{{ route('login') }}" method="POST" class="mt-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Email</label>
                        <input type="email" name="email"
                            class="w-full px-4 py-2 mt-1 border rounded-lg border-teal-500 focus:ring focus:ring-teal-300 transition duration-300 ease-in-out focus:outline-none"
                            placeholder="Masukkan email anda" required>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-600">Kata Sandi</label>
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                class="w-full px-4 py-2 border rounded-lg border-teal-500 focus:ring focus:ring-teal-300"
                                placeholder="Masukkan kata sandi" required>
                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full px-4 py-2 mt-6 font-semibold text-white bg-teal-500 rounded-lg hover:bg-teal-600 transition duration-300 ease-in-out shadow-lg transform hover:scale-105">
                        Masuk Sekarang
                    </button>
                </form>
                <p class="mt-4 text-sm text-center text-gray-600">Belum punya akun?
                    <a href="/auth/register" class="text-teal-500 hover:underline">Daftar disini.</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
                const passwordInput = document.getElementById('password');
                const icon = this.querySelector('i');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
    </script>
</body>

</html>