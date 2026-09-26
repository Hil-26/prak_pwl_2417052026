@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div>
        <h4 class="fw-bold terminal-green mb-1">
            <i class="bi bi-hdd-network-fill me-2"></i>SYSTEM USER DIRECTORY
        </h4>
        <span class="text-secondary small">> Querying joined data from table 'user' and 'kelas'[cite: 1]...</span>
    </div>
    <a href="{{ route('user.create') }}" class="btn btn-sm px-3 fw-bold" style="background-color: #00ff66; color: #0d1117;">
        <i class="bi bi-plus-lg me-1"></i> [ + add_user ]
    </a>
</div>

{{-- Memanggil komponen dinamis tabel distro --}}
<x-user-table :users="$users" />
@endsection