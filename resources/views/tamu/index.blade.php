@extends('layouts.main')
@section('container')
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
                                <td onclick="copyToClipboard('{{ url($guest->slug) }}')" style="cursor:pointer;"
                                    title="Klik untuk salin">
                                    {{ url($guest->slug) }}
                                </td>

                                <td class="text-center">
                                    <!-- Tombol Salin -->
                                    <button type="button"
                                        class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1 shadow-sm"
                                        onclick="copyToClipboard('{{ url($guest->slug) }}')" title="Salin Link">
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Link berhasil disalin!',
                    showConfirmButton: false,
                    timer: 2000
                });
            }).catch(err => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Gagal menyalin link!'
                });
            });
        }
    </script>


@endsection
