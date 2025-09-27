@extends('layouts.app')

@section('content')
<h1>Kategori Surat >> Tambah</h1>

<p>Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"</p>

<hr>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">ID (Auto Increment)</label>
                <input type="text" class="form-control" value="Auto" disabled readonly>
                <div class="form-text">ID akan otomatis generated oleh sistem</div>
            </div>
            
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name" 
                       value="{{ old('name') }}" required>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="mb-3">
                <label for="description" class="form-label">Keterangan</label>
                <textarea class="form-control" id="description" name="description" 
                          rows="4" required>{{ old('description') }}</textarea>
                <div class="form-text">Judul Kategori ini digunakan untuk surat yang sifatnya berupa pengumuman atau menginformasikan suatu perihal.</div>
            </div>
        </div>
    </div>
    
    <div class="d-flex gap-2">
        <a href="{{ route('categories.index') }}" class="btn btn-secondary"><< Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
@endsection