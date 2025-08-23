@extends('layouts.main')
@section('container')
    <!-- Main Content -->
    <div class="main-content">
        <div class="page-title">
            <h1><i class="fas fa-calendar-alt"></i> Acara</h1>
        </div>

        <!-- Stats Cards -->
        <div class="stats-cards">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $events->count() }}</h3>
                    <p>Total Acara</p>
                </div>
            </div>
        </div>

        <!-- Add Event Form -->
        <div class="card">
            <h2 class="card-title"><i class="fas fa-plus"></i> Tambah Acara</h2>

            <form action="{{ route('acara.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">

                    <!-- Nama Acara 1 -->
                    <div class="form-group">
                        <label for="eventName1">Nama Acara 1</label>
                        <input type="text" name="event_name_1" id="eventName1" value="{{ old('event_name_1') }}" required>
                    </div>

                    <!-- Foto 1 -->
                    <div class="form-group">
                        <label for="eventPhoto1">Foto 1</label>
                        <input type="file" name="event_photo_1" id="eventPhoto1" accept="image/*">
                    </div>

                    <!-- Nama Acara 2 (Optional) -->
                    <div class="form-group">
                        <label for="eventName2">Nama Acara 2 (Optional)</label>
                        <input type="text" name="event_name_2" id="eventName2" value="{{ old('event_name_2') }}">
                    </div>

                    <!-- Foto 2 (Optional) -->
                    <div class="form-group">
                        <label for="eventPhoto2">Foto 2 (Optional)</label>
                        <input type="file" name="event_photo_2" id="eventPhoto2" accept="image/*">
                    </div>

                    <!-- Tanggal Acara -->
                    <div class="form-group">
                        <label for="eventDate">Tanggal Acara</label>
                        <input type="datetime-local" name="event_date" id="eventDate" value="{{ old('event_date') }}" required>
                    </div>

                    <!-- Lokasi -->
                    <div class="form-group">
                        <label for="eventLocation">Lokasi Acara</label>
                        <input type="text" name="location" id="eventLocation" value="{{ old('location') }}" required>
                    </div>

                    <!-- Link Google Maps -->
                    <div class="form-group">
                        <label for="link_googlemaps">Link Google Maps</label>
                        <input type="url" name="link_googlemaps" id="link_googlemaps"
                            placeholder="https://maps.google.com/...."
                            value="{{ old('link_googlemaps') }}">
                    </div>

                    <!-- Dresscode -->
                    <div class="form-group">
                        <label for="dresscode">Dresscode</label>
                        <input type="text" name="dresscode" id="dresscode" value="{{ old('dresscode') }}"
                            placeholder="Contoh: Formal, Batik, Putih Hitam">
                    </div>

                    <!-- No WhatsApp -->
                    <div class="form-group">
                        <label for="no_wa_confirmation">No WhatsApp Konfirmasi</label>
                        <input type="text" name="no_wa_confirmation" id="no_wa_confirmation" value="{{ old('no_wa_confirmation') }}"
                            placeholder="Format: 6281234567890">
                    </div>

                    <!-- Informasi Lainnya -->
                    <div class="form-group" style="grid-column: span 2;">
                        <label for="other_information">Informasi Lainnya</label>
                        <textarea name="other_information" id="other_information" rows="3">{{ old('other_information') }}</textarea>
                    </div>

                </div>

                <button class="btn-primary" type="submit">
                    <i class="fas fa-plus"></i> Tambah Acara
                </button>
            </form>
        </div>

        <!-- Event List -->
        <div class="card">
            <div class="card-title"><i class="fas fa-list"></i> Daftar Acara</div>

            <div class="table-container">
                <div style="overflow-x:auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Acara</th>
                                <th>Tanggal</th>
                                <th>Lokasi</th>
                                <th>Google Maps</th>
                                <th>Dresscode</th>
                                <th>WA Konfirmasi</th>
                                <th>Informasi Lainnya</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($events as $event)
                                <tr>
                                    <td>
                                        {{ $event->event_name_1 }}
                                        @if ($event->event_name_2)
                                            <br><small>{{ $event->event_name_2 }}</small>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y H:i') }}</td>
                                    <td>{{ $event->location }}</td>
                                    <td>
                                        @if ($event->link_googlemaps)
                                            <a href="{{ $event->link_googlemaps }}" target="_blank">Lihat Maps</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $event->dresscode ?? '-' }}</td>
                                    <td>{{ $event->no_wa_confirmation ?? '-' }}</td>
                                    <td>{{ $event->other_information ?? '-' }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('acara.edit', $event->id) }}" class="btn-icon btn-edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('acara.destroy', $event->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-icon btn-delete"
                                                    onclick="return confirm('Hapus acara ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" style="text-align:center;">Belum ada acara</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Grid untuk form */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        /* Table responsive */
        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container th,
        .table-container td {
            padding: 10px;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        .table-container th {
            background: #f7f7f7;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group[style*="grid-column: span 2;"] {
                grid-column: span 1 !important;
            }

            .page-title h1 {
                font-size: 20px;
            }

            .stat-info h3 {
                font-size: 18px;
            }

            .table-container th,
            .table-container td {
                font-size: 12px;
                padding: 8px;
            }
        }
    </style>
@endsection
