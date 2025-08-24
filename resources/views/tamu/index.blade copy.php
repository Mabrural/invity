@extends('layouts.main')
@section('container')
    <style>
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            color: #777;
            font-size: 24px;
            cursor: pointer;
        }

        .modal-title {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.5rem;
        }

        .share-message {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.6;
            text-align: left;
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ddd;
        }

        .share-actions {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-copy {
            background: linear-gradient(to right, #4CAF50, #45a049);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .btn-whatsapp {
            background: linear-gradient(to right, #25D366, #128C7E);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .btn-copy i,
        .btn-whatsapp i {
            margin-right: 8px;
        }

        /* Tombol Bagikan di Tabel */
        .btn-share {
            background: linear-gradient(to right, #4267B2, #3b5998);
            color: white;
            border: none;
            padding: 5px 12px;
            font-size: 12px;
            border-radius: 4px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            margin-right: 5px;
        }

        .btn-share i {
            margin-right: 5px;
        }

        @media (max-width: 768px) {
            .share-actions {
                flex-direction: column;
            }

            .btn-copy,
            .btn-whatsapp {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
    <!-- Modal Share -->
    <div class="modal" id="shareModal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <h2 class="modal-title">Bagikan Undangan</h2>
            <div class="share-message" id="shareMessage">
                <!-- Pesan akan diisi oleh JavaScript -->
            </div>
            <div class="share-actions">
                <button class="btn-copy" onclick="copyShareMessage()">
                    <i class="fas fa-copy"></i> Salin Pesan
                </button>
                <button class="btn-whatsapp" onclick="shareViaWhatsApp()">
                    <i class="fab fa-whatsapp"></i> Bagikan via WhatsApp
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="page-title">
            <h1><i class="fas fa-users"></i> Daftar Tamu</h1>
        </div>

        <!-- Stats Cards -->
        <div class="stats-cards">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $guests->count() }}</h3>
                    <p>Total Tamu</p>
                </div>
            </div>
        </div>

        <!-- Add Guest Form -->
        <div class="card">
            <h2 class="card-title"><i class="fas fa-user-plus"></i> Tambah Tamu Undangan</h2>

            <form action="{{ route('tamu.store') }}" method="POST">
                @csrf
                <div class="form-grid">
                    <!-- Pilih Acara -->
                    <div class="form-group">
                        <label for="event_id">Pilih Acara</label>
                        <select id="event_id" name="event_id" class="form-control" required>
                            @if ($events->count() > 0)
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}">
                                        {{ $event->event_name_1 }} - {{ $event->event_name_2 }}
                                    </option>
                                @endforeach
                            @else
                                <option disabled>Tidak ada event</option>
                            @endif
                        </select>
                    </div>

                    <!-- Nama Tamu -->
                    <div class="form-group">
                        <label for="name">Nama Tamu</label>
                        <input type="text" id="name" name="name" class="form-control"
                            placeholder="Nama lengkap tamu" required>
                    </div>
                </div>

                <button type="submit" class="btn-primary">
                    <i class="fas fa-plus"></i> Tambah Tamu
                </button>
            </form>
        </div>

        <!-- Guest List -->
        <div class="card">
            <div class="card-title"><i class="fas fa-list"></i> Daftar Tamu Undangan</div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tamu</th>
                            <th>Link Undangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($guests as $guest)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $guest->name }}</td>
                                <td onclick="copyToClipboard('{{ url('u/' . $guest->slug) }}'); alert('Link berhasil disalin!');"
                                    style="cursor:pointer;" title="Klik untuk salin">
                                    {{ url('u/' . $guest->slug) }}
                                </td>

                                <td class="text-center">
                                    <!-- Tombol Bagikan -->
                                    <button type="button" class="btn-share"
                                        onclick="showShareModal('{{ $guest->name }}', '{{ url('u/' . $guest->slug) }}', '{{ $guest->event->event_name_1 }}', '{{ $guest->event->event_name_2 }}')"
                                        title="Bagikan Undangan">
                                        <i class="fas fa-share-alt"></i> Bagikan
                                    </button>

                                    <!-- Tombol Salin -->
                                    <button type="button"
                                        class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1 shadow-sm"
                                        onclick="copyToClipboard('{{ url('u/' . $guest->slug) }}'); alert('Link berhasil disalin!');"
                                        title="Salin Link">
                                        <i class="fas fa-copy me-1"></i> Salin
                                    </button>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('tamu.destroy', $guest->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-outline-danger btn-sm rounded-pill px-3 shadow-sm"
                                            title="Hapus Data">
                                            <i class="fas fa-trash-alt me-1"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada tamu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert("Link berhasil disalin: " + text);
            }).catch(err => {
                console.error('Gagal menyalin: ', err);
            });
        }

        // Variabel global untuk menyimpan data undangan yang akan dibagikan
        let currentShareData = {};

        // Fungsi untuk menampilkan modal bagikan
        function showShareModal(guestName, invitationLink, eventName1, eventName2) {
            currentShareData = {
                guestName: guestName,
                invitationLink: invitationLink,
                eventName1: eventName1,
                eventName2: eventName2
            };

            const shareMessage = document.getElementById('shareMessage');

            // Format pesan sesuai dengan contoh yang diberikan, disesuaikan untuk ulang tahun & anniversary
            shareMessage.innerHTML = `
                <strong>${eventName1}<br>${eventName2}</strong><br><br>
                
                Dear Tamu Undangan,<br><br>
                
                Salam Sejahtera Bagi Kita Semua. Tuhan membuat segala sesuatu indah pada waktunya. Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i: <strong>${guestName}</strong> untuk menghadiri acara kami.<br><br>
                
                Berikut link undangan Anda:<br>
                <strong>${invitationLink}</strong><br><br>
                
                Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.<br>
                Terima Kasih.<br><br>
                
                <em>Panitia ${eventName1}</em>
            `;

            document.getElementById('shareModal').style.display = 'flex';
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById('shareModal').style.display = 'none';
        }

        // Fungsi untuk menyalin pesan bagikan
        function copyShareMessage() {
            const shareText = `${currentShareData.eventName1} - ${currentShareData.eventName2}

Dear Tamu Undangan,

Salam Sejahtera Bagi Kita Semua. Tuhan membuat segala sesuatu indah pada waktunya. Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i: ${currentShareData.guestName} untuk menghadiri acara kami.

Berikut link undangan Anda:
${currentShareData.invitationLink}

Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.
Terima Kasih.

Panitia ${currentShareData.eventName1}`;

            navigator.clipboard.writeText(shareText).then(() => {
                alert('Pesan undangan berhasil disalin!');
            }).catch(err => {
                console.error('Gagal menyalin teks: ', err);
                alert('Gagal menyalin pesan. Silakan coba manual.');
            });
        }

        // Fungsi untuk berbagi via WhatsApp
        function shareViaWhatsApp() {
            const shareText = encodeURIComponent(`${currentShareData.eventName1} - ${currentShareData.eventName2}

Dear Tamu Undangan,

Kami ingin mengundang ${currentShareData.guestName} untuk menghadiri acara kami. Berikut link undangan: ${currentShareData.invitationLink}

Terima kasih.`);

            window.open(`https://api.whatsapp.com/send?text=${shareText}`, '_blank');
        }

        // Tutup modal ketika mengklik di luar konten modal
        window.onclick = function(event) {
            const modal = document.getElementById('shareModal');
            if (event.target === modal) {
                closeModal();
            }
        };
    </script>

@endsection
