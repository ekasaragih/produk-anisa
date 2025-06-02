@extends('utils.layout.sidebar')

@section('head')
<style>
    /* Custom keyframes for fade-in animation - these cannot be directly replaced by Tailwind */
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

    /* All other custom CSS classes have been replaced with Tailwind utilities */
</style>
@endsection

@section('content')
@include('utils.layout.topnav', ['title' => 'Data Seluruh Pengguna & Riwayat Medis'])

<div class="container mx-auto pb-12 px-4 min-h-screen" x-data="paginationComponent({ items: {{ $users->toJson() }} })">
    <div class="p-6 bg-white rounded-2xl shadow-md border border-gray-200 animate-fade-in">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Data Seluruh Pengguna & Riwayat Medis</h2>

        <div class="mb-6 flex justify-end">
            <input type="text" placeholder="Cari nama atau nomor HP..." x-model="search"
                class="w-64 border border-gray-300 rounded px-3 py-1.5 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm" />
        </div>

        <template x-for="(user, index) in paginatedData" :key="user.id">
            <div x-data="{ open: false }" class="mb-4">
                {{-- User Card (Accordion Header) --}}
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-md mb-4 cursor-pointer transition-all duration-200 hover:border-blue-300 hover:shadow-lg flex items-center justify-between"
                    @click="open = !open">
                    <div>
                        <h3 class="text-xl font-bold text-blue-700 mb-1 flex items-center">
                            <i class="fas fa-user-circle mr-2 text-blue-500"></i>
                            <span x-text="user.full_name ?? user.username ?? 'Nama Pengguna Tidak Tersedia'"></span>
                        </h3>
                        {{-- Display latest medication summary --}}
                        <p class="text-gray-600 text-sm mt-1">
                            <i class="fas fa-history mr-1 text-gray-500"></i> Terakhir Konsumsi:
                            <template x-if="user.latest_med_history">
                                <span>
                                    <span x-text="formatDate(user.latest_med_history.date)"></span> -
                                    <span x-text="formatTime(user.latest_med_history.time)"></span> :
                                    <span x-text="user.latest_med_history.medicine_name"></span>
                                    (<span x-text="user.latest_med_history.tablet_amount + ' tablet'"></span>)
                                </span>
                            </template>
                            <template x-if="!user.latest_med_history">
                                <span class="text-gray-600 italic text-center py-4">Belum ada riwayat konsumsi
                                    obat.</span>
                            </template>
                        </p>
                    </div>
                    {{-- Chevron icon to indicate expand/collapse --}}
                    <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-300"
                        :class="{ 'rotate-180': open }"></i>
                </div>

                {{-- Accordion Content --}}
                <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-screen"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 max-h-screen" x-transition:leave-end="opacity-0 max-h-0"
                    class="bg-gray-50 border border-gray-200 border-t-0 rounded-b-xl p-6 shadow-sm mb-8">
                    {{-- User Profile Details --}}
                    <h4 class="text-lg font-semibold text-blue-600 mb-3 flex items-center">
                        <i class="fas fa-info-circle mr-2 text-blue-500"></i> Detail Profil
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                        <div class="text-gray-700"><strong>Umur:</strong> <span x-text="age(user.dob)"></span></div>
                        <div class="text-gray-700"><strong>Pendidikan:</strong> <span
                                x-text="user.profile?.pendidikan ?? '-'"></span></div>
                        <div class="text-gray-700"><strong>Pekerjaan:</strong> <span
                                x-text="user.profile?.pekerjaan ?? '-'"></span></div>
                        <div class="text-gray-700"><strong>No. HP:</strong> <span x-text="user.phone_num ?? '-'"></span>
                        </div>
                        <div class="text-gray-700"><strong>Alamat:</strong> <span
                                x-text="user.profile?.alamat ?? '-'"></span></div>
                        <div class="text-gray-700"><strong>Riwayat Kehamilan:</strong> Hamil ke-<span
                                x-text="user.profile?.hamil_ke ?? '-'"></span></div>
                        <div class="text-gray-700"><strong>Usia Kehamilan:</strong>
                            <span x-text="user.profile?.hpht ? diffWeeks(user.profile.hpht) : '-'"></span>
                        </div>
                        <div class="text-gray-700"><strong>BB Sebelum Hamil:</strong> <span
                                x-text="user.profile?.bb_sebelum_hamil ? user.profile.bb_sebelum_hamil + ' kg' : '-'"></span>
                        </div>
                        <div class="text-gray-700"><strong>BB Sekarang:</strong> <span
                                x-text="user.profile?.bb_sekarang ? user.profile.bb_sekarang + ' kg' : '-'"></span>
                        </div>

                        {{-- Display Latest HB Record (from HbRecord model) --}}
                        <div class="text-gray-700">
                            <strong>Kadar Hb Terakhir:</strong>
                            <template x-if="user.latest_hb_record">
                                <span>
                                    <span x-text="user.latest_hb_record.kadar_hb + ' gr%'"></span>
                                    (<span x-text="formatDate(user.latest_hb_record.tanggal_cek)"></span>)
                                    <span :class="user.latest_hb_status_class">
                                        (<span x-text="user.latest_hb_status_text"></span>)
                                    </span>
                                </span>
                            </template>
                            <template x-if="!user.latest_hb_record">
                                <span>-</span>
                            </template>
                        </div>
                        <div class="text-gray-700 col-span-full"><strong>Masalah Kehamilan Sebelumnya:</strong> <span
                                x-text="user.profile?.masalah_kehamilan ?? '-'"></span></div>
                        <div class="text-gray-700 col-span-full"><strong>Dosis Obat Fe (jika ada):</strong> <span
                                x-text="user.profile?.dosis_obat_fe ?? '-'"></span></div>
                    </div>

                    <hr class="my-4 border-gray-300">

                    {{-- Full Medical History --}}
                    <h4 class="text-lg font-bold text-teal-700 mb-3 flex items-center">
                        <i class="fas fa-pills mr-2 text-teal-500"></i> Riwayat Konsumsi Obat Lengkap
                    </h4>
                    <template x-if="user.med_histories && user.med_histories.length > 0">
                        <div class="overflow-x-auto">
                            <div x-data="medHistoryComponent(user.med_histories)">
                                {{-- Tailwind-styled table --}}
                                <table class="w-full border-collapse mt-4 text-sm">
                                    <thead
                                        class="bg-gradient-to-r from-teal-500 to-blue-500 text-white sticky top-0 z-10">
                                        <tr>
                                            <th class="p-3 border">
                                                Tanggal</th>
                                            <th class="p-3 border">
                                                Waktu</th>
                                            <th class="p-3 border">
                                                Nama Obat</th>
                                            <th class="p-3 border">
                                                Jumlah Tablet</th>
                                            <th class="p-3 border">
                                                Sisa Tablet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="history in paginatedData" :key="history.id">
                                            <tr
                                                class="odd:bg-white even:bg-gray-50 hover:bg-blue-50 transition-colors duration-200">
                                                <td class="border border-gray-200 px-4 py-3"
                                                    x-text="formatDate(history.date)"></td>
                                                <td class="border border-gray-200 px-4 py-3"
                                                    x-text="formatTime(history.time)"></td>
                                                <td class="border border-gray-200 px-4 py-3"
                                                    x-text="history.medicine_name"></td>
                                                <td class="border border-gray-200 px-4 py-3"
                                                    x-text="history.tablet_amount"></td>
                                                <td class="border border-gray-200 px-4 py-3"
                                                    x-text="history.remaining_tablets"></td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>

                                <div class="flex justify-center gap-2 mt-6">
                                    <button @click="prevPage" :disabled="page === 1"
                                        class="px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-600 font-medium transition-all duration-200 hover:bg-gray-200 hover:border-gray-400 disabled:opacity-60 disabled:cursor-not-allowed">Sebelumnya</button>
                                    <template x-for="p in totalPages" :key="p">
                                        <button @click="goToPage(p)"
                                            :class="{'bg-blue-500 border-blue-500 text-white font-bold': p === page, 'bg-gray-50 border-gray-300 text-gray-600 hover:bg-gray-200 hover:border-gray-400': p !== page}"
                                            class="px-4 py-2 border rounded-md font-medium transition-all duration-200"
                                            x-text="p"></button>
                                    </template>
                                    <button @click="nextPage" :disabled="page === totalPages"
                                        class="px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-600 font-medium transition-all duration-200 hover:bg-gray-200 hover:border-gray-400 disabled:opacity-60 disabled:cursor-not-allowed">Berikutnya</button>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template x-if="!user.med_histories || user.med_histories.length === 0">
                        <p class="text-gray-600 italic text-center py-4">Belum ada riwayat konsumsi obat yang tercatat
                            untuk pengguna ini.</p>
                    </template>
                </div>
            </div>
        </template>

        <div x-show="paginatedData.length === 0 && filtered.length === 0" class="text-gray-500 text-center mt-6">
            Tidak ada pengguna yang ditemukan.
        </div>
        <div x-show="paginatedData.length === 0 && filtered.length > 0" class="text-gray-500 text-center mt-6">
            Tidak ada data pada halaman ini. Coba halaman lain.
        </div>


        <div class="mt-6 flex justify-center space-x-2">
            <button @click="prevPage" :disabled="page === 1"
                class="px-3 py-1 border rounded bg-gray-100 hover:bg-gray-200 disabled:opacity-50">Prev</button>
            <template x-for="p in totalPages" :key="p">
                <button @click="page = p" x-text="p"
                    :class="{'bg-blue-500 text-white': page === p, 'bg-gray-100 hover:bg-gray-200': page !== p}"
                    class="px-3 py-1 border rounded"></button>
            </template>
            <button @click="nextPage" :disabled="page === totalPages"
                class="px-3 py-1 border rounded bg-gray-100 hover:bg-gray-200 disabled:opacity-50">Next</button>
        </div>
    </div>

    @include('utils.layout.footer')
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<script>
    function medHistoryComponent(data) {
    return {
        rawData: data,
        page: 1,
        perPage: 5,
        get totalPages() {
            return Math.ceil(this.rawData.length / this.perPage);
        },
        get paginatedData() {
            const start = (this.page - 1) * this.perPage;
            return this.rawData.slice(start, start + this.perPage);
        },
        nextPage() {
            if (this.page < this.totalPages) this.page++;
        },
        prevPage() {
            if (this.page > 1) this.page--;
        },
        goToPage(p) {
            this.page = p;
        },
        formatDate(dateStr) {
            const date = moment(dateStr);
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            return `${date.date()} ${months[date.month()]} ${date.year()}`;
        },
        formatTime(timeStr) {
            return moment(timeStr, 'HH:mm:ss').format('HH:mm');
        }
    }
}
</script>

<script>
    function paginationComponent({ items }) {
        return {
            original: items,
            search: '',
            page: 1,
            perPage: 5, // Display 5 users per page
            get filtered() {
                if (!this.search) return this.original;
                const searchTerm = this.search.toLowerCase();
                return this.original.filter(user =>
                    (user.full_name && user.full_name.toLowerCase().includes(searchTerm)) ||
                    (user.username && user.username.toLowerCase().includes(searchTerm)) ||
                    (user.phone_num && user.phone_num.includes(searchTerm)) ||
                    (user.profile?.nama && user.profile.nama.toLowerCase().includes(searchTerm))
                );
            },
            get totalPages() {
                return Math.ceil(this.filtered.length / this.perPage) || 1;
            },
            get paginatedData() {
                // Reset page to 1 if filtering reduces total pages below current page
                if (this.page > this.totalPages) {
                    this.page = 1;
                }
                const start = (this.page - 1) * this.perPage;
                return this.filtered.slice(start, start + this.perPage);
            },
            nextPage() { if (this.page < this.totalPages) this.page++; },
            prevPage() { if (this.page > 1) this.page--; },
            age(dob) {
                if (!dob) return '-';
                return moment().diff(moment(dob), 'years') + ' tahun';
            },
            diffWeeks(hpht) {
                if (!hpht) return '-';
                const start = moment(hpht);
                const now = moment();
                return now.diff(start, 'weeks') + ' minggu';
            },
            formatDate(dateString) {
                if (!dateString) return '-';
                const date = moment(dateString);
                const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                return `${date.date()} ${months[date.month()]} ${date.year()}`;
            },
            formatTime(timeString) {
                if (!timeString) return '-';
                return moment(timeString, 'HH:mm:ss').format('HH:mm');
            }
        }
    }
</script>
@endsection