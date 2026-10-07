@props(['users'])

<div class="distro-card overflow-hidden">
    <div class="distro-header d-flex align-items-center justify-content-between">
        <div>
            <span class="terminal-btn btn-close-term"></span>
            <span class="terminal-btn btn-min-term"></span>
            <span class="terminal-btn btn-max-term"></span>
            <span class="text-secondary ms-2 small">cat /etc/passwd | grep users</span>
        </div>
        <span class="badge bg-dark border border-success text-success small"><i class="bi bi-lightning-charge-fill me-1"></i>CRUD-ENABLED</span>
    </div>

    <div class="table-responsive p-0">
        <table class="table table-dark table-hover align-middle mb-0" style="background-color: #161b22;">
            <thead>
                <tr class="text-uppercase small border-bottom border-secondary text-secondary">
                    <th class="ps-4 py-3" style="width: 70px;">#ID</th>
                    <th>USER_NAME</th>
                    <th>NPM_IDENTIFIER</th>
                    <th>CLASS_GROUP</th>
                    <th class="text-center pe-4" style="width: 230px;">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-bottom border-dark">
                        <td class="ps-4 terminal-cyan fw-bold">{{ $user->id }}</td>
                        <td class="text-light fw-bold">
                            <span class="terminal-green">~#</span> {{ $user->nama ?? $user->name }}
                        </td>
                        <td>
                            <code class="px-2 py-1 rounded bg-black text-warning border border-dark">{{ $user->npm ?? $user->nim }}</code>
                        </td>
                        <td>
                            <span class="badge rounded-pill bg-black border border-success terminal-green px-3 py-1">
                                {{ $user->nama_kelas }}
                            </span>
                        </td>
                        <td class="text-center pe-4">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-outline-warning d-inline-flex align-items-center px-2 py-1" style="font-size: 0.78rem; border-color: #e3b341;" title="Edit Data User">
                                    <i class="bi bi-pencil-square me-1"></i> [ edit ]
                                </a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini: {{ $user->nama ?? $user->name }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center px-2 py-1" style="font-size: 0.78rem; border-color: #ff5f56;" title="Hapus Data User">
                                        <i class="bi bi-trash3-fill me-1"></i> [ delete ]
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-secondary">
                            <i class="bi bi-exclamation-triangle-fill terminal-yellow fs-4 d-block mb-2"></i>
                            [0 rows matched: Database empty. Run ./create_user to insert records]
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>