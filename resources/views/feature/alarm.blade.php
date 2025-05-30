@extends('utils.layout.sidebar')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                <label class="inline-flex items-center mt-2">
                    <input type="checkbox" id="is_90_days" name="is_90_days" value="1" class="class=" form-checkbox h-5
                        w-5 text-teal-600"">
                    <span class="ml-2 text-gray-700">Atur pengingat selama 90 hari</span>
                </label>

                <label class="block mt-2 text-gray-700">Tanggal:</label>
                <input type="date" name="tanggal" class="w-full p-2 border rounded-md">
                <input type="hidden" name="tanggal_hidden" id="tanggal-hidden">

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
                <input type="hidden" name="hari_hidden" id="hari-hidden">

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

        <div class="mt-4">
            <h3 class="text-md sm:text-lg font-semibold text-gray-700">Daftar Alarm</h3>
            <ul id="alarm-list" class="mt-2 space-y-2"></ul>
        </div>
    </div>

    @include('utils.layout.footer')
</div>

<!-- Modal Edit Alarm -->
<div id="edit-alarm-modal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center">
    <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-50 z-40"></div>
    <div class="relative p-4 w-full max-w-2xl bg-white rounded-lg shadow-lg z-50">
        <div class="flex items-center justify-between p-4 border-b rounded-t">
            <h3 class="text-xl font-semibold text-gray-900">Edit Alarm</h3>
            <button type="button" id="close-edit-alarm-modal"
                class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
                </svg>
                <span class="sr-only">Tutup</span>
            </button>
        </div>
        <div class="p-4 overflow-y-auto max-h-[70vh]">
            <form id="edit-alarm-form">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit-id">

                <label class="block mt-2 text-gray-700">Tanggal:</label>
                <input type="date" name="tanggal" id="edit-tanggal" class="w-full p-2 border rounded-md">

                <label class="block mt-2 text-gray-700">Nama Alarm:</label>
                <input type="text" name="nama_alarm" id="edit-nama" class="w-full p-2 border rounded-md">

                <label class="block mt-2 text-gray-700">Jam:</label>
                <input type="time" name="jam" id="edit-jam" class="w-full p-2 border rounded-md">

                <label class="block mt-2 text-gray-700">Hari:</label>
                <select name="hari" id="edit-hari" class="w-full p-2 border rounded-md">
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
                <input type="text" name="deskripsi" id="edit-deskripsi" class="w-full p-2 border rounded-md">

                <label class="block mt-2 text-gray-700">Snooze (menit):</label>
                <input type="number" name="snooze" id="edit-snooze" class="w-full p-2 border rounded-md" min="1">

                <label class="block mt-2 text-gray-700">Max Snooze:</label>
                <input type="number" name="max_snooze" id="edit-max-snooze" class="w-full p-2 border rounded-md"
                    min="1">

                <button type="submit" class="mt-3 bg-blue-500 text-white px-4 py-2 rounded-md">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>



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
    $(document).ready(function () {
        $('#is_90_days').on('change', function () {
            if ($(this).is(':checked')) {
                const today = new Date().toISOString().split('T')[0]; // format YYYY-MM-DD
                $('input[name="tanggal"]').val(today).prop('disabled', true);
                $('select[name="hari"]').val('Setiap Hari').prop('disabled', true);
                
                // Set nilai ke hidden input
                $('#tanggal-hidden').val(today);
                $('#hari-hidden').val('Setiap Hari');
            } else {
                $('#tanggal-input').val('').prop('disabled', false);
                $('#hari-select').val('').prop('disabled', false);

                $('#tanggal-hidden').val('');
                $('#hari-hidden').val('');
            }
        });
    });
</script>

{{-- Function post to db --}}
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
                    }).then(() => {
                        location.reload();
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

{{-- Function fetch, aktif/nonaktif alarm, dan delete --}}
<script>
    $(document).ready(function () {
        fetchAlarms();

        function fetchAlarms() {
            $.ajax({
                url: '/alarms',
                type: 'GET',
                success: function (alarms) {
                    let alarmList = $('#alarm-list');
                    alarmList.empty();

                    alarms.forEach(alarm => {
                        let alarmHtml = `
                        <li class="p-2 sm:p-3 bg-gray-100 rounded-md flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-2 sm:space-y-0">
                            <div class="flex flex-col">
                                <span class="text-sm sm:text-base text-gray-700 font-semibold">${alarm.nama_alarm} - ${alarm.jam}</span>
                                <span class="text-xs sm:text-sm text-gray-500 italic">${alarm.deskripsi ? alarm.deskripsi : 'Tidak ada deskripsi'}</span>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <button class="bg-yellow-500 text-white text-xs sm:text-sm px-2 sm:px-3 py-1 rounded-md" data-modal-target="edit-alarm-modal" data-modal-toggle="edit-alarm-modal" onclick="showEditAlarmModal(${alarm.id})">Ubah</button>
                                <button class="bg-red-500 text-white text-xs sm:text-sm px-2 sm:px-3 py-1 rounded-md" onclick="deleteAlarm(${alarm.id})">Hapus</button>
                                <button class="bg-teal-500 text-white text-xs sm:text-sm px-2 sm:px-3 py-1 rounded-md" onclick="toggleAlarm(${alarm.id})">
                                    ${alarm.aktif === 'yes' ? 'Nonaktifkan' : 'Aktifkan'}
                                </button>
                            </div>
                        </li>
                        `;
                        alarmList.append(alarmHtml);
                    });
                },
                error: function () {
                    Swal.fire('Error!', 'Gagal mengambil data alarm!', 'error');
                }
            });
        }

        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        window.deleteAlarm = function (id) {
            Swal.fire({
                title: 'Hapus Alarm?',
                text: "Apakah kamu yakin ingin menghapus alarm ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/alarms/${id}`,
                        type: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': csrfToken },
                        success: function (response) {
                            Swal.fire('Dihapus!', response.message, 'success');
                            fetchAlarms();
                        },
                        error: function () {
                            Swal.fire('Error!', 'Gagal menghapus alarm!', 'error');
                        }
                    });
                }
            });
        };

        window.toggleAlarm = function (id) {
            $.ajax({
                url: `/alarms/toggle/${id}`,
                type: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken },
                success: function (response) {
                    Swal.fire('Updated!', response.message, 'success');
                    fetchAlarms();
                },
                error: function () {
                    Swal.fire('Error!', 'Gagal mengubah status alarm!', 'error');
                }
            });
        };

        window.showEditAlarmModal = function (id) {
            $.ajax({
                url: `/alarms/${id}`,
                type: 'GET',
                success: function (alarm) {
                    $('#edit-id').val(alarm.id);
                    $('#edit-tanggal').val(alarm.tanggal);
                    $('#edit-nama').val(alarm.nama_alarm);
                    $('#edit-jam').val(alarm.jam);
                    $('#edit-hari').val(alarm.hari);
                    $('#edit-deskripsi').val(alarm.deskripsi);
                    $('#edit-snooze').val(alarm.snooze);
                    $('#edit-max-snooze').val(alarm.max_snooze);
                    
                    $('#edit-alarm-modal').removeClass('hidden');
                },
                error: function () {
                    Swal.fire('Error!', 'Gagal mengambil data alarm!', 'error');
                }
            });
        };


        $('#close-edit-alarm-modal').on('click', function () {
            $('#edit-alarm-modal').addClass('hidden');
        });

        $('#edit-alarm-form').on('submit', function (e) {
            e.preventDefault();
            var id = $('#edit-id').val();
            var formData = $(this).serialize();

            $.ajax({
                url: `/alarms/${id}`,
                type: 'PUT',
                data: formData,
                success: function (response) {
                    Swal.fire('Berhasil!', response.message, 'success');
                    $('#edit-alarm-modal').addClass('hidden');
                    fetchAlarms();
                },
                error: function () {
                    Swal.fire('Error!', 'Gagal mengupdate alarm!', 'error');
                }
            });
        });
    });
</script>

@endsection