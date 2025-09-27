@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Edit About</h1>
    <a href="{{ route('about.index') }}" class="btn btn-secondary">Kembali</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" 
                       value="{{ old('name', $about->name) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="study_program" class="form-label">Program Studi</label>
                <input type="text" class="form-control" id="study_program" name="study_program" 
                       value="{{ old('study_program', $about->study_program) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" 
                       value="{{ old('nim', $about->nim) }}" required>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="mb-3">
                <label for="creation_date" class="form-label">Tanggal Pembuatan</label>
                <input type="date" class="form-control" id="creation_date" name="creation_date" 
                       value="{{ old('creation_date', \Carbon\Carbon::parse($about->creation_date)->format('Y-m-d')) }}" 
                       required>
            </div>
            
            <div class="mb-3">
                <label for="photo" class="form-label">Foto Developer</label>
                <input type="file" class="form-control" id="photo" name="photo" 
                       accept="image/*">
                @if($about->photo_path)
                    <div class="form-text">Foto saat ini: 
                        <a href="{{ asset('storage/' . $about->photo_path) }}" target="_blank">Lihat</a>
                    </div>
                @endif
            </div>
    
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('about.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</form>
@endsection