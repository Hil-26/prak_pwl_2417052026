@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Mata Kuliah</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('matakuliah.update', $mk->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama_mk">Nama Mata Kuliah:</label><br>
        <input type="text" id="nama_mk" name="nama_mk" value="{{ old('nama_mk', $mk->nama_mk) }}" required><br><br>

        <label for="sks">SKS:</label><br>
        <input type="number" id="sks" name="sks" value="{{ old('sks', $mk->sks) }}" required><br><br>

        <button type="submit">Update</button>
    </form>
</div>
@endsection
