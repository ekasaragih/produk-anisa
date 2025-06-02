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
@include('utils.layout.topnav', ['title' => 'Data Kuesioner Pengetahuan Ibu Hamil'])

<div class="container mx-auto pb-12 px-4 min-h-screen"
    x-data="paginationComponent({ items: {{ $kuesioners->toJson() }} })">
    <div class="page p-6 bg-white rounded-2xl shadow-md border border-gray-200 animate-fade-in">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Data Kuesioner Pengetahuan Ibu Hamil</h2>

        <!-- Search -->
        <div class="mb-4 flex justify-end">
            <input type="text" placeholder="Cari nama responden..." x-model="search"
                class="w-64 border border-gray-300 rounded px-3 py-1.5 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm" />
        </div>

        <!-- Cards -->
        <template x-for="(kuesioner, index) in paginatedData" :key="index">
            <div class="mb-8 border-b border-gray-300 pb-6">
                <h3 class="text-lg font-semibold mb-2 text-blue-800">
                    Responden: <span x-text="kuesioner.user.profile.nama ?? '-'"></span>
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 text-sm text-gray-700">
                    <div><strong>Umur:</strong> <span x-text="age(kuesioner.user.dob) + ' tahun'"></span></div>
                    <div><strong>Pendidikan:</strong> <span x-text="kuesioner.user.profile.pendidikan ?? '-'"></span>
                    </div>
                    <div><strong>Pekerjaan:</strong> <span x-text="kuesioner.user.profile.pekerjaan ?? '-'"></span>
                    </div>
                    <div><strong>No. HP:</strong> <span x-text="kuesioner.user.phone_num ?? '-'"></span></div>
                    <div><strong>Alamat:</strong> <span x-text="kuesioner.user.profile.alamat ?? '-'"></span></div>
                    <div><strong>Riwayat Kehamilan:</strong> Hamil ke-<span
                            x-text="kuesioner.user.profile.hamil_ke ?? '-'"></span></div>
                    <div><strong>Usia Kehamilan:</strong>
                        <span
                            x-text="kuesioner.user.profile.hpht ? diffWeeks(kuesioner.user.profile.hpht) + ' minggu' : '-'"></span>
                    </div>
                </div>

                <!-- Answers and Score -->
                <div class="mt-4 text-sm">
                    <div class="flex flex-wrap gap-2 mt-2">
                        <template x-for="(entry, i) in Object.entries(kuesioner.answers)" :key="i">
                            <span class="px-2 py-1 bg-gray-100 rounded text-xs">
                                Q<span x-text="i + 1"></span>: <span x-text="entry[1]"></span>
                            </span>
                        </template>
                    </div>
                    <div class="mt-3 font-semibold text-green-600">
                        Skor Total: <span x-text="kuesioner.score"></span> / 20</span>
                    </div>
                </div>
            </div>
        </template>

        <!-- No Data -->
        <div x-show="paginatedData.length === 0" class="text-gray-500 text-center mt-6">Data tidak ditemukan.</div>

        <!-- Pagination -->
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

<script>
    function paginationComponent({ items }) {
        return {
            original: items,
            search: '',
            page: 1,
            perPage: 10,
            get filtered() {
                if (!this.search) return this.original;
                return this.original.filter(i =>
                    i.user?.profile?.nama?.toLowerCase().includes(this.search.toLowerCase())
                );
            },
            get totalPages() {
                return Math.ceil(this.filtered.length / this.perPage) || 1;
            },
            get paginatedData() {
                const start = (this.page - 1) * this.perPage;
                return this.filtered.slice(start, start + this.perPage);
            },
            nextPage() { if (this.page < this.totalPages) this.page++; },
            prevPage() { if (this.page > 1) this.page--; },
            age(dob) {
                if (!dob) return '-';
                const birth = new Date(dob);
                const today = new Date();
                let age = today.getFullYear() - birth.getFullYear();
                const m = today.getMonth() - birth.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birth.getDate())) age--;
                return age;
            },
            diffWeeks(hpht) {
                if (!hpht) return '-';
                const start = new Date(hpht);
                const now = new Date();
                const diff = Math.floor((now - start) / (1000 * 60 * 60 * 24 * 7));
                return diff;
            }
        }
    }
</script>
@endsection