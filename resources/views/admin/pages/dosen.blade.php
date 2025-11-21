<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal TPL SVIPB - Dosen</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/dosen.css') }}">
  <style>
    /* Card styling yang mirip screenshot */
    .grid-dosen {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.5rem;
      padding: 2rem;
      max-width: 1400px;
      margin: 0 auto;
    }

    .card {
      background: white;
      border-radius: 12px;
      padding: 1.5rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      border-left: 5px solid #3b6fd4;
      position: relative;
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .card:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .blue-strip {
      position: absolute;
      left: 0;
      top: 0;
      width: 5px;
      height: 100%;
      background: linear-gradient(135deg, #2d5aa8 0%, #3b6fd4 100%);
      border-radius: 12px 0 0 12px;
    }

    .profile-placeholder {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #e2e8f0;
      background: #e2e8f0;
      flex-shrink: 0;
    }

    .info {
      flex: 1;
    }

    .info h3 {
      font-size: 1rem;
      font-weight: 600;
      color: #1e293b;
      margin-bottom: 0.3rem;
      line-height: 1.3;
    }

    .info p {
      font-size: 0.85rem;
      color: #64748b;
      margin-bottom: 0.5rem;
      line-height: 1.4;
    }

    .status {
      display: inline-block;
      padding: 0.25rem 0.7rem;
      border-radius: 20px;
      font-size: 0.75rem;
      font-weight: 500;
    }

    .status.aktif {
      background: #d1fae5;
      color: #065f46;
    }

    /* Tombol di samping kanan */
    .action-buttons {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    .btn-action {
      padding: 0.5rem 1.2rem;
      border: none;
      border-radius: 6px;
      font-size: 0.875rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s;
      text-decoration: none;
      text-align: center;
      display: block;
      min-width: 80px;
    }

    .btn-edit {
      background: #5850b8;
      color: white;
    }

    .btn-edit:hover {
      background: #4a3f9f;
      transform: translateY(-1px);
      color: white;
    }

    .btn-hapus {
      background: #ef4444;
      color: white;
    }

    .btn-hapus:hover {
      background: #dc2626;
      transform: translateY(-1px);
    }

    /* Tombol Tambah Dosen */
    .btn-tambahdosen {
      background: linear-gradient(135deg, #2d5aa8 0%, #3b6fd4 100%);
      color: white;
      border: none;
      padding: 2rem;
      border-radius: 12px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: 0 4px 12px rgba(45, 90, 168, 0.3);
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      grid-column: 1 / -1;
    }

    .btn-tambahdosen:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(45, 90, 168, 0.4);
    }

    /* Responsive */
    @media (max-width: 1200px) {
      .grid-dosen {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 768px) {
      .grid-dosen {
        grid-template-columns: 1fr;
        padding: 1rem;
      }

      .card {
        flex-direction: column;
        text-align: center;
      }

      .info {
        text-align: center;
      }

      .action-buttons {
        flex-direction: row;
        width: 100%;
        gap: 0.5rem;
      }

      .btn-action {
        flex: 1;
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
      <a href="{{ route('info-prodi.index') }}">Edit Info Profil</a>
      <a href="{{ route('karya.validasi') }}">Validasi Konten</a>
      <a href="{{ route('dosen.index') }}" class="active">Dosen</a>
      <a href="{{ route('admin.berita.index') }}">Berita</a>
      <a href="{{ route('admin.matakuliah.index') }}">Mata Kuliah</a>
    </aside>

    <main class="content">
      <div class="content-wrapper">
        <div class="grid-dosen">

          @foreach ($dosens as $dosen)
            <div class="card">
              <div class="blue-strip"></div>

              {{-- Foto Dosen --}}
              @if ($dosen->foto)
                <img src="{{ asset('storage/' . $dosen->foto) }}" class="profile-placeholder" alt="{{ $dosen->nama }}">
              @else
                <div class="profile-placeholder"></div>
              @endif

              <div class="info">
                <h3>{{ $dosen->nama }}</h3>
                <p>{{ $dosen->prodi }}</p>
                <span class="status aktif">Aktif</span>
              </div>

              {{-- Tombol Aksi (Edit & Hapus) --}}
              <div class="action-buttons">
                <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn-action btn-edit">
                  Edit
                </a>
                
                <form action="{{ route('dosen.destroy', $dosen->id) }}" 
                      method="POST" 
                      style="margin: 0;"
                      onsubmit="return confirm('Yakin ingin menghapus dosen {{ $dosen->nama }}?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-action btn-hapus">
                    Hapus
                  </button>
                </form>
              </div>
            </div>
          @endforeach

          {{-- Tombol Tambah Dosen --}}
          <button class="btn-tambahdosen" type="button"
            onclick="window.location.href='{{ route('dosen.create') }}'">
            <i class="fas fa-plus-circle"></i> Tambah Dosen
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