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
@include('utils.layout.topnav', ['title' => 'Halaman Admin'])

<div class="container mx-auto pb-12 px-4 min-h-screen">
    <div class="page p-8 bg-white rounded-2xl shadow-lg border border-gray-200 animate-fade-in">
        <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-6">
            Halaman Admin
        </h2>

        <div class="space-y-4 mt-8">
            <div x-data="{ open: false }" class="border border-gray-300 rounded-lg overflow-hidden shadow-md">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full px-6 py-4 bg-gradient-to-r from-blue-500 to-teal-200 text-white font-semibold text-lg focus:outline-none">
                    <span class="text-left"></span>
                    <svg class="w-5 h-5 transition-transform duration-300" :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>

                <div x-show="open" x-collapse class="p-5 bg-white">
                    <p class="flex items-center text-gray-600 mb-2">
                        <i class="fas fa-phone-alt text-blue-500 mr-2"></i>
                    </p>
                    <p class="flex items-center text-gray-600 mb-2">
                        <i class="fas fa-envelope text-green-500 mr-2"></i>
                    </p>

                    <div class="mt-3">
                        <iframe src="#" class="w-full h-56 rounded-md shadow-sm" style="border:0;" allowfullscreen=""
                            loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('utils.layout.footer')
</div>
@endsection