@extends('layouts.app')

@section('content')
<h1>Arsip Surat >> Lihat</h1>

<div class="card mb-4">
    <div class="card-body">
        <p><strong>Nomor:</strong> {{ $letter->letter_number }}</p>
        <p><strong>Kategori:</strong> {{ $letter->category->name }}</p>
        <p><strong>Judul:</strong> {{ $letter->title }}</p>
        <p><strong>Waktu Unggah:</strong> 
            {{ $letter->upload_date->timezone('Asia/Jakarta')->format('Y-m-d H:i') }} WIB
        </p>
    </div>
</div>

<!-- Preview PDF -->
<div class="mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Preview Dokumen</h5>
        </div>
        <div class="card-body">
            <iframe 
                src="{{ asset('storage/' . $letter->file_path) }}" 
                width="100%" 
                height="600px" 
                style="border: none;">
            </iframe>
        </div>
    </div>
</div>

<hr>

<!-- Tombol Aksi -->
<div class="d-flex gap-2 mt-3">
    <a href="{{ route('letters.index') }}" class="btn btn-secondary"><< Kembali</a>
    <a href="{{ route('letters.download', $letter->id) }}" class="btn btn-success">Unduh</a>
    <a href="{{ route('letters.edit', $letter->id) }}" class="btn btn-warning">Edit/Ganti File</a>
</div>
@endsection
