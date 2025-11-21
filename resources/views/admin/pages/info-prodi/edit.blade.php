<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal TPL SV IPB - Edit Info Prodi</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>

  <link rel="stylesheet" href="{{ asset('css/admin/infoprodi.css') }}">

  <style>
    /* Style tambahan kecil biar match dengan index */
    .content {
      background: white;
      border-radius: 12px;
      padding: 2.5rem;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .title-halaman {
      font-size: 1.8rem;
      font-weight: 600;
      color: #2d3748;
      margin-bottom: 2rem;
      padding-bottom: 1rem;
      border-bottom: 3px solid #3b6fd4;
    }

    .form-container {
      background: #f7fafc;
      padding: 2rem;
      border-radius: 12px;
      border: 1px solid #e2e8f0;
    }

    .form-container label {
      font-weight: 600;
      margin-bottom: 0.5rem;
      display: block;
    }

    .form-container input[type="text"],
    .form-container input[type="file"] {
      width: 100%;
      padding: 0.9rem;
      border-radius: 8px;
      border: 2px solid #e2e8f0;
      margin-bottom: 1.4rem;
      font-size: 0.95rem;
    }

    .form-container input:focus {
      border-color: #3b6fd4;
      box-shadow: 0 0 0 3px rgba(59, 111, 212, 0.15);
      outline: none;
    }

    .btn-submit {
      background: linear-gradient(135deg, #4c6398 0%, #5b75b4 100%);
      padding: 0.9rem 2.2rem;
      border-radius: 8px;
      color: white;
      border: none;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn-submit:hover {
      transform: translateY(-2px);
      background: linear-gradient(135deg, #3f5382 0%, #5069a3 100%);
    }

  </style>
</head>

<body>

  <!-- NAV 1 -->
  <div class="nav-container1">
    <a href="/">
      <img src="{{ asset('images/logo_TPL.png') }}" alt="Logo TPL SVIPB" class="logo-TPL">
    </a>
  </div>

  <!-- NAV 2 -->
  <div class="nav-container2">
    <h2>Selamat Datang Di Portal Karya Teknologi Rekayasa Perangkat Lunak SV IPB</h2>
    <p>Syntax Error Compile Lagi</p>
  </div>

  <!-- PAGE LAYOUT -->
  <div class="container">
    
    <!-- SIDEBAR -->
    <aside class="sidebar">
      <a href="{{ route('dashboard') }}">Dashboard</a>
      <a href="{{ route('karya.index') }}">Kelola Karya</a>
      <a href="{{ route('info-prodi.index') }}" class="active">Edit Info Profil</a>
      <a href="{{ route('karya.validasi') }}">Validasi Konten</a>
      <a href="{{ route('dosen.index') }}">Dosen</a>
      <a href="{{ route('admin.berita.index') }}">Berita</a>
      <a href="{{ route('admin.matakuliah.index') }}">Mata Kuliah</a>
    </aside>

    <!-- CONTENT -->
    <main class="content">
      <h2 class="title-halaman">Edit Info Prodi</h2>

      <div class="form-container">
        <form action="{{ route('info-prodi.update', $profil->kode_prodi) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          @switch($type)

            @case('video')
              <label>Upload Video Baru</label>
              <input type="file" name="video" accept="video/*">
            @break

            @case('visi-misi')
              <label>Visi</label>
              <input type="text" name="visi" value="{{ $profil->visi }}" placeholder="Masukkan visi baru">

              <label>Misi</label>
              <input type="text" name="misi" value="{{ $profil->misi }}" placeholder="Masukkan misi baru">
            @break

            @case('capaian')
              <label>Capaian</label>
              <input type="text" name="capaian" value="{{ $profil->capaian }}" placeholder="Masukkan capaian baru">
            @break

          @endswitch

          <button class="btn-submit" type="submit">Perbarui</button>

        </form>
      </div>
    </main>

  </div>

  <!-- FOOTER -->
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
