<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal TPL SVIPB - Admin/Super Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
</head>

<body>

  <div class="nav-container1">
    <a href="/">
      <img src="{{ asset('images/logo_TPL.png') }}" alt="Logo TPL SVIPB" class="logo-TPL">
    </a>
  </div>

  <div class="nav-container2">
    <h2>Selamat Datang Di Portal Karya Teknologi Rekayasa Perangkat Lunak SV IPB</h2>
    <p>Syntax Error Compile Lagi</p>
  </div>

  <div class="layout">
    <aside class="sidebar">
      <a href="{{ 'dashboard' }}" class="active">Dashboard</a>
      <a href="{{ route('karya.index') }}">Kelola Karya</a>
     <a href="{{ route('info-prodi.index') }}">Edit Info Profil</a>
      <a href="{{ route('karya.validasi') }}">Validasi Konten</a>
      <a href ="{{ route('dosen.index') }}">Dosen</a>
      <a href ="{{ route('admin.berita.index') }}">Berita</a>
       <a href ="{{ route('admin.matakuliah.index') }}">Mata Kuliah</a>
    </aside>

    <main class="content">
      <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Berita</h2>
            <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">Tambah Berita</a>
        </div>

        @if($berita->count() > 0)
            @foreach ($berita as $item)
                <div class="card mb-4 shadow-sm">
                    <div style="display: flex; gap: 10px;">
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid rounded mb-3" alt="{{ $item->judul }}">
                        <div>
                            {{-- Judul --}}
                            <h4 class="mb-2">{{ $item->judul }}</h4>
    
                            {{-- Meta --}}
                            <p class="text-muted mb-2">
                                <i class="bi bi-person-fill"></i>
                                {{ $item->user->name ?? 'Admin' }}
                                &nbsp; | &nbsp;
                                <i class="bi bi-calendar-event-fill"></i>
                                {{ $item->tanggal_publikasi->translatedFormat('d F Y') }}
                            </p>
    
                            {{-- Excerpt --}}
                            <p>{{ $item->excerpt }}</p>
    
                            {{-- Aksi --}}
                            <a href="{{ route('admin.berita.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
    
                            <form action="{{ route('admin.berita.destroy', $item->id) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus berita ini?')">
                                    Hapus
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-muted">Tidak ada berita.</p>
        @endif
    </main>
  </div>

  <footer>
    <div class="footer-container">
      <div class="footer-left">
        <div class="location">
          <i data-feather="map-pin"></i>
          <div class="address">
            <p><strong>KAMPUS BOGOR</strong> — Jl. Raya Pajajaran, Kota Bogor, Jawa Barat 16128</p>
            <p><strong>KAMPUS SUKABUMI</strong> — Jl. Sarasa No. 46, Babakan, Kec. Cibeureum, Kota Sukabumi, Jawa Barat 43142</p>
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
    <script>feather.replace();</script>
  </footer>
</body>
</html>
