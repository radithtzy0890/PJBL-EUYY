<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal TPL SVIPB - Info Prodi</title>
  <script src="https://unpkg.com/feather-icons"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/admin/infoprodi.css') }}">
  <style>
    /* OVERRIDE CARD STYLING AJA */
    .card-container {
      display: flex;
      flex-direction: column;
      gap: 1.25rem;
      padding: 1rem 0;
    }

    .card {
      background: linear-gradient(135deg, #4c6398 0%, #5b75b4 100%) !important;
      border-radius: 12px !important;
      padding: 1.5rem 2rem !important;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15) !important;
      transition: all 0.3s ease !important;
      display: flex !important;
      justify-content: space-between !important;
      align-items: center !important;
      gap: 1.5rem !important;
      height: 90px !important;
      border: none !important;
    }

    .card:hover {
      transform: translateY(-3px) !important;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25) !important;
    }

    .card .left {
      display: flex !important;
      align-items: center !important;
    }

    .card .notif-icon {
      width: 50px !important;
      height: 50px !important;
      background: rgba(255, 255, 255, 0.2) !important;
      border-radius: 10px !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      color: white !important;
    }

    .card .notif-icon i {
      width: 28px !important;
      height: 28px !important;
      stroke-width: 2 !important;
    }

    .card .right {
      flex: 1 !important;
      display: flex !important;
      justify-content: space-between !important;
      align-items: center !important;
    }

    .card .right h3 {
      font-size: 1.3rem !important;
      font-weight: 600 !important;
      color: white !important;
      margin: 0 !important;
    }

    .card .edit-btn {
      background: white !important;
      color: #4c6398 !important;
      padding: 0.65rem 1.8rem !important;
      border-radius: 8px !important;
      text-decoration: none !important;
      font-weight: 600 !important;
      font-size: 0.95rem !important;
      transition: all 0.3s !important;
      display: inline-block !important;
      border: 2px solid white !important;
    }

    .card .edit-btn:hover {
      background: transparent !important;
      color: white !important;
      transform: translateY(-2px) !important;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .card {
        height: auto !important;
        flex-direction: column !important;
        padding: 1.5rem !important;
        gap: 1rem !important;
      }

      .card .right {
        flex-direction: column !important;
        gap: 1rem !important;
        width: 100% !important;
      }

      .card .right h3 {
        text-align: center !important;
      }

      .card .edit-btn {
        width: 100% !important;
        text-align: center !important;
      }
    }
  </style>
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
      <a href="{{ route('dashboard') }}">Dashboard</a>
      <a href="{{ route('karya.index') }}">Kelola Karya</a>
      <a href="{{ route('info-prodi.index') }}" class="active">Edit Info Profil</a>
      <a href="{{ route('karya.validasi') }}">Validasi Konten</a>
      <a href="{{ route('dosen.index') }}">Dosen</a>
      <a href="{{ route('admin.berita.index') }}">Berita</a>
      <a href="{{ route('admin.matakuliah.index') }}">Mata Kuliah</a>
      <a href ="{{ route('admin.review.index') }}">Kelola Review</a>
       @if (Auth::user()->role == "admin")
      <a href ="{{ route('admin.list') }}">Admin</a>
      @endif
    </aside>

    <main class="content">
      <div class="card-container">

        <div class="card">
          <div class="left">
            <div class="notif-icon">
              <i data-feather="image"></i>
            </div>
          </div>
          <div class="right">
            <h3>Vidio</h3>
            <a href="{{ route('info-prodi.editType', ['kodeProdi' => $profil->kode_prodi, 'type' => 'video']) }}" class="edit-btn">Edit</a>
          </div>
        </div>

        <div class="card">
          <div class="left">
            <div class="notif-icon">
              <i data-feather="target"></i>
            </div>
          </div>
          <div class="right">
            <h3>Visi Misi</h3>
            <a href="{{ route('info-prodi.editType', ['kodeProdi' => $profil->kode_prodi, 'type' => 'visi-misi']) }}" class="edit-btn">Edit</a>
          </div>
        </div>

        <div class="card">
          <div class="left">
            <div class="notif-icon">
              <i data-feather="check-circle"></i>
            </div>
          </div>
          <div class="right">
            <h3>Capaian</h3>
            <a href="{{ route('info-prodi.editType', ['kodeProdi' => $profil->kode_prodi, 'type' => 'capaian']) }}" class="edit-btn">Edit</a>
          </div>
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