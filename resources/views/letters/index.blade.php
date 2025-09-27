@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Arsip Surat</h1>
    <a href="{{ route('letters.create') }}" class="btn btn-primary">Arsipkan Surat</a>
</div>

<p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>

<hr>

<!-- Search Form -->
<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">Cari surat</h5>
        <form method="GET" action="{{ route('letters.index') }}">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari surat..." value="{{ $search }}">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- Letters Table -->
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nomor Surat</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Waktu Pengarsipan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($letters as $letter)
            <tr>
                <td>{{ $letter->letter_number }}</td>
                <td>{{ $letter->category->name }}</td>
                <td>{{ $letter->title }}</td>
                <td>{{ $letter->upload_date }}</td>
                <td class="table-actions">
                    <form action="{{ route('letters.destroy', $letter->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                    <a href="{{ route('letters.download', $letter->id) }}" class="btn btn-sm btn-success">Unduh</a>
                    <a href="{{ route('letters.show', $letter->id) }}" class="btn btn-sm btn-info">Lihat >></a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data surat</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus arsip surat ini?');
    }
</script>
@endpush
