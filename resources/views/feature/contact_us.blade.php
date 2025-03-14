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

            <div class="space-y-4 mt-8">
                @php
                    $facilities = [
                        [
                            'name' => 'Puskesmas Pematang Kandis',
                            'phone' => '0812-7474-327',
                            'email' => 'chintilandut@gmail.com',
                            'map' =>
                                'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249.20310399676953!2d102.2742040762907!3d-2.0560675531801937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2e6d9e4ec3b4c5%3A0x253cdf770db89c10!2sPuskesmas%20Pematang%20Kandis!5e0!3m2!1sid!2sid!4v1740146036228!5m2!1sid!2sid',
                        ],
                        [
                            'name' => 'Puskesmas Bangko',
                            'phone' => '0822-7846-9531',
                            'email' => 'puskesmasbangkorj@gmail.com',
                            'map' =>
                                'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1993.5889080090706!2d102.26177802210104!3d-2.0846275181254343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2e6d5bb55f7a75%3A0x809a51c2af7e1a9f!2sPuskesmas%20Bangko!5e0!3m2!1sid!2sid!4v1740146112127!5m2!1sid!2sid',
                        ],
                        [
                            'name' => 'Puskesmas Muara Jernih',
                            'phone' => '0822-6825-7423',
                            'email' => 'lismawati.benny22@gmail.com',
                            'map' =>
                                'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510397.9636910005!2d101.62419692667194!3d-1.9599905471602912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2e71c29710f28b%3A0x60588f2487500969!2sPUSKESMAS%20MUARA%20JERNIH!5e0!3m2!1sid!2sid!4v1740146245444!5m2!1sid!2sid',
                        ],
                        [
                            'name' => 'Puskesmas Muara Delang',
                            'phone' => '0853-6695-2158',
                            'email' => 'puskesmas.muaradelang@gmail.com',
                            'map' =>
                                'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d36979.58521631557!2d102.33488530753782!3d-1.9872182934455274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2e692be976751d%3A0x18ce97fcc2606dec!2sPuskesmas%20Muara%20Delang!5e0!3m2!1sid!2sid!4v1740146469540!5m2!1sid!2sid',
                        ],
                    ];
                @endphp

                @foreach ($facilities as $facility)
                    <div x-data="{ open: false }" class="border border-gray-300 rounded-lg overflow-hidden shadow-md">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full px-6 py-4 bg-gradient-to-r from-blue-500 to-teal-200 text-white font-semibold text-lg focus:outline-none">
                            <span class="text-left">{{ $facility['name'] }}</span>
                            <svg class="w-5 h-5 transition-transform duration-300" :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <div x-show="open" x-collapse class="p-5 bg-white">
                            <p class="flex items-center text-gray-600 mb-2">
                                <i class="fas fa-phone-alt text-blue-500 mr-2"></i> {{ $facility['phone'] }}
                            </p>
                            <p class="flex items-center text-gray-600 mb-2">
                                <i class="fas fa-envelope text-green-500 mr-2"></i> {{ $facility['email'] }}
                            </p>

                            @if ($facility['map'])
                                <div class="mt-3">
                                    <iframe src="{{ $facility['map'] }}" class="w-full h-56 rounded-md shadow-sm"
                                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @include('utils.layout.footer')
    </div>
@endsection
