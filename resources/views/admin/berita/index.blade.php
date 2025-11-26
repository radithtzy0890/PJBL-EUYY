<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal TPL SVIPB - Admin/Super Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
  <style>
    /* --- CSS UTAMA --- */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }

    .berita-card {
      background: linear-gradient(135deg, #2d5aa8 0%, #3b6fd4 100%);
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      margin-bottom: 2rem;
    }
    
    .berita-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
      padding-bottom: 1rem;
      border-bottom: 2px solid rgba(255, 255, 255, 0.2);
    }
    
    .berita-header h3 {
      color: white;
      font-size: 1.5rem;
      font-weight: 600;
      margin: 0;
    }
    
    .btn-tambah-berita {
      background: white;
      color: #2d5aa8;
      border: none;
      padding: 0.7rem 1.5rem;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      text-decoration: none;
      display: inline-block;
    }
    
    .btn-tambah-berita:hover {
      background: #f0f7ff;
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      color: #2d5aa8;
    }
    
    .berita-item {
      background: white;
      border-radius: 10px;
      padding: 1.5rem;
      margin-bottom: 1rem;
      display: flex;
      gap: 1.5rem;
      align-items: flex-start;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: all 0.3s;
    }
    
    .berita-item:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    }
    
    .berita-image {
      width: 200px; /* Saya kecilkan sedikit biar proporsional */
      height: 140px;
      object-fit: cover;
      border-radius: 8px;
      flex-shrink: 0;
    }
    
    .berita-content {
      flex: 1;
    }
    
    .berita-title {
      font-size: 1.3rem;
      font-weight: 600;
      color: #1e293b;
      margin-bottom: 0.5rem;
      line-height: 1.3;
    }
    
    .berita-meta {
      color: #64748b;
      font-size: 0.9rem;
      margin-bottom: 0.75rem;
    }
    
    .berita-excerpt {
      color: #475569;
      line-height: 1.6;
      margin-bottom: 1rem;
      font-size: 0.95rem;
    }
    
    /* --- PERBAIKAN TOMBOL DI SINI --- */
    .berita-actions {
      display: flex;
      gap: 0.5rem;
      flex-wrap: wrap;
      align-items: center; /* KUNCI UTAMA: Agar tombol tidak melar ke atas */
    }

    /* Pastikan form tidak nambah margin aneh */
    .berita-actions form {
        margin: 0;
        padding: 0;
        display: flex;
    }
    
    .btn-action {
      /* Bikin ukuran konsisten */
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      
      height: 38px; /* Tinggi pasti */
      padding: 0 1.2rem; /* Lebar lewat padding */
      
      border: none;
      border-radius: 6px;
      font-size: 0.875rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.2s;
      text-decoration: none;
      line-height: 1;
    }
    
    .btn-lihat {
      background: #4299e1;
      color: white;
    }
    
    .btn-lihat:hover {
      background: #3182ce;
      color: white;
      transform: translateY(-1px);
    }
    
    .btn-edit {
      background: #f59e0b;
      color: white;
    }
    
    .btn-edit:hover {
      background: #d97706;
      color: white;
      transform: translateY(-1px);
    }
    
    .btn-hapus {
      background: #ef4444;
      color: white;
    }
    
    .btn-hapus:hover {
      background: #dc2626;
      color: white;
      transform: translateY(-1px);
    }
    
    .empty-state {
      text-align: center;
      padding: 3rem 1rem;
      color: white;
    }
    
    .empty-state i {
      font-size: 3rem;
      margin-bottom: 1rem;
      opacity: 0.7;
    }
    
    /* Responsive */
    @media (max-width: 968px) {
      .berita-item {
        flex-direction: column;
      }
      
      .berita-image {
        width: 100%;
        height: 200px;
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

  <div class="layout">
    <aside class="sidebar">
      <a href="{{ route('dashboard') }}">Dashboard</a>
      <a href="{{ route('karya.index') }}">Kelola Karya</a>
      <a href="{{ route('info-prodi.index') }}">Edit Info Profil</a>
      <a href="{{ route('karya.validasi') }}">Validasi Konten</a>
      <a href="{{ route('dosen.index') }}">Dosen</a>
      <a href="{{ route('admin.berita.index') }}" class="active">Berita</a>
      <a href="{{ route('admin.matakuliah.index') }}">Mata Kuliah</a>
      <a href ="{{ route('admin.review.index') }}">Kelola Review</a>
       @if (Auth::user()->role == "superadmin")
      <a href ="{{ route('admin.list') }}">Admin</a>
      @endif
    </aside>

    <main class="content">
      <div class="berita-card">
        <div class="berita-header">
          <h3><i class="fas fa-newspaper"></i> Daftar Berita</h3>
          <a href="{{ route('admin.berita.create') }}" class="btn-tambah-berita">
            <i class="fas fa-plus"></i> Tambah Berita
          </a>
        </div>

        @if($berita->count() > 0)
          @foreach ($berita as $item)
            <div class="berita-item">
              <img src="{{ asset('storage/' . $item->gambar) }}" 
                   class="berita-image" 
                   alt="{{ $item->judul }}">
              
              <div class="berita-content">
                <h4 class="berita-title">{{ $item->judul }}</h4>
                
                <p class="berita-meta">
                  <i class="fas fa-user"></i> {{ $item->user->name ?? 'Admin' }}
                  &nbsp;|&nbsp;
                  <i class="fas fa-calendar"></i> {{ $item->tanggal_publikasi->translatedFormat('d F Y') }}
                </p>
                
                <p class="berita-excerpt">{{ $item->excerpt }}</p>
                
                <div class="berita-actions">
                  <a href="{{ route('admin.berita.show', $item->id) }}" class="btn-action btn-lihat">
                    <i class="fas fa-eye"></i> Lihat
                  </a>
                  
                  <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn-action btn-edit">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  
                  <form action="{{ route('admin.berita.destroy', $item->id) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action btn-hapus">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
        @else
          <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <p>Belum ada berita</p>
            <a href="{{ route('admin.berita.create') }}" class="btn-tambah-berita">
              <i class="fas fa-plus"></i> Tambah Berita Sekarang
            </a>
          </div>
        @endif
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
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>feather.replace();</script>
</body>
</html>