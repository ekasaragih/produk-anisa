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
@include('utils.layout.topnav', ['title' => 'Sertifikat'])
<div class="container mx-auto pb-8 px-4 min-h-screen">
    <div class="page p-8 bg-white rounded-2xl shadow-lg border border-gray-200 animate-fade-in">
        <h2
            class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-l from-blue-600 to-teal-500 mb-6">
            Sertifikat Saya
        </h2>
        <div class="grid place-items-center">
            <div class="bg-white shadow-lg rounded-lg border-4 border-[#4b7795] w-full max-w-5xl p-4 
            text-center items-center justify-center h-[280px] md:h-auto overflow-hidden"
                style="background: linear-gradient(to right, rgba(32, 101, 239, 0.3), rgba(32, 198, 88, 0.2));">

                <h1 class="text-xs md:text-4xl font-bold text-black mb-3 md:mb-6">SERTIFIKAT PENCAPAIAN</h1>

                <h2 class="text-[10px] md:text-lg font-semibold mb-2 md:mb-4">Dengan bangga diberikan kepada:</h2>

                <p class="text-sm md:text-3xl font-bold mb-1 md:mb-2 border-b border-white inline-block">KUPA COCHANK
                </p>

                <div class="mt-1 md:mt-4 text-gray-700 text-[8px] md:text-base">
                    <p>Sebagai penghargaan atas komitmen dan kedisiplinan menjalani pengobatan anemia selama <strong>90
                            hari</strong>.</p>
                    <p>Terima kasih telah menjadi inspirasi dalam menjaga kesehatan.</p>
                    <p class="mt-1 md:mt-2">Teruslah melangkah menuju hidup yang lebih sehat!</p>
                </div>

                <p class="text-[10px] md:text-lg mt-3 md:mt-6">31 Desember 2025</p>

                <div class="mt-3 md:mt-6 flex flex-col items-center">
                    <p class="text-[10px] md:text-lg">(Pemberi Sertifikat)</p>
                </div>

                <div class="flex justify-center mt-2 md:mt-6 space-x-2 md:space-x-4">
                    <img src="" class="w-8 h-8 md:w-12 md:h-12" alt="Logo 1" />
                    <img src="" class="w-8 h-8 md:w-12 md:h-12" alt="Logo 2" />
                </div>


            </div>
            <!-- Buttons -->
            <div class="mt-3 md:mt-6 flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:space-x-4">
                <button onclick="downloadPDF()"
                    class="text-xs md:text-base bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 md:px-5 md:py-2 rounded-md">
                    Download PDF
                </button>
                <button onclick="shareCertificate()"
                    class="text-xs md:text-base bg-teal-500 hover:bg-teal-600 text-white px-3 py-1 md:px-5 md:py-2 rounded-md">
                    Share ke Media Sosial
                </button>
            </div>
        </div>
    </div>

    @include('utils.layout.footer')
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // TO-DO: function download to pdf nya belum
        function downloadPDF() {
            const { jsPDF } = window.jspdf; 
            const doc = new jsPDF();

            doc.text("SERTIFIKAT PENCAPAIAN", 20, 20);
            doc.text("Diberikan kepada: KUPA COCHANK", 20, 40);
            doc.text("Sebagai penghargaan atas kedisiplinan menjalani pengobatan anemia selama 90 hari.", 20, 60);
            doc.save("sertifikat.pdf");
        }

        function shareToSocial() {
            if (navigator.share) {
                navigator.share({
                    title: "Sertifikat Pencapaian",
                    text: "Saya telah berhasil menyelesaikan pengobatan anemia selama 90 hari! 🎉",
                    url: window.location.href,
                }).catch(error => console.log("Error sharing:", error));
            } else {
                alert("Browser tidak mendukung fitur berbagi.");
            }
        }

        window.downloadPDF = downloadPDF;
        window.shareCertificate = shareToSocial;
    });
</script>
@endsection