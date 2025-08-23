@extends('layouts.main')
@section('container')
    <!-- Main Content -->
    <div class="main-content">
        <div class="page-title">
            <h1><i class="fas fa-edit"></i> Edit Acara</h1>
        </div>

        <div class="card">
            <h2 class="card-title"><i class="fas fa-pencil-alt"></i> Ubah Acara</h2>

            <form action="{{ route('acara.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-grid">

                    <!-- Nama Acara 1 -->
                    <div class="form-group">
                        <label for="eventName1">Nama Acara 1</label>
                        <input type="text" name="event_name_1" id="eventName1"
                            value="{{ old('event_name_1', $event->event_name_1) }}" required>
                    </div>

                    <!-- Foto 1 -->
                    <div class="form-group">
                        <label for="eventPhoto1">Foto 1</label>
                        @if($event->event_photo_1)
                            <div>
                                <img src="{{ asset('storage/' . $event->event_photo_1) }}" alt="Foto 1"
                                    class="preview-img">
                            </div>
                        @endif
                        <input type="file" name="event_photo_1" id="eventPhoto1" accept="image/*">
                        <small>Kosongkan jika tidak ingin mengganti</small>
                    </div>

                    <!-- Nama Acara 2 -->
                    <div class="form-group">
                        <label for="eventName2">Nama Acara 2 (Optional)</label>
                        <input type="text" name="event_name_2" id="eventName2"
                            value="{{ old('event_name_2', $event->event_name_2) }}">
                    </div>

                    <!-- Foto 2 -->
                    <div class="form-group">
                        <label for="eventPhoto2">Foto 2 (Optional)</label>
                        @if($event->event_photo_2)
                            <div>
                                <img src="{{ asset('storage/' . $event->event_photo_2) }}" alt="Foto 2"
                                    class="preview-img">
                            </div>
                        @endif
                        <input type="file" name="event_photo_2" id="eventPhoto2" accept="image/*">
                        <small>Kosongkan jika tidak ingin mengganti</small>
                    </div>

                    <!-- Tanggal Acara -->
                    <div class="form-group">
                        <label for="eventDate">Tanggal Acara</label>
                        <input type="datetime-local" name="event_date" id="eventDate"
                            value="{{ old('event_date', \Carbon\Carbon::parse($event->event_date)->format('Y-m-d\TH:i')) }}"
                            required>
                    </div>

                    <!-- Lokasi -->
                    <div class="form-group">
                        <label for="eventLocation">Lokasi Acara</label>
                        <input type="text" name="location" id="eventLocation"
                            value="{{ old('location', $event->location) }}" required>
                    </div>

                    <!-- Link Google Maps -->
                    <div class="form-group">
                        <label for="link_googlemaps">Link Google Maps</label>
                        <input type="url" name="link_googlemaps" id="link_googlemaps"
                            value="{{ old('link_googlemaps', $event->link_googlemaps) }}">
                    </div>

                    <!-- Dresscode -->
                    <div class="form-group">
                        <label for="dresscode">Dresscode</label>
                        <input type="text" name="dresscode" id="dresscode"
                            value="{{ old('dresscode', $event->dresscode) }}"
                            placeholder="Contoh: Formal, Batik, Putih Hitam">
                    </div>

                    <!-- No WhatsApp -->
                    <div class="form-group">
                        <label for="no_wa_confirmation">No WhatsApp Konfirmasi</label>
                        <input type="text" name="no_wa_confirmation" id="no_wa_confirmation"
                            value="{{ old('no_wa_confirmation', $event->no_wa_confirmation) }}"
                            placeholder="Format: 6281234567890">
                    </div>

                    <!-- Informasi Lainnya -->
                    <div class="form-group full-width">
                        <label for="other_information">Informasi Lainnya</label>
                        <textarea name="other_information" id="other_information" rows="3">{{ old('other_information', $event->other_information) }}</textarea>
                    </div>

                </div>

                <div class="form-actions">
                    <button class="btn-primary" type="submit">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('acara.index') }}" class="btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <style>
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
            font-size: 14px;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        .preview-img {
            width: 100%;
            max-width: 150px;
            border-radius: 6px;
            margin-bottom: 8px;
        }

        .form-actions {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        .form-actions .btn-primary,
        .form-actions .btn-secondary {
            padding: 10px 16px;
            border-radius: 6px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full-width {
                grid-column: span 1;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions .btn-primary,
            .form-actions .btn-secondary {
                width: 100%;
            }
        }
    </style>
@endsection
