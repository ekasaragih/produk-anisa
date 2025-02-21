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

        .certificate {
            background: linear-gradient(to right, rgba(32, 101, 239, 0.3), rgba(32, 198, 88, 0.2));
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

                <div>

                    <!-- Image (from assets folder) -->
                    <div class="flex justify-center items-center">
                        <div class="rounded-xl">
                            <img src="{{ asset('assets/certificate_anisa.png') }}" alt="Certificate Image"
                                style="width: 90%; height: auto;" />
                        </div>
                    </div>

                    <!-- Number input field (positioned over image) -->
                    <div class="inline-flex items-center space-x-2"
                        style="position: absolute; top: 49%; left: 49%; z-index: 10; color: rgb(0, 0, 0);">
                        <h2 class="text-sm md:text-[10px] font-bold mb-1 md:mb-2">Nomor
                            <input id="noInput" type="text" value="1234567"
                                class="bg-transparent text-sm md:text-[10px] font-bold mb-1 md:mb-2 border-b border-white inline-block text-start" />
                        </h2>
                        <!-- Pencil icon -->
                        <i class="fas fa-pencil-alt text-gray-600 cursor-pointer"></i>
                    </div>

                    <!-- Name input field (positioned over image) -->
                    <div class="inline-flex items-center space-x-2"
                        style="position: absolute; top: 70%; left: 44%; z-index: 10; color: rgb(0, 0, 0);">
                        <p class="text-sm md:text-3xl font-bold mb-1 md:mb-2">
                            <input id="nameInput" type="text" value="KUPA COCHANK"
                                class="bg-transparent text-sm md:text-3xl font-bold mb-1 md:mb-2 inline-block text-center" />
                        </p>
                        <!-- Pencil icon -->
                        <i class="fas fa-pencil-alt text-gray-600 cursor-pointer"></i>
                    </div>

                    <!-- Date Text -->
                    <p class="text-[10px] md:text-lg mt-3 md:mt-6"
                        style="position: absolute; top: 94%; left: 50%; z-index: 10;" id="currentDate">
                        <!-- Current date will be inserted here -->
                    </p>

                    <!-- Pemberi Sertifikat Text -->
                    <div class="mt-3 md:mt-6 flex flex-col items-center"
                        style="position: absolute; top: 100%; left: 49%; z-index: 10;">
                        <p class="text-[10px] md:text-lg">(Pemberi Sertifikat)</p>
                    </div>

                    <!-- Logos (if you want to add logos) -->
                    <div class="flex justify-center mt-2 md:mt-6 space-x-2 md:space-x-4"
                        style="position: absolute; top: 108%; left: 50%; z-index: 10;">
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

                    <!-- Main Share Button -->
                    <button onclick="openModal()"
                        class="text-xs md:text-base bg-teal-500 hover:bg-teal-600 text-white px-3 py-1 md:px-5 md:py-2 rounded-md">
                        Share ke Media Sosial
                    </button>

                    <!-- Modal for Social Media Sharing -->
                    <div id="shareModal"
                        class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
                        <div class="modal-content bg-white p-6 rounded-md w-80">
                            <h3 class="text-center text-lg font-semibold mb-4">Share To</h3>

                            <!-- Social Media Buttons -->
                            <div class="mt-4 flex justify-between gap-4">
                                <!-- Facebook Button -->
                                <button onclick="shareTo('facebook')" class="social-btn bg-blue-600 hover:bg-blue-700">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg"
                                        alt="Facebook" class="social-icon">
                                </button>

                                <!-- Twitter Button -->
                                <button onclick="shareTo('twitter')" class="social-btn bg-blue-400 hover:bg-blue-500">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/60/Twitter_Logo_as_of_2021.svg"
                                        alt="Twitter" class="social-icon">
                                </button>

                                <!-- WhatsApp Button -->
                                <button onclick="shareTo('whatsapp')" class="social-btn bg-green-500 hover:bg-green-600">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg"
                                        alt="WhatsApp" class="social-icon">
                                </button>

                                <!-- Instagram Button -->
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
                </div>
            </div>
        </div>

        @include('utils.layout.footer')
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- html2canvas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>


    <script>
        // Get the current date
        const currentDate = new Date();

        // Define an array of month names in Indonesian
        const months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        // Get the current day, month, and year
        const day = currentDate.getDate();
        const month = months[currentDate.getMonth()]; // Get the month name in Indonesian
        const year = currentDate.getFullYear();

        // Combine into the desired format: "DD Month YYYY"
        const formattedDate = `${day} ${month} ${year}`;

        // Set the text of the element with ID "currentDate" to the formatted date
        document.getElementById('currentDate').textContent = formattedDate;
    </script>
    <script>
        function downloadPDF() {
            // Select the div that you want to export to PDF (the whole certificate area)
            const certificateDiv = document.querySelector('div');

            // Use html2canvas to convert the div to a canvas
            html2canvas(certificateDiv).then(function(canvas) {
                // Initialize jsPDF
                const {
                    jsPDF
                } = window.jspdf;
                const doc = new jsPDF();

                // Convert the canvas to an image (base64)
                const imgData = canvas.toDataURL('image/png');

                // Add the image to the PDF
                doc.addImage(imgData, 'PNG', 10, 10, 180, 250); // Adjust the size and position as needed

                // Save the generated PDF
                doc.save('certificate.pdf');
            });
        }
    </script>


    <script>
        // Open the modal
        function openModal() {
            document.getElementById('shareModal').classList.remove('hidden');
        }

        // Close the modal
        function closeModal() {
            document.getElementById('shareModal').classList.add('hidden');
        }

        // Share to the selected social media platform
        function shareTo(platform) {
            const url = encodeURIComponent(window.location.href); // URL of the current page
            const text = encodeURIComponent("Check out this certificate!"); // Optional text to share
            const hashtag = "certificate";

            // Define URLs for sharing
            const platforms = {
                'facebook': `https://www.facebook.com/sharer/sharer.php?u=${url}`,
                'twitter': `https://twitter.com/intent/tweet?url=${url}&text=${text}&hashtags=${hashtag}`,
                'whatsapp': `https://wa.me/?text=${text}%20${url}`,
                'instagram': `https://www.instagram.com/?url=${url}`
            };

            // Open the platform's sharing URL in a new tab
            if (platforms[platform]) {
                window.open(platforms[platform], '_blank');
            } else {
                alert('Invalid platform');
            }

            // Close the modal after sharing
            closeModal();
        }
    </script>
@endsection
