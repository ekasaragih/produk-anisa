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
<div class="container mx-auto pb-8 px-4 min-h-screen">
    <div class="page p-8 bg-white rounded-2xl shadow-lg border border-gray-200 animate-fade-in">
        <h2
            class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-l from-blue-600 to-teal-500 mb-6">
            Apakah anda mengalami efek samping? Hubungi tenaga medis terdekat</h2>

        <div id="accordion-collapse" data-accordion="collapse">
            <!-- #1 -->
            <h2 id="accordion-collapse-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-black border border-b-0 border-gray-200 rounded-t focus:ring-4 focus:ring-gray-200 bg-white dark:bg-white dark:hover:bg-white gap-3"
                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                    aria-controls="accordion-collapse-body-1">
                    <span>Puskesmas Pematang Kandis</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 white:bg-gray-900">
                    <p class="mb-2 text-black">No HP 1232131</p>
                    <p class="mb-2 text-black">Email kupa@gmail.com</p>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20067.044012762864!2d102.2565986326615!3d-2.0563757353599073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2e6d9e4ec3b4c5%3A0x253cdf770db89c10!2sPuskesmas%20Pematang%20Kandis!5e0!3m2!1sid!2sid!4v1739288457565!5m2!1sid!2sid"
                        width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- 2 -->
            <h2 id="accordion-collapse-heading-2">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-black border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 bg-white dark:bg-white dark:text-black dark:hover:bg-white gap-3"
                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                    aria-controls="accordion-collapse-body-2">
                    <span>Puskesmas Bangko</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-black">No HP 1232131</p>
                    <p class="mb-2 text-black">Email kupa@gmail.com</p>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.17782939533!2d102.26074437460431!3d-2.084622237019021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2e6d5bb55f7a75%3A0x809a51c2af7e1a9f!2sPuskesmas%20Bangko!5e0!3m2!1sid!2sid!4v1739288596178!5m2!1sid!2sid"
                        width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- 3 -->
            <h2 id="accordion-collapse-heading-3">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-black border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 bg-white dark:bg-white dark:text-black dark:hover:bg-white gap-3"
                    data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                    aria-controls="accordion-collapse-body-3">
                    <span>PMB W</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-black">No HP 1232131</p>
                    <p class="mb-2 text-black">Email kupa@gmail.com</p>
                </div>
            </div>

            <!-- 4 -->
            <h2 id="accordion-collapse-heading-4">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-black border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 bg-white dark:bg-white dark:text-black dark:hover:bg-white gap-3"
                    data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                    aria-controls="accordion-collapse-body-4">
                    <span>Polindes Rizky</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-black">No HP 1232131</p>
                    <p class="mb-2 text-black">Email kupa@gmail.com</p>
                </div>
            </div>

            <!-- 5 -->
            <h2 id="accordion-collapse-heading-5">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-black border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 bg-white dark:bg-white dark:text-black dark:hover:bg-white gap-3"
                    data-accordion-target="#accordion-collapse-body-5" aria-expanded="false"
                    aria-controls="accordion-collapse-body-5">
                    <span>Bidan Nahdiah</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-5" class="hidden" aria-labelledby="accordion-collapse-heading-5">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-black">No HP 1232131</p>
                    <p class="mb-2 text-black">Email kupa@gmail.com</p>
                </div>
            </div>

            <!-- 6 -->
            <h2 id="accordion-collapse-heading-6">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-black border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 bg-white dark:bg-white dark:text-black dark:hover:bg-white gap-3"
                    data-accordion-target="#accordion-collapse-body-6" aria-expanded="false"
                    aria-controls="accordion-collapse-body-6">
                    <span>PMB Erazora</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-6" class="hidden" aria-labelledby="accordion-collapse-heading-6">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-black">No HP 1232131</p>
                    <p class="mb-2 text-black">Email kupa@gmail.com</p>
                </div>
            </div>

            <!-- 7 -->
            <h2 id="accordion-collapse-heading-7">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-black border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 bg-white dark:bg-white dark:text-black dark:hover:bg-white gap-3"
                    data-accordion-target="#accordion-collapse-body-7" aria-expanded="false"
                    aria-controls="accordion-collapse-body-7">
                    <span>Pustu Sungai Kapas</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-7" class="hidden" aria-labelledby="accordion-collapse-heading-7">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-black">No HP 1232131</p>
                    <p class="mb-2 text-black">Email kupa@gmail.com</p>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.005164027105!2d102.31124617460485!3d-2.151708937183608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2e13b844282c71%3A0x8f38174f780400bd!2sPuskesmas%20Pembantu%20Sungai%20Kapas.!5e0!3m2!1sid!2sid!4v1739288670063!5m2!1sid!2sid"
                        width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- 8 -->
            <h2 id="accordion-collapse-heading-8">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-black border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 bg-white dark:bg-white dark:text-black dark:hover:bg-white gap-3"
                    data-accordion-target="#accordion-collapse-body-8" aria-expanded="false"
                    aria-controls="accordion-collapse-body-8">
                    <span>Bidan Retno Triyuliana</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-8" class="hidden" aria-labelledby="accordion-collapse-heading-8">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-black">No HP 1232131</p>
                    <p class="mb-2 text-black">Email kupa@gmail.com</p>
                </div>
            </div>

            <!-- 9 -->
            <h2 id="accordion-collapse-heading-9">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-black border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 bg-white dark:bg-white dark:text-black dark:hover:bg-white gap-3"
                    data-accordion-target="#accordion-collapse-body-9" aria-expanded="false"
                    aria-controls="accordion-collapse-body-9">
                    <span>PMB Annisa</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-9" class="hidden" aria-labelledby="accordion-collapse-heading-9">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-black">No HP 1232131</p>
                    <p class="mb-2 text-black">Email kupa@gmail.com</p>
                </div>
            </div>

        </div>

    </div>

    @include('utils.layout.footer')
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
@endsection