@extends('utils.layout.sidebar')

@section('head')
<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 1s ease-out;
    }
</style>
@endsection

@section('content')
@include('utils.layout.topnav', ['title' => 'Kelola Alarm'])
<div class="container mx-auto pb-8 px-4 min-h-screen">
    <div class="page p-8 bg-white rounded-2xl shadow-lg border border-gray-200 animate-fade-in">
        <h2
            class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-l from-blue-600 to-teal-500 mb-6">
            Alarm</h2>
        <p class="text-gray-600 mb-4">Atur pengingat obat Anda dengan mudah.</p>

        <!-- Tombol Tambah Alarm -->
        <button id="add-alarm-btn" class="bg-teal-500 text-white px-4 py-2 rounded-md">+ Tambah Alarm</button>

        <!-- Form Tambah Alarm (Hidden by Default) -->
        <div id="alarm-form" class="mt-4 hidden bg-gray-100 p-4 rounded-md">
            <h3 class="text-lg font-semibold text-gray-700">Tambah Alarm</h3>
            <form id="new-alarm-form">
                @csrf
                <label class="block mt-2 text-gray-700">Tanggal:</label>
                <input type="date" name="tanggal" class="w-full p-2 border rounded-md">

                <label class="block mt-2 text-gray-700">Nama Alarm:</label>
                <input type="text" name="nama_alarm" class="w-full p-2 border rounded-md">

                <label class="block mt-2 text-gray-700">Jam:</label>
                <input type="time" name="jam" class="w-full p-2 border rounded-md" required>

                <label class="block mt-2 text-gray-700">Hari:</label>
                <select name="hari" class="w-full p-2 border rounded-md">
                    <option value="">Pilih Hari (Opsional)</option>
                    <option>Setiap Hari</option>
                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>
                    <option>Sabtu</option>
                    <option>Minggu</option>
                </select>

                <label class="block mt-2 text-gray-700">Deskripsi:</label>
                <input type="text" name="deskripsi" class="w-full p-2 border rounded-md"
                    placeholder="Contoh: Minum tablet Fe">

                <label class="block mt-2 text-gray-700">Snooze (menit):</label>
                <input type="number" name="snooze" class="w-full p-2 border rounded-md" min="1" value="5">

                <label class="block mt-2 text-gray-700">Max Snooze:</label>
                <input type="number" name="max_snooze" class="w-full p-2 border rounded-md" min="1" value="3">

                <input type="hidden" name="aktif" value="yes">

                <button type="submit" class="mt-3 bg-blue-500 text-white px-4 py-2 rounded-md">Simpan Alarm</button>
            </form>
        </div>

        <!-- Daftar Alarm -->
        <div class="mt-4">
            <h3 class="text-lg font-semibold text-gray-700">Daftar Alarm</h3>
            <ul id="alarm-list" class="mt-2 space-y-2">
                <li class="p-3 bg-gray-100 rounded-md flex justify-between items-center">
                    <span class="text-gray-700">Minum Tablet Fe - 08:00 AM</span>
                    <div>
                        <button class="bg-yellow-500 text-white px-3 py-1 rounded-md">Edit</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded-md">Hapus</button>
                        <button class="bg-teal-500 text-white px-3 py-1 rounded-md">Aktifkan</button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

@include('utils.layout.footer')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<script>
    document.getElementById('add-alarm-btn').addEventListener('click', function() {
        document.getElementById('alarm-form').classList.toggle('hidden');
    });
</script>

<script>
    $(document).ready(function() {
        $('#new-alarm-form').on('submit', function(event) {
            event.preventDefault();

            let formData = $(this).serialize();

            $.ajax({
                url: '/alarms',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: 'Error!',
                        text: xhr.responseText || 'Something went wrong!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>
@endsection