<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SANJEEV & REGINA</title>

    <!-- Favicon untuk browser -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/2.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('assets/2.jpg') }}">

    <!-- PNG Favicon berbagai ukuran -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/2.jpg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/2.jpg') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('assets/2.jpg') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/2.jpg') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('assets/2.jpg') }}">

    <!-- Apple Touch Icon (untuk iOS & iPadOS) -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/2.jpg') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/2.jpg') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/2.jpg') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/2.jpg') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/2.jpg') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/2.jpg') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/2.jpg') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/2.jpg') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/2.jpg') }}">

    <!-- Windows / Microsoft Tile -->
    <meta name="msapplication-TileImage" content="{{ asset('assets/2.jpg') }}">
    <meta name="msapplication-TileColor" content="#d4af37">

    <!-- Android / PWA -->
    <link rel="manifest" href="/site.webmanifest">
    <meta name="theme-color" content="#0a0a0a">

    <!-- Preconnect Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Cinzel:wght@400;700&family=Montserrat:wght@300;400;500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            color: #fff;
            background-color: #0a0a0a;
            overflow-x: hidden;
        }

        .landing-page {
            min-height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/opening.jpg') }}') no-repeat center center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
            position: relative;
        }

        .logo {
            position: absolute;
            top: 30px;
            left: 30px;
            font-family: 'Cinzel', serif;
            font-size: 28px;
            font-weight: 700;
            color: #d4af37;
            letter-spacing: 2px;
        }

        .content {
            max-width: 800px;
            padding: 20px;
            animation: fadeIn 1.5s ease-in-out;
        }

        .to-name {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            margin-bottom: 20px;
            /*color: #d4af37;*/
            color: rgb(212, 178, 103);
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        .welcome-text {
            font-size: 18px;
            margin-bottom: 30px;
            line-height: 1.6;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            color: rgb(212, 178, 103);
        }

        .btn-open {
            background: linear-gradient(to right, #d4af37, #f5e9c6);
            color: #0a0a0a;
            border: none;
            padding: 15px 40px;
            font-size: 18px;
            font-weight: 500;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Montserrat', sans-serif;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
            margin-top: 20px;
        }

        .btn-open:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.5);
        }

        .invitation-page {
            min-height: 100vh;
            background: linear-gradient(rgba(10, 10, 10, 0.9), rgba(10, 10, 10, 0.9)), url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80') no-repeat center center/cover;
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            text-align: center;
        }

        .invitation-content {
            background: rgba(26, 26, 26, 0.8);
            padding: 40px;
            border-radius: 10px;
            border: 1px solid #d4af37;
            max-width: 800px;
            width: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            animation: scaleIn 0.8s ease-in-out;
        }

        .title {
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            color: #d4af37;
            margin-bottom: 20px;
        }

        .subtitle {
            /* font-family: 'Cinzel', serif; */
            /* font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; */
            /* font-family: 'Rockwell', 'Rockwell Extra Bold', serif; */
            /* font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif; */
            font-family: 'Monotype Corsiva', 'Comic Sans MS', cursive;
            /* font-family: 'Broadway', 'Copperplate Gothic', 'Futura', sans-serif; */


            font-size: 30px;
            margin-bottom: 30px;
            color: #f5e9c6;
        }

        .details {
            text-align: center;
            max-width: 500px;
            margin: 0 auto 30px;
            color: rgb(212, 178, 103);
        }

        .detail-item {
            margin-bottom: 25px;
        }

        .detail-text {
            font-size: 18px;
            text-align: center;
        }

        .note {
            font-style: italic;
            margin-top: 30px;
            color: rgb(212, 178, 103);
            font-size: 14px;
        }

        .btn-back {
            background: transparent;
            color: #d4af37;
            border: 1px solid #d4af37;
            padding: 12px 30px;
            font-size: 16px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 30px;
        }

        .btn-back:hover {
            background-color: rgba(212, 175, 55, 0.1);
        }

        /* Tombol WhatsApp */
        .btn-whatsapp {
            background: rgb(212, 178, 103);
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Montserrat', sans-serif;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px auto 10px;
        }

        .btn-whatsapp:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.5);
        }

        .btn-whatsapp i {
            margin-right: 10px;
            font-size: 20px;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }

        .event-photo {
            margin: 20px 0;
            text-align: center;
            width: 100%;
        }

        .event-photo img {
            width: 100%;
            max-height: 600px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        }

        /* Kontrol Musik */
        .music-control {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            background: rgba(212, 175, 55, 0.8);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .music-control:hover {
            transform: scale(1.1);
            background: rgba(212, 175, 55, 1);
        }

        .music-control i {
            color: #0a0a0a;
            font-size: 20px;
        }

        .music-control.paused i.fa-play {
            display: block;
        }

        .music-control.paused i.fa-pause {
            display: none;
        }

        .music-control.playing i.fa-play {
            display: none;
        }

        .music-control.playing i.fa-pause {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @media (max-width: 768px) {
            .to-name {
                font-size: 28px;
            }

            .title {
                font-size: 32px;
            }

            .subtitle {
                font-size: 25px;
            }

            .detail-text {
                font-size: 16px;
            }

            .invitation-content {
                padding: 30px 20px;
            }

            .button-container {
                flex-direction: column;
            }

            .btn-whatsapp,
            .btn-back {
                width: 100%;
            }

            .music-control {
                bottom: 15px;
                right: 15px;
                width: 45px;
                height: 45px;
            }

            .event-photo img {
                max-height: 500px;
            }
        }

        @media (max-width: 480px) {
            .event-photo img {
                max-height: 360px;
            }
        }
    </style>
</head>

<body>
    <!-- Element Audio -->
    <audio id="backgroundMusic" loop>
        <source src="{{ asset('assets/blessingmaria.mp3') }}" type="audio/mpeg">
        Browser Anda tidak mendukung elemen audio.
    </audio>

    <!-- Kontrol Musik -->
    <div class="music-control paused" id="musicControl">
        <i class="fas fa-play" id="playIcon"></i>
        <i class="fas fa-pause" id="pauseIcon"></i>
    </div>

    <!-- Landing Page -->
    <div class="landing-page" id="landingPage">
        <div class="content">
            <br>
            <p class="mb-2" style="color: rgb(212, 178, 103);">Dear Mr. / Mrs. / Brother / Sister,</p><br>
            <h1 class="to-name" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                {{ $guest->name }}</h1>
            <p class="welcome-text text-sm">
                We are honored to invite you to attend our special event. Please open the invitation below for more
                information.
            </p>
            <button class="btn-open" onclick="openInvitation()">
                Open Invitation <i class="fas fa-envelope-open-text" style="margin-left: 10px;"></i>
            </button>
        </div>
    </div>

    <!-- Invitation Page -->
    <div class="invitation-page" id="invitationPage">
        <div class="invitation-content">
            <p class="subtitle">{{ $guest->event->event_name_1 }}</p>
            @if (!empty($guest->event->event_photo_1))
                <div class="event-photo">
                    <img src="{{ asset('storage/' . $guest->event->event_photo_1) }}" alt="Foto Event 1">
                </div>
            @endif
            <p class="subtitle">{{ $guest->event->event_name_2 }}</p>
            @if (!empty($guest->event->event_photo_2))
                <div class="event-photo">
                    <img src="{{ asset('storage/' . $guest->event->event_photo_2) }}" alt="Foto Event 2">
                </div>
            @endif

            <div class="details">
                <div class="detail-item">
                    <div class="detail-text">
                        <strong>Date</strong><br>
                        {{ $guest->event->event_date ? \Carbon\Carbon::parse($guest->event->event_date)->translatedFormat('l, F d, Y') : 'Tanggal belum ditentukan' }}
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-text">
                        <strong>Time</strong><br>
                        6:00 PM - 7.00 PM : Blessing Ceremony <br>
                        7.00 PM - 10.00 PM : Reception
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-text">
                        <strong>Venue</strong><br>
                        {{ $guest->event->location ?? 'Lokasi belum ditentukan' }}
                    </div>
                </div>

                @if (!empty($guest->event->dresscode))
                    <div class="detail-item">
                        <div class="detail-text">
                            <strong>Dress Code</strong><br>
                            {{ $guest->event->dresscode }}
                        </div>
                    </div>
                @endif
            </div>

            <p class="note">
                *{{ $guest->event->other_information ?? 'tanggal tertentu' }}
            </p>

            <!-- Tombol Konfirmasi WhatsApp -->
            <button class="btn-whatsapp" onclick="confirmAttendance()">
                <i class="fab fa-whatsapp"></i> Confirm Attendance
            </button>

            <!-- Tombol Lihat Lokasi -->
            @if (!empty($guest->event->link_googlemaps))
                <a href="{{ $guest->event->link_googlemaps }}" target="_blank" class="btn-whatsapp"
                    style="background: rgb(212, 178, 103); text-decoration:none;">
                    <i class="fas fa-map-marked-alt"></i> View Location
                </a>
            @endif

            <div class="button-container">
                <button class="btn-back" onclick="goBack()">
                    <i class="fas fa-arrow-left" style="margin-right: 8px;"></i> Go Back
                </button>
            </div>
        </div>
    </div>

    <script>
        // Variabel global untuk mengontrol musik
        const backgroundMusic = document.getElementById('backgroundMusic');
        const musicControl = document.getElementById('musicControl');
        let isMusicPlaying = false;

        // Fungsi untuk memutar musik
        function playMusic() {
            const playPromise = backgroundMusic.play();

            if (playPromise !== undefined) {
                playPromise.then(() => {
                    // Musik berhasil diputar
                    isMusicPlaying = true;
                    musicControl.classList.remove('paused');
                    musicControl.classList.add('playing');
                }).catch(error => {
                    // Autoplay dicegah oleh browser
                    console.log("Autoplay dicegah: ", error);
                    musicControl.style.display = 'flex'; // Tampilkan kontrol musik
                });
            }
        }

        // Fungsi untuk menghentikan musik
        function pauseMusic() {
            backgroundMusic.pause();
            isMusicPlaying = false;
            musicControl.classList.remove('playing');
            musicControl.classList.add('paused');
        }

        // Fungsi untuk membuka undangan dan memutar musik
        function openInvitation() {
            document.getElementById('landingPage').style.display = 'none';
            document.getElementById('invitationPage').style.display = 'flex';

            // Mulai memutar musik setelah interaksi pengguna
            playMusic();

            // Tampilkan kontrol musik
            musicControl.style.display = 'flex';
        }

        function goBack() {
            document.getElementById('invitationPage').style.display = 'none';
            document.getElementById('landingPage').style.display = 'flex';
        }

        function confirmAttendance() {
            // Nomor WA admin event (ambil dari event kalau disimpan di DB)
            const phoneNumber = '{{ $guest->event->no_wa_confirmation ?? '6281234567890' }}';

            // Pesan default personalisasi
            const message = encodeURIComponent(
                `Halo Pak/Bu... Saya, {{ $guest->name }}, bersedia hadir pada acara {{ $guest->event->event_name_1 }} - {{ $guest->event->event_name_2 }}.`
            );


            window.open(`https://api.whatsapp.com/send?phone=${phoneNumber}&text=${message}`, '_blank');
        }

        // Event listener untuk kontrol musik
        musicControl.addEventListener('click', function() {
            if (isMusicPlaying) {
                pauseMusic();
            } else {
                playMusic();
            }
        });

        // Sembunyikan kontrol musik secara default
        window.onload = function() {
            musicControl.style.display = 'none';

            // Coba set volume ke level yang sesuai (opsional)
            backgroundMusic.volume = 0.7; // 70% volume
        };
    </script>
</body>

</html>
