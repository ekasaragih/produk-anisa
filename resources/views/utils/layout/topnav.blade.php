<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .alarm-popup {
        position: fixed;
        top: 20px;
        right: 20px;
        background: red;
        color: white;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<!-- Alarm Reminder Container -->
<div id="alarm-reminder-container" class="fixed right-5 z-50 space-y-3 w-[300px] max-w-full sm:w-[350px] md:w-[400px]">
</div>

<nav class="navbar navbar-main navbar-expand-lg px-3 pt-0 shadow-none rounded-xl {{ str_contains(Request::url(), 'virtual-reality') ? 'mt-3 bg-primary' : '' }}"
    id="navbarBlur" data-scroll="false">
    <div class="container pb-1">
        <nav aria-label="breadcrumb">
            <div class="mb-2 flex space-x-2">
                <button class="rounded-xl bg-blue-700 text-white border-2 border-white px-3 py-2" id="backButton"
                    onclick="goBack()">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </button>
                <button class="rounded-xl bg-teal-400 text-white border-2 border-white px-3 py-2" id="forwardButton"
                    onclick="goForward()">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </button>
            </div>

            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5 text-lg">
                <li class="breadcrumb-item text-black">
                    <a href="javascript:;" class="cursor-auto">Halaman / <span
                            class="breadcrumb-item text-teal-500 font-semibold"
                            aria-current="page">{{ $title }}</span>
                    </a>
                </li>
            </ol>
        </nav>
    </div>
</nav>
<!-- End Navbar -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script>

<script>
    function goBack() {
        history.go(-1);
    }

    function goForward() {
        history.go(1);
    }
</script>

<script>
    let alarmSound;

    document.addEventListener("DOMContentLoaded", function() {
        unlockAudio();
        fetchUpcomingAlarms();
        notif90();
        setInterval(fetchUpcomingAlarms, 60000);
    });

    function unlockAudio() {
        let unlock = new Howl({
            src: [
                "data:audio/wav;base64,UklGRiQAAABXQVZFZm10IBAAAAABAAEARKwAABCxAgAEABAAZGF0YQAAAAA="
            ], // Silent audio
            volume: 0
        });

        unlock.play();
    }

    function initializeAlarmSound() {
        if (!alarmSound) {
            alarmSound = new Howl({
                src: ["{{ asset('assets/alarm.mp3') }}"],
                loop: true,
                volume: 0.7
            });
        }
    }

    function fetchUpcomingAlarms() {
        $.ajax({
            url: "/upcoming",
            method: "GET",
            success: function(response) {
                if (!Array.isArray(response)) {
                    console.warn("No upcoming alarms or invalid response format.");
                    return;
                }
                displayAlarms(response);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching alarms:", status, error);
            }
        });
    }

    function displayAlarms(alarms) {
        const container = document.getElementById("alarm-reminder-container");
        container.innerHTML = "";

        if (!alarms || alarms.length === 0) {
            console.log("No alarms to display.");
            if (alarmSound) alarmSound.stop(); // Stop sound if no alarms
            return;
        }

        initializeAlarmSound(); // Ensure sound is initialized

        alarms.forEach(alarm => {
            let alarmElement = document.createElement("div");
            alarmElement.classList.add("bg-red-600", "text-white", "p-4", "rounded-lg", "shadow-lg",
                "animate-pulse");

            alarmElement.innerHTML = `
                <div>
                    <strong>⚠️ ALARM PENGINGAT! ⚠️</strong>
                    <p>Waktunya: ${alarm.nama_alarm} - ${alarm.jam}</p>
                    <button class="mt-2 bg-white text-red-500 px-2 py-1 rounded" onclick="dismissAlarm(${alarm.id})">Sudah Minum Obat</button>
                    <button class="mt-2 bg-white text-yellow-500 px-2 py-1 rounded" onclick="snoozeAlarm(${alarm.id})">Ingatkan Lagi</button>
                </div>
            `;

            container.appendChild(alarmElement);

            if (!alarmSound.playing()) {
                alarmSound.play();
            }
        });
    }

    function snoozeAlarm(id) {
        $.ajax({
            url: `/alarm/${id}/snooze`,
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function() {
                fetchUpcomingAlarms();
            },
            error: function(xhr) {
                console.error("Error snoozing alarm:", xhr.responseText);
            }
        });
    }

    function dismissAlarm(id) {
        $.ajax({
            url: `/alarm/${id}/dismiss`,
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function() {
                fetchUpcomingAlarms();
            },
            error: function(xhr) {
                console.error("Error dismissing alarm:", xhr.responseText);
            }
        });
    }

    function notif90() {
        // Check if the notification has already been shown
        if (localStorage.getItem('notif90Shown') === 'true') {
            return;
        }

        $.ajax({
            url: `/notif`,
            method: 'GET',
            success: function(response) {
                if (response.alertFlag) {
                    if (response.alertFlag == 'MILESTONE_ACHIEVED') {
                        Swal.fire({
                            position: 'top-end',
                            title: 'Milestone Achieved!',
                            text: 'Jumlah konsumsi obat mencapai 90 hari!',
                            icon: 'success',
                            showConfirmButton: false,
                            footer: '<a href="/certificate">Klik disini untuk lihat Sertifikat</a>',
                            width: 400, // Adjust width to make it more rectangular
                            padding: '10px', // Add padding for better spacing
                            customClass: {
                                popup: 'swal-popup-long', // Apply custom class for extra styling if needed
                            }
                        });

                        localStorage.setItem('notif90Shown', 'true');
                    } else if (response.alertFlag == 'MILESTONE_NEAR_ACHIEVED') {
                        Swal.fire({
                            title: 'Semangat!',
                            text: 'sedikit lagi mencapai 90 hari!',
                            icon: 'info',
                            confirmButtonText: 'OK',
                            footer: '<a href="/another-page">Klik disini untuk lihat Sertifikat</a>',
                            width: 400, // Adjust width to make it more rectangular
                            padding: '20px', // Add padding for better spacing
                            customClass: {
                                popup: 'swal-popup-long', // Apply custom class for extra styling if needed
                            }
                        });

                        localStorage.setItem('notif90Shown', 'true');
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error("There was an error with the request.");
            }
        });
    }
</script>
