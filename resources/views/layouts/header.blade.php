<!-- Header & Navigation -->
<header>
    <div class="container">
        <nav class="navbar">
            <a href="#" class="logo">
                <i class="fas fa-envelope"></i> INVITY
            </a>

            <div class="user-menu">
                <div class="user-info">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-email">{{ Auth::user()->email }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </nav>
    </div>
</header>
