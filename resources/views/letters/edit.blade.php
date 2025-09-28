@extends('layouts.app')

@section('content')
<h1>Edit Surat</h1>

<form action="{{ route('letters.update', $letter->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="letter_number" class="form-label">Nomor Surat</label>
        <input type="text" name="letter_number" id="letter_number"
               class="form-control" value="{{ old('letter_number', $letter->letter_number) }}" required>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Kategori</label>
        <select name="category_id" id="category_id" class="form-select" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ $category->id == $letter->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Judul Surat</label>
        <input type="text" name="title" id="title"
               class="form-control" value="{{ old('title', $letter->title) }}" required>
    </div>

    <div class="mb-3">
        <label for="file" class="form-label">File PDF (opsional jika ingin ganti)</label>
        <input type="file" name="file" id="file" class="form-control" accept="application/pdf">
        @if($letter->file_path)
            <small>File saat ini: <a href="{{ asset('storage/' . $letter->file_path) }}" target="_blank">Lihat PDF</a></small>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <a href="{{ route('letters.show', $letter->id) }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
