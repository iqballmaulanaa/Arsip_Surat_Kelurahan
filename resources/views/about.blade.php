@extends('layouts.app')

@section('content')
<h1>About</h1>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                <!-- Foto Anda -->
                <div class="mb-3">
                    <img src="https://via.placeholder.com/150x150/007bff/ffffff?text=FOTO" 
                         alt="Foto Developer" class="img-fluid rounded-circle">
                </div>
            </div>
            <div class="col-md-9">
                <p class="card-text">Aplikasi ini dibuat oleh:</p>
                <p><strong>Nama:</strong> [Nama Lengkap Anda]</p>
                <p><strong>Prodi:</strong> [Program Studi Anda]</p>
                <p><strong>NIM:</strong> [NIM Anda]</p>
                <p><strong>Tanggal Pembuatan:</strong> 26 September 2025</p>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">Teknologi yang Digunakan:</h5>
        <ul>
            <li>Laravel 12</li>
            <li>MySQL</li>
            <li>Bootstrap 5</li>
            <li>PHP 8.2+</li>
        </ul>
    </div>
</div>
@endsection