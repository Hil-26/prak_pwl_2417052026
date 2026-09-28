@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="distro-card">
            <div class="distro-header d-flex align-items-center">
                <span class="terminal-btn btn-close-term"></span>
                <span class="terminal-btn btn-min-term"></span>
                <span class="terminal-btn btn-max-term"></span>
                <span class="text-secondary ms-2 small">bash --init: create_user.sh</span>
            </div>

            <div class="card-body p-4">
                <div class="mb-4">
                    <h5 class="fw-bold terminal-green mb-1"><i class="bi bi-terminal me-2"></i>CREATE NEW USER RECORD</h5>
                    <p class="text-secondary small mb-0">> Please supply input parameters below to write into database</p>
                </div>

                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nama" class="form-label text-light small fw-bold">
                            <span class="terminal-green">$</span> INPUT_NAME:
                        </label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="e.g. John Doe" required autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="npm" class="form-label text-light small fw-bold">
                            <span class="terminal-green">$</span> INPUT_NPM:
                        </label>
                        <input type="text" class="form-control" id="npm" name="npm" placeholder="e.g. 2417052000" required autocomplete="off">
                    </div>

                    <div class="mb-4">
                        <label for="kelas_id" class="form-label text-light small fw-bold">
                            <span class="terminal-green">$</span> SELECT_CLASS_GROUP:
                        </label>
                        <select class="form-select" name="kelas_id" id="kelas_id" required>
                            <option value="" disabled selected>-- Select Group Target --</option>
                            @foreach ($kelas as $kelasItem)
                                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-2">
                        <a href="{{ route('user.index') }}" class="btn btn-outline-secondary btn-sm px-3">
                            <i class="bi bi-arrow-left me-1"></i> [ abort ]
                        </a>
                        <button type="submit" class="btn btn-sm px-4 fw-bold" style="background-color: #00ff66; color: #0d1117;">
                            <i class="bi bi-check2-circle me-1"></i> [ execute / store ]
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection