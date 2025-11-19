<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal TPL SVIPB - Dosen</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/infoprodi1.css') }}">
</head>

<body>
  <!-- NAVIGATION -->
  <div class="nav-container1">
    <img src="{{ asset('images/logo_TPL.png') }}" alt="Logo TPL SVIPB" class="logo-TPL">
  </div>

  <div class="nav-container2">
    <h2>Selamat Datang Di Portal Karya Teknologi Rekayasa Perangkat Lunak SV IPB</h2>
    <p>Syntax Error Compile Lagi</p>
  </div>

  <div class="container">
    <div class="sidebar">
      <a href="{{ route('dashboard') }}">Dashboard</a>
      <a href="{{ route('karya.index') }}">Kelola Karya</a>
      <a href="{{ route('info-prodi.index') }}" class="active">Info Profil</a>
      <a href="{{ route('karya.validasi') }}">Validasi Konten</a>
      <a href ="{{ route('dosen.index') }}">Dosen</a>
    </div>

<div class="content">
    <h2 class="title-halaman">Info Prodi</h2>
    <div class="form-container">
        <form action="{{ route('info-prodi.update', $profil->kode_prodi) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @switch($type)
                @case('video')
                    <label>Video</label>
                    <input type="file" name="video" accept="video/*">
                    @break
                @case('capaian')
                    <label>Capaian</label>
                    <input type="text" placeholder="Unggah Capaian baru" name="capaian" value={{ $profil->capaian }}>
                    @break
                @case('visi-misi')
                    <label>Visi Misi</label>
                    <input type="text" placeholder="Visi" value="{{ $profil->visi }}" name="visi">
                    <input type="text" placeholder="Misi" value="{{ $profil->misi }}" name="misi">
                    @break
            @endswitch
            <button class="btn-submit" type="submit">Perbarui</button>
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