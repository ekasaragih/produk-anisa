<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Anisa</title>
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

                <form action="{{ route('register') }}" method="POST" class="mt-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Nama Lengkap</label>
                        <input type="text" name="full_name"
                            class="w-full px-4 py-2 mt-1 border rounded-lg border-teal-500 focus:ring focus:ring-teal-300 transition duration-300 ease-in-out focus:outline-none"
                            placeholder="Masukkan nama lengkap anda" required>
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-600">Username</label>
                        <input type="text" name="username"
                            class="w-full px-4 py-2 mt-1 border rounded-lg border-teal-500 focus:ring focus:ring-teal-300 transition duration-300 ease-in-out focus:outline-none"
                            placeholder="Masukkan nama lengkap anda" required>
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-600">No. HP</label>
                        <input type="text" name="phone_num"
                            class="w-full px-4 py-2 mt-1 border rounded-lg border-teal-500 focus:ring focus:ring-teal-300 transition duration-300 ease-in-out focus:outline-none"
                            placeholder="Masukkan nomor HP anda" required>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-600">Tanggal Lahir</label>
                        <div class="relative">
                            <!-- Input Date (Default) -->
                            <input type="date" id="dob_date" name="dob"
                                class="w-full px-4 py-2 border rounded-lg border-teal-500 focus:ring focus:ring-teal-300 transition duration-300 ease-in-out focus:outline-none"
                                min="1920-01-01" max="" required>

                            <!-- Input Manual (Hidden by Default) -->
                            <input type="text" id="dob_manual" name="dob_manual"
                                class="w-full px-4 py-2 mt-2 border rounded-lg border-teal-500 focus:ring focus:ring-teal-300 transition duration-300 ease-in-out focus:outline-none hidden"
                                placeholder="dd-mm-yyyy">

                            <!-- Tombol Switch -->
                            <button type="button" id="toggleDobInput"
                                class="mt-2 text-teal-500 hover:underline text-sm">
                                Input Manual
                            </button>

                            <p id="dob_error" class="text-red-500 text-sm mt-1 hidden"></p>
                        </div>
                    </div>

                    <div class="mt-4">
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

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-600">Konfirmasi Kata Sandi</label>
                        <div class="relative">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="w-full px-4 py-2 border rounded-lg border-teal-500 focus:ring focus:ring-teal-300"
                                placeholder="Masukkan kata sandi" required>
                            <button type="button" id="togglePasswordConfirm"
                                class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full px-4 py-2 mt-6 font-semibold text-white bg-teal-500 rounded-lg hover:bg-teal-600 transition duration-300 ease-in-out shadow-lg transform hover:scale-105">
                        Daftar Sekarang
                    </button>
                </form>
                <p class="mt-4 text-sm text-center text-gray-600">Sudah punya akun?
                    <a href="/login" class="text-teal-500 hover:underline">Masuk disini.</a>
                </p>
            </div>
        </div>
    </div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let dateInput = document.getElementById("dob_date");
        let manualInput = document.getElementById("dob_manual");
        let toggleButton = document.getElementById("toggleDobInput");
        let errorText = document.getElementById("dob_error");

        // Set batas umur min (15 tahun ke belakang dari sekarang)
        let today = new Date();
        let minYear = today.getFullYear() - 15;
        dateInput.max = `${minYear}-12-31`;

        // Toggle input manual vs kalender
        toggleButton.addEventListener("click", function () {
            if (dateInput.classList.contains("hidden")) {
                // Balik ke kalender
                dateInput.classList.remove("hidden");
                manualInput.classList.add("hidden");
                manualInput.removeAttribute("required");
                dateInput.setAttribute("required", "true");
                this.textContent = "Input Manual";
            } else {
                // Pindah ke input manual
                dateInput.classList.add("hidden");
                manualInput.classList.remove("hidden");
                dateInput.removeAttribute("required");
                manualInput.setAttribute("required", "true");
                this.textContent = "Gunakan Kalender";
            }

            errorText.classList.add("hidden"); // Reset error
        });

        // Validasi saat user input manual (dd-mm-yyyy)
        manualInput.addEventListener("input", function () {
            let value = this.value.replace(/\D/g, ""); // Hanya angka

            if (value.length >= 2) value = value.slice(0, 2) + "-" + value.slice(2);
            if (value.length >= 5) value = value.slice(0, 5) + "-" + value.slice(5, 9);
            this.value = value;

            validateManualDate(value);
        });

        function validateManualDate(value) {
            let parts = value.split("-");
            if (parts.length !== 3) return;

            let day = parseInt(parts[0], 10);
            let month = parseInt(parts[1], 10);
            let year = parseInt(parts[2], 10);

            if (day > 31 || day < 1) {
                showError("Tanggal tidak valid (1-31)");
            } else if (month > 12 || month < 1) {
                showError("Bulan tidak valid (1-12)");
            } else if (year > minYear || year < 1920) {
                showError(`Tahun harus antara 1920 - ${minYear}`);
            } else {
                hideError();
            }
        }

        function showError(message) {
            errorText.textContent = message;
            errorText.classList.remove("hidden");
        }

        function hideError() {
            errorText.classList.add("hidden");
        }

        // Toggle password visibility
        function togglePassword(inputId, toggleId) {
            const input = document.getElementById(inputId);
            const toggle = document.getElementById(toggleId);
            toggle.addEventListener("click", function () {
                if (input.type === "password") {
                    input.type = "text";
                    toggle.innerHTML = '<i class="fa fa-eye-slash"></i>';
                } else {
                    input.type = "password";
                    toggle.innerHTML = '<i class="fa fa-eye"></i>';
                }
            });
        }

        togglePassword("password", "togglePassword");
        togglePassword("password_confirmation", "togglePasswordConfirm");
    });
</script>

</html>