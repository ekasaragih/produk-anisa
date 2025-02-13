<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Produk Anisa</title>
    @vite('resources/css/app.css')
</head>

<body
    class="relative flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-700 to-teal-500 overflow-hidden">

    <!-- Container -->
    <div
        class="relative z-10 w-full max-w-sm bg-white p-6 rounded-lg shadow-lg border border-teal-500 transform transition duration-500 hover:scale-105">
        <!-- Ilustrasi SVG -->
        <div class="flex justify-center">
            <img src="https://i.pinimg.com/736x/ca/1a/9b/ca1a9b9e61cb9047b5cd33de80fd850f.jpg" alt="Ibu Hamil"
                class="w-24 h-24 mb-4 mt-4">
        </div>

        <h2 class="text-2xl font-semibold text-center text-gray-700">Masuk</h2>

        <form class="mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-600">Email</label>
                <div class="relative">
                    <input type="email"
                        class="w-full px-4 py-2 mt-1 border rounded-lg border-teal-500 focus:ring focus:ring-teal-300 transition duration-300 ease-in-out focus:outline-none"
                        placeholder="Masukkan email anda" required>
                    <span class="absolute right-3 top-3 text-teal-500">
                        🔐
                    </span>
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-600">Kata Sandi</label>
                <div class="relative">
                    <input type="password"
                        class="w-full px-4 py-2 mt-1 border rounded-lg border-teal-500 focus:ring focus:ring-teal-300 transition duration-300 ease-in-out focus:outline-none"
                        placeholder="Masukkan kata sandi" required>
                    <span class="absolute right-3 top-3 text-teal-500">
                        🔑
                    </span>
                </div>
            </div>

            <button type="submit"
                class="w-full px-4 py-2 mt-4 font-semibold text-white bg-teal-500 rounded-lg hover:bg-teal-600 transition duration-300 ease-in-out shadow-lg transform hover:scale-105">
                Masuk Sekarang
            </button>
        </form>

        <p class="mt-4 text-sm text-center text-gray-600">Belum punya akun?
            <a href="#" class="text-teal-500 hover:underline">Daftar disini.</a>
        </p>
    </div>

</body>

</html>