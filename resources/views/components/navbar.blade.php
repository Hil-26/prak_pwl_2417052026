<nav class="navbar navbar-expand-lg border-bottom border-dark" style="background-color: #161b22;">
    <div class="container">
        <a class="navbar-brand fw-bold text-light d-flex align-items-center" href="{{ route('user.index') }}">
            <i class="bi bi-terminal-fill me-2 terminal-green"></i>
            <span>PWL<span class="terminal-green">@arch-distro</span>:~$</span>
        </a>
        <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDistro">
            <i class="bi bi-list terminal-green fs-3"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarDistro">
            <ul class="navbar-nav ms-auto gap-2">
                <li class="nav-item">
                    <a class="nav-link px-3 rounded {{ request()->is('user') ? 'terminal-green fw-bold bg-dark' : 'text-secondary' }}" href="{{ route('user.index') }}">
                        <i class="bi bi-table me-1"></i> [ ./list_users ]
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 rounded {{ request()->is('user/create') ? 'terminal-green fw-bold bg-dark' : 'text-secondary' }}" href="{{ route('user.create') }}">
                        <i class="bi bi-node-plus-fill me-1"></i> [ ./create_user ]
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 rounded {{ request()->is('matakuliah') ? 'terminal-green fw-bold bg-dark' : 'text-secondary' }}" href="{{ route('matakuliah.index') }}">
                        <i class="bi bi-journal-code me-1"></i> [ ./list_mk ]
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 rounded {{ request()->is('matakuliah/create') ? 'terminal-green fw-bold bg-dark' : 'text-secondary' }}" href="{{ route('matakuliah.create') }}">
                        <i class="bi bi-journal-plus me-1"></i> [ ./create_mk ]
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>