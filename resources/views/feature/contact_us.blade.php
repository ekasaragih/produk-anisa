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
@include('utils.layout.topnav', ['title' => 'Hubungi Kami'])

<div class="container mx-auto pb-12 px-4 min-h-screen">
    <div class="page p-8 bg-white rounded-2xl shadow-lg border border-gray-200 animate-fade-in">
        <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-6">
            Apakah Anda Mengalami Efek Samping?
        </h2>
        <p class="text-center text-gray-600 mb-4">Hubungi tenaga medis terdekat untuk bantuan.</p>

        <div class="space-y-4">
            @php
            $facilities = [
            ['name' => 'Puskesmas Pematang Kandis', 'phone' => '0812-3456-7890', 'email' => 'pematangkandis@gmail.com',
            'map' =>
            'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20067.044012762864!2d102.2565986326615!3d-2.0563757353599073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2e6d9e4ec3b4c5%3A0x253cdf770db89c10!2sPuskesmas%20Pematang%20Kandis!5e0!3m2!1sid!2sid!4v1739288457565!5m2!1sid!2sid'],
            ['name' => 'Puskesmas Bangko', 'phone' => '0812-5678-9012', 'email' => 'bangko@gmail.com', 'map' =>
            'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.17782939533!2d102.26074437460431!3d-2.084622237019021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2e6d5bb55f7a75%3A0x809a51c2af7e1a9f!2sPuskesmas%20Bangko!5e0!3m2!1sid!2sid!4v1739288596178!5m2!1sid!2sid'],
            ['name' => 'PMB W', 'phone' => '0812-6789-0123', 'email' => 'pmbw@gmail.com', 'map' => ''],
            ['name' => 'Polindes Rizky', 'phone' => '0812-7890-1234', 'email' => 'rizky@gmail.com', 'map' => ''],
            ['name' => 'Bidan Nahdiah', 'phone' => '0812-8901-2345', 'email' => 'nahdiah@gmail.com', 'map' => ''],
            ['name' => 'PMB Erazora', 'phone' => '0812-9012-3456', 'email' => 'erazora@gmail.com', 'map' => ''],
            ['name' => 'Pustu Sungai Kapas', 'phone' => '0812-0123-4567', 'email' => 'sungaikapas@gmail.com', 'map' =>
            'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.005164027105!2d102.31124617460485!3d-2.151708937183608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2e13b844282c71%3A0x8f38174f780400bd!2sPuskesmas%20Pembantu%20Sungai%20Kapas.!5e0!3m2!1sid!2sid!4v1739288670063!5m2!1sid!2sid'],
            ['name' => 'Bidan Retno Triyuliana', 'phone' => '0812-1234-5678', 'email' => 'retno@gmail.com', 'map' =>
            ''],
            ['name' => 'PMB Annisa', 'phone' => '0812-2345-6789', 'email' => 'annisa@gmail.com', 'map' => ''],
            ];
            @endphp

            @foreach ($facilities as $facility)
            <div x-data="{ open: false }" class="border border-gray-300 rounded-lg overflow-hidden shadow-md">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full px-6 py-4 bg-gradient-to-r from-blue-500 to-teal-200 text-white font-semibold text-lg focus:outline-none">
                    <span>{{ $facility['name'] }}</span>
                    <svg class="w-5 h-5 transition-transform duration-300" :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <div x-show="open" x-collapse class="p-5 bg-white">
                    <p class="flex items-center text-gray-600 mb-2">
                        <i class="fas fa-phone-alt text-blue-500 mr-2"></i> {{ $facility['phone'] }}
                    </p>
                    <p class="flex items-center text-gray-600 mb-2">
                        <i class="fas fa-envelope text-green-500 mr-2"></i> {{ $facility['email'] }}
                    </p>

                    @if($facility['map'])
                    <div class="mt-3">
                        <iframe src="{{ $facility['map'] }}" class="w-full h-56 rounded-md shadow-sm" style="border:0;"
                            allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @include('utils.layout.footer')
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection