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

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .social-icon {
            width: 24px;
            height: 24px;
        }

        input {
            width: auto;
            min-width: 100px;
            /* Optional: Set a minimum width */
            padding: 0;
            /* Optional: Adjust padding */
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

            <div
                class="certificate relative border-8 border-teal-400 rounded-xl p-12 shadow-[0_10px_30px_rgba(0,255,255,0.2)] bg-gradient-to-br from-cyan-100 to-emerald-200 text-gray-900 mx-auto">
                <!-- Ornamen Efek Cahaya -->
                <div class="absolute inset-0">
                    <div
                        class="absolute top-0 left-0 w-40 h-40 bg-cyan-300 opacity-20 rounded-full blur-2xl mix-blend-multiply">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-40 h-40 bg-teal-400 opacity-20 rounded-full blur-2xl mix-blend-multiply">
                    </div>
                </div>

                <!-- SVG Border Hiasan -->
                <svg class="absolute top-0 left-0 w-full h-full opacity-10" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 1440 320">
                    <path fill="#66FCF1" fill-opacity="0.2"
                        d="M0,224L60,213.3C120,203,240,181,360,181.3C480,181,600,203,720,229.3C840,256,960,288,1080,272C1200,256,1320,192,1380,160L1440,128V320H0Z">
                    </path>
                </svg>

                <div class="relative z-10 text-center">
                    <!-- Judul Sertifikat -->
                    <h1 class="text-4xl font-bold text-teal-600 drop-shadow-md tracking-wide">SERTIFIKAT PENCAPAIAN</h1>

                    <!-- Nomor Sertifikat -->
                    <p class="text-gray-700 text-sm mt-2">
                        Nomor
                        <input id="noInput" type="text" value="1234567"
                            class="bg-transparent border-b border-gray-500 text-center focus:outline-none" />
                        <i class="fas fa-pencil-alt text-gray-500 cursor-pointer"></i>
                    </p>

                    <!-- Penerima Sertifikat -->
                    <p class="mt-6 text-lg text-gray-700">Dengan bangga diberikan kepada:</p>
                    <p class="text-3xl font-bold text-teal-700">
                        <input id="nameInput" type="text" value="KUPA COCHANK"
                            class="bg-transparent text-center font-bold w-auto focus:outline-none" />
                        <i class="fas fa-pencil-alt text-gray-500 cursor-pointer"></i>
                    </p>

                    <hr class="my-4 border-gray-400 opacity-50" />

                    <!-- Deskripsi Penghargaan -->
                    <p class="text-sm text-gray-800">
                        Sebagai penghargaan atas komitmen dan kedisiplinan menjalani pengobatan anemia selama
                        <span class="font-bold text-teal-500">90 hari</span>.
                    </p>
                    <p class="text-sm mt-2 text-gray-800">Terima kasih telah menjadi inspirasi dalam menjaga kesehatan.<br>
                        Teruslah melangkah menuju hidup yang lebih sehat!</p>

                    <!-- Tanggal & Pemberi Sertifikat -->
                    <p class="mt-6 text-sm text-gray-600" id="currentDate">21 Februari 2025</p>
                    <p class="text-sm font-semibold text-teal-700">(Pemberi Sertifikat)</p>

                    <!-- Logo Institusi -->
                    <div class="flex justify-center mt-6 space-x-6">
                        <img src="" class="w-14 h-14 grayscale opacity-80" alt="Logo 1" />
                        <img src="" class="w-14 h-14 grayscale opacity-80" alt="Logo 2" />
                    </div>
                </div>
            </div>

            <div class="grid place-items-center">
                <div class="mt-3 md:mt-6 flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:space-x-4">
                    <button onclick="downloadPDF()"
                        class="text-xs md:text-base bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 md:px-5 md:py-2 rounded-md">
                        Download PDF
                    </button>


                    <button onclick="openModal()"
                        class="text-xs md:text-base bg-teal-500 hover:bg-teal-600 text-white px-3 py-1 md:px-5 md:py-2 rounded-md">
                        Share ke Media Sosial
                    </button>
                </div>
            </div>
        </div>

        @include('utils.layout.footer')
    </div>

    <!-- Modal for Social Media Sharing -->
    <div id="shareModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="modal-content bg-white p-6 rounded-md w-80">
            <h3 class="text-center text-lg font-semibold mb-4">Bagikan ke</h3>

            <div class="mt-4 flex justify-between gap-4">
                <button onclick="shareTo('facebook')" class="social-btn bg-blue-600 hover:bg-blue-700">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg"
                        alt="Facebook" class="social-icon">
                </button>

                <button onclick="shareTo('twitter')" class="social-btn bg-blue-400 hover:bg-blue-500">
                    <img src="https://brandlogos.net/wp-content/uploads/2023/07/x__twitter-logo_brandlogos.net_fxbde.png"
                        alt="Twitter" class="social-icon">
                </button>

                <button onclick="shareTo('whatsapp')" class="social-btn bg-green-500 hover:bg-green-600">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp"
                        class="social-icon">
                </button>

                <button onclick="shareTo('instagram')" class="social-btn bg-red-500 hover:bg-red-800">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/1200px-Instagram_logo_2022.svg.png"
                        alt="Instagram" class="social-icon">
                </button>
            </div>

            <!-- Close Modal Button -->
            <button onclick="closeModal()"
                class="mt-6 text-xs w-full md:text-base bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 md:px-5 md:py-2 rounded-md">
                Close
            </button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

    <script>
        const input = document.getElementById('nameInput');

        function resizeInput() {
            input.style.width = `${input.value.length + 1}ch`; // +1 for some padding
        }

        // Resize input when content changes
        input.addEventListener('input', resizeInput);

        // Initialize on page load to adjust size based on current value
        resizeInput();
    </script>

    <script>
        const currentDate = new Date();
        const months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        const day = currentDate.getDate();
        const month = months[currentDate.getMonth()];
        const year = currentDate.getFullYear();

        const formattedDate = `${day} ${month} ${year}`;

        document.getElementById('currentDate').textContent = formattedDate;
    </script>

    <script>
        function downloadPDF() {
            // Get the values from the input fields
            const certificateNumber = document.getElementById('noInput').value;
            const recipientName = document.getElementById('nameInput').value;
            const currentDate = document.getElementById('currentDate').innerText;

            // Get the certificate content div
            const certificateElement = document.querySelector('.certificate');

            // Create a clone of the certificate content
            const certificateClone = certificateElement.cloneNode(true);

            // Temporarily remove the pencil icons in the clone
            const pencilIcons = certificateClone.querySelectorAll('.fa-pencil-alt');
            pencilIcons.forEach(icon => {
                icon.style.display = 'none'; // Hide pencil icons in the PDF version
            });

            // Update the content dynamically in the clone
            certificateClone.querySelector('#noInput').value = certificateNumber;
            certificateClone.querySelector('#nameInput').value = recipientName;
            certificateClone.querySelector('#currentDate').innerText = currentDate;

            // Set the options for the PDF
            const options = {
                margin: 10,
                filename: 'certificate.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 4
                }, // Higher scale for better quality
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };

            // Convert the updated content to PDF
            html2pdf().from(certificateClone).set(options).save();
        }
    </script>

    <script>
        function openModal() {
            document.getElementById('shareModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('shareModal').classList.add('hidden');
        }

        function shareTo(platform) {
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent("Check out this certificate!");
            const hashtag = "certificate";

            const platforms = {
                'facebook': `https://www.facebook.com/sharer/sharer.php?u=${url}`,
                'twitter': `https://twitter.com/intent/tweet?url=${url}&text=${text}&hashtags=${hashtag}`,
                'whatsapp': `https://wa.me/?text=${text}%20${url}`,
                'instagram': `https://www.instagram.com/?url=${url}`
            };

            if (platforms[platform]) {
                window.open(platforms[platform], '_blank');
            } else {
                alert('Invalid platform');
            }

            closeModal();
        }
    </script>
@endsection
