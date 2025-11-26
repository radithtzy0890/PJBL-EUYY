<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portal TPL SVIPB - Kelola Karya</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="{{ asset('css/admin/kelolakarya.css') }}">
</head>

<body>

    {{-- NAVIGASI --}}
    <div class="nav-container1">
        <a href="/">
            <img src="{{ asset('images/logo_TPL.png') }}" alt="Logo TPL SVIPB" class="logo-TPL">
        </a>
    </div>

    <div class="nav-container2">
        <h2>Selamat Datang Di Portal Karya Teknologi Rekayasa Perangkat Lunak SV IPB</h2>
        <p>Syntax Error Compile Lagi</p>
    </div>

    {{-- LAYOUT UTAMA --}}
    <div class="container">

        {{-- SIDEBAR --}}
        <div class="sidebar">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('karya.index') }}" class="active">Kelola Karya</a>
            <a href="{{ route('info-prodi.index') }}">InfoProdi</a>
            <a href="{{ route('karya.validasi') }}">Validasi Konten</a>
            <a href="{{ route('dosen.index') }}">Dosen</a>
            <a href="{{ route('admin.berita.index') }}">Berita</a>
            <a href="{{ route('admin.matakuliah.index') }}">Mata Kuliah</a>
            <a href ="{{ route('admin.review.index') }}">Kelola Review</a>
             @if (Auth::user()->role == "superadmin")
      <a href ="{{ route('admin.list') }}">Admin</a>
      @endif
        </div>

        {{-- KONTEN --}}
        <div class="content">

            {{-- Pesan Sukses --}}
            @if (session('success'))
                <div class="alert alert-success">
                    <strong>✓ Berhasil!</strong> {{ session('success') }}
                </div>
            @endif

            {{-- Tombol Tambah Karya --}}
            <div style="margin: 20px; text-align: right; width: 100%;">
                <a href="{{ route('karya.create') }}"
                    style="background: #007bff; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                    <i data-feather="plus"></i> Tambah Karya
                </a>
            </div>

            {{-- GRID --}}
            <div class="grid-container">

                {{-- Karya Disetujui --}}
                <div class="column sukses">
                    <h3>Karya Disetujui</h3>

                    @forelse($accepted as $a)
                        <div class="card">
                            <div class="info">
                                <i data-feather="file-text"></i>
                                <div>
                                    <strong>{{ $a->judul }}</strong><br>
                                    <small>{{ $a->user->name ?? 'Anonim' }}</small>
                                </div>
                            </div>

                            <div class="right-side">
                                <span class="status sukses">Disetujui</span>
                                <a href="{{ route('karya.show', $a->id) }}" class="edit-btn">
                                    Lihat
                                </a>
                            </div>
                        </div>
                    @empty
                        <p>Tidak ada karya disetujui.</p>
                    @endforelse
                </div>

                {{-- Karya Ditolak --}}
                <div class="column ditolak">
                    <h3>Karya Ditolak</h3>

                    @forelse($rejected as $r)
                        <div class="card">
                            <div class="info">
                                <i data-feather="file-text"></i>
                                <div>
                                    <strong>{{ $r->judul }}</strong><br>
                                    <small>{{ $r->user->name ?? 'Anonim' }}</small>
                                </div>
                            </div>

                            <div class="right-side">
                                <span class="status ditolak">Ditolak</span>
                                <a href="{{ route('karya.show', $r->id) }}" class="edit-btn">
                                    Lihat
                                </a>
                            </div>
                        </div>
                    @empty
                        <p>Tidak ada karya ditolak.</p>
                    @endforelse
                </div>

            </div>

        </div>
    </div>

    {{-- FOOTER --}}
    <footer>
        <div class="footer-container">

            <div class="footer-left">
                <div class="location">
                    <i data-feather="map-pin"></i>
                    <div class="address">
                        <p><strong>KAMPUS BOGOR</strong> — Jl. Raya Pajajaran, Kota Bogor, Jawa Barat 16128</p>
                        <p><strong>KAMPUS SUKABUMI</strong> — Jl. Sarasa No. 46, Babakan, Cibeureum, Kota Sukabumi</p>
                    </div>
                </div>
            </div>

            <div class="footer-right">
                <div class="contact-item">
                    <i data-feather="phone"></i>
                    <span>(0251) 8348007</span>
                </div>
                <div class="contact-item">
                    <i data-feather="mail"></i>
                    <span>sv@apps.ipb.ac.id</span>
                </div>
            </div>

        </div>

        <hr>

        <div class="footer-bottom">
            <p>© 2025 IPB University — Sekolah Vokasi</p>
        </div>

        <script>
            feather.replace();
        </script>
    </footer>

</body>

</html>
x