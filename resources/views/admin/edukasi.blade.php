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

<div class="container mx-auto pb-12 px-4 min-h-screen">
    <div class="page p-8 bg-white rounded-2xl shadow-lg border border-gray-200 animate-fade-in">
        <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-6">
            Data Kuesioner Pengetahuan Ibu Hamil
        </h2>

        @foreach($kuesioners as $kuesioner)
        <div class="mb-10 border-b border-gray-300 pb-6">
            <h3 class="text-xl font-bold mb-2 text-blue-800">Responden: {{ $kuesioner->user->profile->nama ?? '-' }}
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 text-sm text-gray-700">
                <div><strong>Umur:</strong> {{ \Carbon\Carbon::parse($kuesioner->user->dob)->age ?? '-' }} tahun</div>
                <div><strong>Pendidikan:</strong> {{ $kuesioner->user->profile->pendidikan ?? '-' }}</div>
                <div><strong>Pekerjaan:</strong> {{ $kuesioner->user->profile->pekerjaan ?? '-' }}</div>
                <div><strong>No. HP:</strong> {{ $kuesioner->user->phone_num ?? '-' }}</div>
                <div><strong>Alamat:</strong> {{ $kuesioner->user->profile->alamat ?? '-' }}</div>
                <div><strong>Riwayat Kehamilan:</strong> Hamil ke-{{ $kuesioner->user->profile->hamil_ke ?? '-' }}</div>
                <div><strong>Usia Kehamilan:</strong>
                    @if($kuesioner->user->profile->hpht)
                    {{ \Carbon\Carbon::parse($kuesioner->user->profile->hpht)->diffInWeeks(now()) }} minggu
                    @else
                    -
                    @endif
                </div>
            </div>

            <div class="mt-6 overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700 border mt-4">
                    <thead class="bg-blue-100 text-blue-900 font-semibold">
                        <tr>
                            @foreach($kuesioner->answers as $index => $answer)
                            <th class="px-4 py-2 border">Q{{ $loop->iteration }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($kuesioner->answers as $answer)
                            <td class="px-4 py-2 border">{{ $answer }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4 font-semibold text-green-600">
                    Skor Total: {{ $kuesioner->score }} / {{ count($kuesioner->answers) }}
                </div>
            </div>
        </div>
        @endforeach

        @if($kuesioners->isEmpty())
        <p class="text-gray-500">Belum ada data kuesioner yang tersedia.</p>
        @endif
    </div>

    @include('utils.layout.footer')
</div>
@endsection