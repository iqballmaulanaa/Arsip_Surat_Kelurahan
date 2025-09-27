@extends('layouts.app')

@section('content')
<h1>Arsip Surat >> Unggah</h1>

<p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
<strong>Catatan:</strong><br>
- Gunakan file berformat PDF</p>

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

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('letters.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="letter_number" class="form-label">Nomor Surat</label>
                <input type="text" class="form-control" id="letter_number" name="letter_number" 
                       value="{{ old('letter_number') }}" required>
            </div>
            
            <div class="mb-3">
                <label for="category_id" class="form-label">Kategori</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" name="title" 
                       value="{{ old('title') }}" required>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="mb-3">
                <label for="file" class="form-label">File Surat (PDF)</label>
                <input type="file" class="form-control" id="file" name="file" 
                       accept=".pdf" required>
                <div class="form-text">Hanya file PDF yang diizinkan. Maksimal 2MB.</div>
            </div>
            
            <div class="mb-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Preview Kategori Tersedia:</h6>
                        <ul class="list-unstyled">
                            @foreach($categories as $category)
                                <li><strong>{{ $category->name }}:</strong> {{ $category->description }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="d-flex gap-2">
        <a href="{{ route('letters.index') }}" class="btn btn-secondary"><< Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
@endsection