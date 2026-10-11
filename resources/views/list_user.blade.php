@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div>
        <h4 class="fw-bold terminal-green mb-1">
            <i class="bi bi-hdd-network-fill me-2"></i>SYSTEM USER DIRECTORY
        </h4>
        <span class="text-secondary small">> Querying joined data from table 'user' and 'kelas'...</span>
    </div>
    <a href="{{ route('user.create') }}" class="btn btn-sm px-3 fw-bold shadow-sm" style="background-color: #00ff66; color: #0d1117;">
        <i class="bi bi-plus-lg me-1"></i> [ + add_user ]
    </a>
</div>

{{-- Alert Notifikasi Sukses / Error --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show bg-dark border-success text-success d-flex align-items-center mb-4 shadow" role="alert" style="border-width: 1px;">
        <i class="bi bi-check-circle-fill me-2 fs-5"></i>
        <div class="flex-grow-1">
            <strong>[SUCCESS]</strong> {{ session('success') }}
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show bg-dark border-danger text-danger d-flex align-items-center mb-4 shadow" role="alert" style="border-width: 1px;">
        <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
        <div class="flex-grow-1">
            <strong>[ERROR]</strong> {{ session('error') }}
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Memanggil komponen dinamis tabel distro --}}
<x-user-table :users="$users" />
@endsection