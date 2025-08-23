<!-- Sidebar -->
<div class="sidebar">
    <ul class="sidebar-menu">
        <li>
            <a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="/acara" class="{{ Request::is('acara*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt"></i> Acara
            </a>
        </li>
        <li>
            <a href="/tamu" class="{{ Request::is('tamu*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Daftar Tamu
            </a>
        </li>
    </ul>
</div>
