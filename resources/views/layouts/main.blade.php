<!DOCTYPE html>
<html lang="id">
@include('layouts.head')
<body>
    @include('layouts.header')

    <!-- Dashboard Container -->
    <div class="dashboard-container">
        @include('layouts.sidebar')

        @yield('container')
    </div>

    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <i class="fas fa-check-circle"></i>
        <span id="toast-message">Link berhasil disalin ke clipboard</span>
    </div>

    @include('layouts.script')
</body>
</html>