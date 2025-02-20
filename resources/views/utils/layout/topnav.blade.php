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
                            class="breadcrumb-item text-teal-500 font-semibold" aria-current="page">{{ $title
                            }}</span>
                    </a>
                </li>
            </ol>
        </nav>
    </div>
</nav>
<!-- End Navbar -->

<script>
    function goBack() {
        history.go(-1);
    }

    function goForward() {
        history.go(1);
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetchUpcomingAlarms();
        setInterval(fetchUpcomingAlarms, 60000);
    });

    function fetchUpcomingAlarms() {
        $.ajax({
            url: "/upcoming",
            method: "GET",
            success: function (response) {
                console.log("Fetched alarms:", response);
                
                if (!Array.isArray(response)) {
                    console.warn("No upcoming alarms or invalid response format.");
                    return;
                }

                displayAlarms(response);
            },
            error: function (xhr, status, error) {
                console.error("Error fetching alarms:", status, error);
            }
        });
    }

    function displayAlarms(alarms) {
        const container = document.getElementById("alarm-reminder-container");
        container.innerHTML = "";

        if (!alarms || alarms.length === 0) {
            console.log("No alarms to display.");
            return;
        }

        alarms.forEach(alarm => {
            const now = new Date();
            const alarmTime = new Date(`${now.toISOString().split('T')[0]}T${alarm.jam}`);

            const timeDiff = (alarmTime - now) / 60000;

            if (timeDiff <= 5 && timeDiff >= 0) {
                let alarmElement = document.createElement("div");
                alarmElement.classList.add("bg-red-600", "text-white", "p-4", "rounded-lg", "shadow-lg", "animate-pulse");

                alarmElement.innerHTML = `
                    <div>
                        <strong>⚠️ ALARM PENGINGAT! ⚠️</strong>
                        <p>Waktunya: ${alarm.nama_alarm} - ${alarm.jam}</p>
                        <p class="text-xs italic">Alarm "${alarm.nama_alarm}" akan berbunyi ${timeDiff.toFixed(2)} menit</p>
                        <button class="mt-2 bg-white text-red-500 px-2 py-1 rounded" onclick="dismissAlarm(this)">Dismiss</button>
                    </div>
                `;

                container.appendChild(alarmElement);
                // playAlarmSound();
            }
        });
    }


    function playAlarmSound() {
        let audio = new Audio('/alarm-sound.mp3');
        audio.play();
    }

    function dismissAlarm(button) {
        button.parentElement.parentElement.remove();
    }
</script>