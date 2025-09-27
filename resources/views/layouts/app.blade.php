<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Arsip Surat - Kelurahan Karangduren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
        }
        .content {
            padding: 20px;
        }
        .table-actions {
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <div class="p-3">
                    <h4>Menu</h4>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('letters.index') }}">Arsip</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('categories.index') }}">Kategori Surat</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('about.index') }}">About</a>
    </li>
    
    <!-- Tambahkan menu admin jika perlu -->
    @auth
    <li class="nav-item mt-3">
        <small class="text-muted">Admin</small>
    </li>
    <li class="nav-item">
        <a class="nav-link text-warning" href="{{ route('about.edit') }}">✏️ Edit About</a>
    </li>
    @endauth
</ul>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 content">
                @yield('content')
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus arsip surat ini?');
        }
    </script>
    @stack('scripts')
</body>
</html>