<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal TPL SV IPB - Dosen</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/ajuankarya.css') }}">
  <style>
    /* Styling untuk card list */
    .card-list {
      display: grid;
      gap: 20px;
      margin-top: 24px;
    }

    .validated-card {
      background: white;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.2s;
    }

    .validated-card:hover {
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    }

    .judul-karya {
      font-size: 18px;
      font-weight: 600;
      color: #1e293b;
      margin-bottom: 8px;
    }

    .pembuat {
      color: #64748b;
      font-size: 14px;
      margin-bottom: 16px;
    }

    .pembuat strong {
      color: #3b82f6;
    }

    /* Styling untuk tombol aksi */
    .action-buttons {
      display: flex;
      gap: 12px;
      margin-top: 16px;
    }

    .btn-hapus {
      background: #ef4444;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: 500;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: background 0.2s;
      font-family: 'Poppins', sans-serif;
    }

    .btn-hapus:hover {
      background: #dc2626;
    }

    .btn-lihat-detail {
      background: #3b82f6;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: 500;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
      text-decoration: none;
      transition: background 0.2s;
      font-family: 'Poppins', sans-serif;
    }

    .btn-lihat-detail:hover {
      background: #2563eb;
      color: white;
    }
  </style>
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
      <a href="{{ route('dashboard') }}" class="active">Dashboard</a>
      <a href="{{ route('karya.index') }}">Kelola Karya</a>
      <a href="{{ route('info-prodi.index') }}">Info Prodi</a>
      <a href="{{ route('karya.validasi') }}">Validasi Konten</a>
      <a href="{{ route('dosen.index') }}">Dosen</a>
      <a href="{{ route('admin.berita.index') }}">Berita</a>
      <a href="{{ route('admin.matakuliah.index') }}">Mata Kuliah</a>
    </div>

    <div class="content">
      <h2 class="page-title">Daftar Ajuan Karya</h2>

      <div class="card-list">
        @foreach ($karyas as $karya)
          <div class="validated-card">
            <h4 class="judul-karya">{{ $karya->judul }}</h4>
            <p class="pembuat">Oleh: <strong>{{ $karya->tim_pembuat }}</strong></p>
            
            <div class="action-buttons">
              <form action="{{ route('karya.destroy', $karya->id) }}" method="post" style="margin: 0;">
                @csrf
                @method("delete")
                <button class="btn-hapus" type="submit">
                  <i data-feather="trash-2" style="width: 16px; height: 16px;"></i>
                  Hapus
                </button>
              </form>
              <a href="{{ route('karya.show', $karya->id) }}" class="btn-lihat-detail">
                <i data-feather="eye" style="width: 16px; height: 16px;"></i>
                Lihat
              </a> 
            </div>
          </div>
        @endforeach
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