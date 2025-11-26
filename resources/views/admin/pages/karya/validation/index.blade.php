<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal TPL SVIPB - Validasi Konten</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/validasikonten.css') }}">
  <style>
    /* Layout & Container */
    .content {
      padding: 2rem;
    }

    /* Grid 2 Kolom */
    .row {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 0.5rem;
      margin: 0;
    }

    /* Card Styling - Compact & Modern */
    .card {
      background: linear-gradient(135deg, #3b5998 0%, #4c6fb4 100%);
      border-radius: 12px;
      padding: 1.25rem 1.5rem;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 1rem;
      height: 85px;
    }

    .card:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    }

    .info {
      display: flex;
      align-items: center;
      gap: 1rem;
      flex: 1;
    }

    .info i {
      width: 45px;
      height: 45px;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      flex-shrink: 0;
      font-size: 1.2rem;
    }

    .info div {
      flex: 1;
    }

    .info strong {
      font-size: 1rem;
      font-weight: 600;
      color: white;
      display: block;
      margin-bottom: 0.25rem;
      line-height: 1.3;
    }

    .info small {
      font-size: 0.85rem;
      color: rgba(255, 255, 255, 0.85);
    }

    .edit-btn {
      background: white;
      color: #3b5998;
      padding: 0.6rem 1.5rem;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      font-size: 0.9rem;
      transition: all 0.3s;
      display: inline-block;
      border: 2px solid transparent;
      flex-shrink: 0;
    }

    .edit-btn:hover {
      background: transparent;
      color: white;
      border-color: white;
      transform: translateY(-2px);
    }

    /* Empty State */
    .empty-state {
      grid-column: 1 / -1;
      text-align: center;
      padding: 4rem 2rem;
      color: #64748b;
    }

    .empty-state i {
      font-size: 4rem;
      color: #cbd5e1;
      margin-bottom: 1rem;
    }

    .empty-state p {
      font-size: 1.1rem;
      margin: 0;
    }

    /* Responsive */
    @media (max-width: 1024px) {
      .row {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 768px) {
     .content {
  padding: 1rem 2rem; /* atas jadi lebih kecil */
}
      .card {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
        padding: 1.25rem;
      }

      .info {
        flex-direction: column;
        text-align: center;
      }

      .edit-btn {
        width: 100%;
        text-align: center;
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
    <div class="sidebar">
      <a href="{{ route('dashboard') }}">Dashboard</a>
      <a href="{{ route('karya.index') }}">Kelola Karya</a>
      <a href="{{ route('info-prodi.index') }}">Edit Info Profil</a>
      <a href="{{ route('karya.validasi') }}" class="active">Validasi Konten</a>
      <a href="{{ route('dosen.index') }}">Dosen</a>
      <a href="{{ route('admin.berita.index') }}">Berita</a>
      <a href="{{ route('admin.matakuliah.index') }}">Mata Kuliah</a>
      <a href ="{{ route('admin.review.index') }}">Kelola Review</a>
       @if (Auth::user()->role == "superadmin")
      <a href ="{{ route('admin.list') }}">Admin</a>
      @endif
    </div>

    <div class="content">
      <div class="row">
        @forelse ($karyas as $karya)
          <div class="card">
            <div class="info">
              <i data-feather="file-text"></i>
              <div>
                <strong>{{ $karya->judul }}</strong>
                <small>{{ $karya->tim_pembuat }}</small>
              </div>
            </div>
            <a href="{{ route('karya.form', $karya->id) }}" class="edit-btn">
              Validasi
            </a>
          </div>
        @empty
          <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <p>Tidak ada karya yang perlu divalidasi</p>
          </div>
        @endforelse
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