<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portal TPL SVIPB - Kelola Karya</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #f4f6fc;
            margin: 0;
            padding: 0;
        }

        /* NAV */
        .nav-container1 {
            background: white;
            padding: 14px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        .logo-TPL {
            height: 48px;
        }

        .nav-container2 {
            text-align: center;
            padding: 18px;
        }

        /* SIDEBAR */
        .container {
            display: flex;
        }

        .sidebar {
            width: 230px;
            background: #1e3a8a;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
        }

        .sidebar a {
            display: block;
            padding: 14px 24px;
            color: white;
            text-decoration: none;
            margin-bottom: 6px;
            transition: .2s;
        }

        .sidebar a:hover,
        .sidebar .active {
            background: #2746a0;
        }

        /* CONTENT */
        .content {
            margin-left: 260px;
            padding: 28px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 26px;
        }

        .column h3 {
            margin-bottom: 14px;
        }

        /* CARD BIRU */
        .card {
            background: #1e3a8a;
            padding: 18px;
            border-radius: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            margin-bottom: 14px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        .info {
            display: flex;
            gap: 12px;
        }

        .info i {
            width: 26px;
            color: white;
        }

        .status {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 13px;
            color: white;
        }

        .status.sukses {
            background: #22c55e;
        }

        .status.ditolak {
            background: #ef4444;
        }

        .edit-btn {
            background: white;
            border: none;
            padding: 6px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.2s;
        }

        .edit-btn:hover {
            background: #e5e5e5;
            transform: scale(1.05);
        }

        /* TAMBAH KARYA */
        .btn-tambahkarya {
            background: #1e3a8a;
            color: white;
            padding: 14px 26px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            cursor: pointer;
            display: block;
            margin: 40px auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: .2s;
        }

        .btn-tambahkarya:hover {
            background: #2746a0;
            transform: translateY(-3px);
        }
    </style>
</head>

<body>
    <div class="nav-container1">
        <a href="/"><img src="{{ asset('images/logo_TPL.png') }}" class="logo-TPL"></a>
    </div>

    <div class="nav-container2">
        <h2>Selamat Datang Di Portal Karya Teknologi Rekayasa Perangkat Lunak SV IPB</h2>
        <p>Syntax Error Compile Lagi</p>
    </div>

    <div class="container">
        <aside class="sidebar">
            <a href="{{ 'dashboard' }}">Dashboard</a>
            <a class="active" href="{{ route('karya.index') }}">Kelola Karya</a>
            <a href="{{ route('info-prodi.index') }}">Edit Info Profil</a>
            <a href="{{ route('karya.validasi') }}">Validasi Konten</a>
            <a href="{{ route('dosen.index') }}">Dosen</a>
            <a href="{{ route('admin.berita.index') }}">Berita</a>
            <a href="{{ route('admin.matakuliah.index') }}">Mata Kuliah</a>
        </aside>
    </div>

    <div class="content">

        <div class="grid-container">

            {{-- Karya Disetujui --}}
            <div class="column">
                <h3>Karya Disetujui</h3>

                @forelse($karya->where('status_validasi','disetujui') as $item)
                    <div class="card">
                        <div class="info">
                            <i data-feather="file-text"></i>
                            <div>
                                <strong>{{ $item->judul }}</strong><br>
                                <small>{{ $item->user->name ?? 'Anonim' }}</small>
                            </div>
                        </div>
                        <div class="right-side">
                            <span class="status sukses">Disetujui</span>
                            <button class="edit-btn"
                                onclick="window.location.href='{{ route('admin.karya.show',$item->id) }}'">Lihat</button>
                        </div>
                    </div>
                @empty
                    <p>Tidak ada karya.</p>
                @endforelse
            </div>

            {{-- Karya Ditolak --}}
            <div class="column">
                <h3>Karya Ditolak</h3>

                @forelse($karya->where('status_validasi','ditolak') as $item)
                    <div class="card">
                        <div class="info">
                            <i data-feather="file-text"></i>
                            <div>
                                <strong>{{ $item->judul }}</strong><br>
                                <small>{{ $item->user->name ?? 'Anonim' }}</small>
                            </div>
                        </div>

                        <div class="right-side">
                            <span class="status ditolak">Ditolak</span>
                            <button class="edit-btn"
                                onclick="window.location.href='{{ route('admin.karya.show',$item->id) }}'">Lihat</button>
                        </div>
                    </div>
                @empty
                    <p>Tidak ada karya.</p>
                @endforelse
            </div>

        </div>

        <button class="btn-tambahkarya"
            onclick="window.location.href='{{ route('admin.karya.create') }}'">+ Tambah Karya</button>

    </div>

    <script>
        feather.replace();
    </script>

</body>

</html>
