<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal TPL SVIPB - Dosen</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/dosen.css') }}">
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

  <div class="container">
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
      <div class="content-wrapper">

        <div class="grid-dosen">

    @foreach ($dosens as $dosen)
        <div class="card">
            <div class="blue-strip"></div>

            {{-- Foto Dosen --}}
            @if ($dosen->foto)
                <img src="{{ asset('storage/' . $dosen->foto) }}" class="profile-placeholder">
            @else
                <div class="profile-placeholder"></div>
            @endif

            <div class="info">
                <h3>{{ $dosen->nama }}</h3>
                <p>{{ $dosen->prodi }}</p>

                <span class="status aktif">Aktif</span>
            </div>

            <a href="{{ route('dosen.edit', $dosen->id) }}" class="edit-btn" type="button">
                Edit
            </a>
        </div>
    @endforeach

    {{-- Tombol Tambah Dosen --}}
    <button class="btn-tambahdosen" type="button"
        onclick="window.location.href='{{ route('dosen.create') }}'">
        + Tambah Dosen
    </button>
  </div>
</div>
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