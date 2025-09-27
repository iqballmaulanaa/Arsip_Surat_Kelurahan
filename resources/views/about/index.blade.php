@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>About</h1>
    @auth
    <a href="{{ route('about.edit') }}" class="btn btn-warning">Edit About</a>
    @endauth
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                <!-- Foto Developer -->
                <div class="mb-3">
                    @if($about->photo_path)
                        <img src="{{ asset('storage/' . $about->photo_path) }}" 
                             alt="Foto Developer" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/150x150/007bff/ffffff?text=FOTO" 
                             alt="Foto Developer" class="img-fluid rounded-circle">
                    @endif
                </div>
            </div>
            <div class="card-body">
<p><strong>Nama:</strong> {{ $about->name ?? '[Nama Lengkap Anda]' }}</p>
<p><strong>Prodi:</strong> {{ $about->study_program ?? '[Program Studi Anda]' }}</p>
<p><strong>NIM:</strong> {{ $about->nim ?? '[NIM Anda]' }}</p>
<p><strong>Tanggal Pembuatan:</strong> 
    {{ $about->creation_date ? \Carbon\Carbon::parse($about->creation_date)->translatedFormat('d F Y') : '[Tanggal Belum Diisi]' }}
</p>

    <a href="{{ route('about.edit') }}" class="btn btn-primary">Edit</a>
</div>

        </div>
    </div>
</div>

@endsection