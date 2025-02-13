<!doctype html>
<html lang="en">

<head>
    <title>Produk Anisa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    @yield('head')
</head>

<body class="font-rubik bg-white">

    <!-- Desktop Sidebar -->
    <nav x-data="{ isOpen: false}" class=" hidden md:flex flex-col w-64 h-screen bg-blue-700 text-white fixed inset-y-0 left-3 top-3 shadow-lg
        rounded-r-lg border-r-4 rounded-l-lg border-teal-500 p-5">
        <h4 class="text-left text-lg font-bold">
            <a href="/" id="title">Produk Anisa</a>
        </h4>

        <hr class="my-3">



        @if(auth()->check())
        <h6 class="mt-4 uppercase text-xs font-semibold opacity-70">Pemantauan</h6>
        <a href="{{ route('dashboard') }}"
            class="flex items-center px-5 py-3 text-sm rounded-md hover:bg-blue-600 {{ Route::currentRouteName() == 'dashboard' ? 'bg-blue-600 font-bold' : '' }}">
            <i class="fa fa-tachometer-alt mr-3"></i> Dashboard
        </a>

        <a href="{{ route('riwayat_konsumsi') }}"
            class="flex items-center px-5 py-3 text-sm rounded-md hover:bg-blue-600 {{ Route::currentRouteName() == 'riwayat_konsumsi' ? 'bg-blue-600 font-bold' : '' }}">
            <i class="fa fa-history mr-3"></i> Riwayat Konsumsi
        </a>

        <a href="{{ route('edukasi') }}"
            class="flex items-center px-3 py-3 text-sm rounded-md hover:bg-blue-600 {{ Route::currentRouteName() == 'edukasi' ? 'bg-blue-600 font-bold' : '' }}">
            <i class="fa fa-venus mr-3"></i> Edukasi
        </a>

        <a href="{{ route('promotive') }}"
            class="flex items-center px-3 py-3 text-sm rounded-md hover:bg-blue-600 {{ Route::currentRouteName() == 'promotive' ? 'bg-blue-600 font-bold' : '' }}">
            <i class="fa fa-clipboard mr-3"></i> Promotif
        </a>

        <a href="{{ route('preventive') }}"
            class="flex items-center px-3 py-3 text-sm rounded-md hover:bg-blue-600 {{ Route::currentRouteName() == 'preventive' ? 'bg-blue-600 font-bold' : '' }}">
            <i class="fa fa-clipboard-check mr-3"></i> Preventif
        </a>

        <a href="{{ route('kadar_hb') }}"
            class="flex items-center px-3 py-3 text-sm rounded-md hover:bg-blue-600 {{ Route::currentRouteName() == 'kadar_hb' ? 'bg-blue-600 font-bold' : '' }}">
            <i class="fa fa-heartbeat mr-3"></i> Kadar Hb
        </a>

        <a href="{{ route('certificate') }}"
            class="flex items-center px-3 py-3 text-sm rounded-md hover:bg-blue-600 {{ Route::currentRouteName() == 'certificate' ? 'bg-blue-600 font-bold' : '' }}">
            <i class="fa fa-certificate mr-3"></i> Sertifikat
        </a>

        <a href="{{ route('contact_us') }}"
            class="flex items-center px-3 py-3 text-sm rounded-md hover:bg-blue-600 {{ Route::currentRouteName() == 'contact_us' ? 'bg-blue-600 font-bold' : '' }}">
            <i class="fa fa-phone-alt mr-3"></i> Hubungi Kami
        </a>

        <form method="post" action="{{ route('user.logout') }}" id="logout-form" class="mt-auto">
            @csrf
            <button type="submit"
                class="flex items-center px-3 py-3 w-full text-sm text-left rounded-md hover:bg-red-600">
                <i class="fa fa-user mr-3"></i> Keluar dari Akun
            </button>
        </form>
        @else
        <a href="{{ route('tingkat_pengetahuan_ibu_hamil') }}"
            class="flex items-center px-3 py-3 text-sm rounded-md hover:bg-blue-600 {{ Route::currentRouteName() == 'tingkat_pengetahuan_ibu_hamil' ? 'bg-blue-600 font-bold' : '' }}">
            <i class="fa fa-venus mr-3"></i> Edukasi
        </a>
        <a href="{{ route('promotive') }}"
            class="flex items-center px-3 py-3 text-sm rounded-md hover:bg-blue-600 {{ Route::currentRouteName() == 'promotive' ? 'bg-blue-600 font-bold' : '' }}">
            <i class="fa fa-clipboard mr-3"></i> Promotif
        </a>

        <div class="mt-auto">
            <a href="{{ route('user.login') }}"
                class="flex items-center px-3 py-3 w-full text-sm text-left rounded-md hover:bg-red-600">
                <i class="fa fa-user mr-3"></i> Masuk ke Akun Saya
            </a>
        </div>
        @endif
    </nav>

    <!-- Mobile Navbar -->
    <div class="flex md:hidden p-4 bg-blue-700 text-white shadow-md" x-data="{ isOpen: false }"
        :class="isOpen ? 'flex-col' : 'justify-between items-center'">
        <a href="/" x-show="!isOpen" class="text-xl font-semibold">Produk Anisa</a>

        <div class="mr-2 md:hidden">
            <button type="button" @click="isOpen = !isOpen"
                class="relative inline-flex items-center justify-center rounded-md bg-blue-700 p-2 text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-700"
                aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only">Open main menu</span>

                <div x-show="!isOpen" class="flex items-center gap-2">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <span>Lihat Menu</span>
                </div>

                <div x-show="isOpen" class="flex items-center gap-2">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>Tutup Menu</span>
                </div>
            </button>

            <div x-show="isOpen" x-transition @click.away="isOpen = false"
                class="top-12 left-0 w-full text-white rounded-b-lg">

                <a href="/" class="block py-2 px-4 text-xl font-semibold">Produk Anisa</a>

                <div class="space-y-1 px-3">
                    <h6 class="mt-4 uppercase text-xs font-semibold opacity-70">Pemantauan</h6>
                    <a href="{{ route('dashboard') }}"
                        class="block py-2 px-4 hover:bg-blue-600 {{ Route::currentRouteName() == 'dashboard' ? 'bg-blue-600 font-bold' : '' }}">
                        <i class="fa fa-tachometer-alt mr-3"></i> Dashboard
                    </a>
                    <a href="{{ route('riwayat_konsumsi') }}"
                        class="block py-2 px-4 hover:bg-blue-600 {{ Route::currentRouteName() == 'riwayat_konsumsi' ? 'bg-blue-600 font-bold' : '' }}"><i
                            class="fa fa-history mr-3"></i> Riwayat
                        Konsumsi</a>
                    <a href="{{ route('tingkat_pengetahuan_ibu_hamil') }}"
                        class="block py-2 px-2 hover:bg-blue-600 {{ Route::currentRouteName() == 'tingkat_pengetahuan_ibu_hamil' ? 'bg-blue-600 font-bold' : '' }}">
                        <i class="fa fa-venus mr-3"></i> Edukasi
                    </a>
                    <a href="{{ route('promotive') }}"
                        class="block mx-0 py-2 px-2 hover:bg-blue-600 {{ Route::currentRouteName() == 'promotive' ? 'bg-blue-600 font-bold' : '' }}">
                        <i class="fa fa-clipboard mr-3"></i> Promotif
                    </a>
                    <a href="{{ route('preventive') }}"
                        class="block py-2 px-2 hover:bg-blue-600 {{ Route::currentRouteName() == 'preventive' ? 'bg-blue-600 font-bold' : '' }}">
                        <i class="fa fa-clipboard-check mr-3"></i> Preventif
                    </a>
                    <a href="{{ route('kadar_hb') }}"
                        class="block py-2 px-2 hover:bg-blue-600 {{ Route::currentRouteName() == 'kadar_hb' ? 'bg-blue-600 font-bold' : '' }}">
                        <i class="fa fa-heartbeat mr-3"></i> Kadar Hb
                    </a>
                    <a href="{{ route('certificate') }}"
                        class="block py-2 px-2 hover:bg-blue-600 {{ Route::currentRouteName() == 'certificate' ? 'bg-blue-600 font-bold' : '' }}">
                        <i class="fa fa-certificate mr-3"></i> Sertifikat
                    </a>
                    <a href="{{ route('contact_us') }}"
                        class="block py-2 px-2 hover:bg-blue-600 {{ Route::currentRouteName() == 'contact_us' ? 'bg-blue-600 font-bold' : '' }}">
                        <i class="fa fa-phone-alt mr-3"></i> Hubungi Kami
                    </a>
                    <form method="post" action="" id="logout-form" class="mt-auto">
                        @csrf
                        <button type="submit"
                            class="flex items-center px-1 py-2 pt-3 w-full text-sm text-left rounded-md hover:bg-red-600">
                            <i class="fa fa-user mr-3"></i> Keluar dari Akun
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="md:ml-64 ml-0 p-4 min-h-screen transition-all" id="featureContent">
        @yield("content")
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>