<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal TPL SVIPB - Dosen</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/validasikonten1.css') }}">
</head>

<body>

  <div class="nav-container1">
    <img src="{{ asset('images/logo_TPL.png') }}" alt="Logo TPL SVIPB" class="logo-TPL">
  </div>

  <div class="nav-container2">
    <h2>Selamat Datang Di Portal Karya Teknologi Rekayasa Perangkat Lunak SV IPB</h2>
    <p>Syntax Error Compile Lagi</p>
  </div>

  <div class="container">
    <div class="sidebar">
      <a href="{{ route('karya.index') }}" class="active">Kelola Karya</a>
      <a href="{{ route('dashboard') }}">Dashboard</a>
      <a href="{{ route('info-prodi.index') }}">Info Prodi</a>
      <a href="{{ route('karya.validasi') }}">Validasi Konten</a>
      <a href="{{ route('dosen.index') }}">Dosen</a>
       <a href ="{{ route('admin.berita.index') }}">Berita</a>
       <a href ="{{ route('admin.matakuliah.index') }}">Mata Kuliah</a>
        @if (Auth::user()->role == "superadmin")
      <a href ="{{ route('admin.list') }}">Admin</a>
      @endif
    </div>

    <div class="content">
      <h2 class="title-halaman">Validasi Karya</h2>

      <div class="form-container">
        <form action="{{ route("karya.update", $karya->id) }}" method="POST">
          @csrf
          @method("PUT")
          <label>Judul Karya</label>
          <input type="text" name="judul" value="{{ $karya->judul }}">

          <label>Tahun</label>
          <input type="number" name="tahun" value="{{ $karya->tahun }}">

          <label>Deskripsi</label>
          <textarea name="deskripsi">{{ $karya->deskripsi }}</textarea>

          <label>Tim Pembuat</label>
          <input type="text" name="tim_pembuat" value="{{ $karya->tim_pembuat }}">

          <label>Pengumpulan (Link/PDF)</label>
          <input type="text" name="link_pengumpulan" value="{{ $karya->link_pengumpulan }}">

          <label for="statusx">Status</label>
          <select id="status" name="status_validasi">
            <option value="accepted">Terima</option>
            <option value="rejected">Tolak</option>
          </select>

          <button class="btn-submit" type="submit">Validasi</button>
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
