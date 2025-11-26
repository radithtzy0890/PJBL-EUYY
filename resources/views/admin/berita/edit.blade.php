<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Berita - Portal TPL SVIPB</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/validasikonten1.css') }}">
</head>

<body>

  <div class="nav-container1">
    <img src="{{ asset('images/logo_TPL.png') }}" alt="Logo TPL" class="logo-TPL">
  </div>

  <div class="nav-container2">
    <h2>Selamat Datang Di Portal Berita Teknologi Rekayasa Perangkat Lunak SV IPB</h2>
    <p>Syntax Error Compile Lagi</p>
  </div>

  <div class="container">
    <div class="sidebar">
      <a href="{{ 'dashboard' }}" class="active">Dashboard</a>
      <a href="{{ route('karya.index') }}">Kelola Karya</a>
      <a href="{{ route('info-prodi.index') }}">Edit Info Profil</a>
      <a href="{{ route('karya.validasi') }}">Validasi Konten</a>
      <a href="{{ route('dosen.index') }}">Dosen</a>
      <a href="{{ route('admin.berita.index') }}">Berita</a>
      <a href="{{ route('admin.matakuliah.index') }}">Mata Kuliah</a>
      @if (Auth::user()->role == "admin")
        <a href="{{ route('admin.list') }}">Admin</a>
      @endif
    </div>

    <div class="content">
      <h2 class="title-halaman">Edit Berita</h2>

      <div class="form-container">

        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <label>Judul Berita</label>
          <input type="text" name="judul" value="{{ $berita->judul }}" required>

          <label>Tanggal Publikasi</label>
          <input type="date" name="tanggal_publikasi"
            value="{{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->format('Y-m-d') }}" required>

          <label>Gambar Saat Ini</label>
          @if($berita->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}"
              style="width:250px; border-radius:10px; margin-bottom:15px;">
          @else
            <p><i>Tidak ada gambar</i></p>
          @endif

          <label>Upload Gambar Baru (optional)</label>
          <input type="file" name="gambar">

          <label>Isi Berita</label>
          <textarea name="isi" rows="8" required>{{ $berita->isi }}</textarea>

          <div style="text-align:center">
            <button type="submit" class="btn-submit">Update Berita</button>
          </div>

          <div class="cancel-wrapper">
            <a href="{{ route('admin.berita.index') }}" class="btn-cancel">
              Batal
            </a>
          </div>

        </form>

      </div>
    </div>
  </div>


  <footer>
    <div class="footer-container">
      <div class="footer-left">
        <div class="location">
          <i data-feather="map-pin"></i>
          <div class="address">
            <p><strong>KAMPUS BOGOR</strong> — Jl. Raya Pajajaran, Kota Bogor, Jawa Barat 16128</p>
            <p><strong>KAMPUS SUKABUMI</strong> — Jl. Sarasa No. 46, Babakan, Kec. Cibeureum, Kota Sukabumi, Jawa Barat
              43142</p>
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