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
    .table-card {
      background: linear-gradient(135deg, #2d5aa8 0%, #3b6fd4 100%);
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      margin: 2rem auto;
      max-width: 1200px;
    }
    
    .table-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
      padding-bottom: 1rem;
      border-bottom: 2px solid rgba(255, 255, 255, 0.2);
    }
    
    .table-header h3 {
      color: white;
      font-size: 1.5rem;
      font-weight: 600;
      margin: 0;
    }
    
    .btn-tambah {
      background: white;
      color: #2d5aa8;
      border: none;
      padding: 0.6rem 1.2rem;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .btn-tambah:hover {
      background: #f0f7ff;
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    /* SEMESTER SLIDER */
    .semester-slider-container {
      margin-bottom: 1.5rem;
    }

    .slider-wrapper {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .slider-arrow {
      background: rgba(255, 255, 255, 0.9);
      border: none;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      flex-shrink: 0;
      color: #2d5aa8;
      font-size: 1.2rem;
    }

    .slider-arrow:hover:not(:disabled) {
      background: white;
      transform: scale(1.1);
    }

    .slider-arrow:disabled {
      opacity: 0.3;
      cursor: not-allowed;
    }

    .semester-tabs-overflow {
      overflow: hidden;
      flex: 1;
    }

    .semester-tabs {
      display: flex;
      gap: 0.75rem;
      transition: transform 0.3s ease;
    }

    .semester-tab {
      background: rgba(255, 255, 255, 0.2);
      border: 2px solid rgba(255, 255, 255, 0.3);
      color: white;
      padding: 0.75rem 1.5rem;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s;
      font-weight: 600;
      white-space: nowrap;
      flex-shrink: 0;
      min-width: 130px;
      text-align: center;
    }

    .semester-tab:hover {
      background: rgba(255, 255, 255, 0.3);
      transform: translateY(-2px);
    }

    .semester-tab.active {
      background: white;
      color: #2d5aa8;
      border-color: white;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }
    
    .table-container {
      background: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .data-table {
      width: 100%;
      border-collapse: collapse;
      margin: 0;
    }
    
    .data-table thead {
      background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
    }
    
    .data-table thead th {
      color: white;
      padding: 1rem;
      text-align: left;
      font-weight: 600;
      font-size: 0.95rem;
      border: none;
    }
    
    .data-table tbody td {
      padding: 1rem;
      border-bottom: 1px solid #e5e7eb;
      color: #1e293b;
      vertical-align: middle;
    }
    
    .data-table tbody tr:hover {
      background: #f8fafc;
    }
    
    .data-table tbody tr:last-child td {
      border-bottom: none;
    }
    
    .btn-action {
      padding: 0.5rem 1rem;
      border: none;
      border-radius: 6px;
      font-size: 0.875rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s;
      margin-right: 0.75rem;  
    }
    
    .btn-edit {
      background: #f59e0b;
      color: white;
    }
    
    .btn-edit:hover {
      background: #d97706;
      transform: translateY(-1px);
    }
    
    .btn-hapus {
      background: #ef4444;
      color: white;
    }
    
    .btn-hapus:hover {
      background: #dc2626;
      transform: translateY(-1px);
    }
    
    .modal-header {
      background: linear-gradient(135deg, #2d5aa8 0%, #3b6fd4 100%);
      color: white;
      border: none;
      border-radius: 10px 10px 0 0;
    }
    
    .modal-header .btn-close {
      filter: brightness(0) invert(1);
    }
    
    .modal-content {
      border-radius: 10px;
      border: none;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }
    
    .modal-title {
      font-weight: 600;
      font-size: 1.25rem;
    }
    
    .form-label {
      font-weight: 500;
      margin-bottom: 0.5rem;
      color: #1e293b;
    }
    
    .form-control, .form-select {
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      padding: 0.625rem 0.875rem;
    }
    
    .form-control:focus, .form-select:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
    }
    
    .modal-footer .btn {
      padding: 0.6rem 1.5rem;
      border-radius: 8px;
      font-weight: 500;
    }
    
    .btn-primary {
      background: linear-gradient(135deg, #2d5aa8 0%, #3b6fd4 100%);
      border: none;
    }
    
    .btn-primary:hover {
      background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
    }
    
    .btn-warning {
      background: #f59e0b;
      border: none;
      color: white;
    }
    
    .btn-warning:hover {
      background: #d97706;
    }
    
    .btn-secondary {
      background: #64748b;
      border: none;
    }
    
    .btn-secondary:hover {
      background: #475569;
    }
    
    .empty-state {
      text-align: center;
      padding: 3rem 1rem;
      color: #94a3b8;
    }
    
    .empty-state i {
      font-size: 3rem;
      margin-bottom: 1rem;
      color: #cbd5e1;
    }

    .semester-content {
      display: none;
    }

    .semester-content.active {
      display: block;
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
      <a href="{{ route('admin.berita.index') }}">Berita</a>
      <a href="{{ route('admin.matakuliah.index') }}" class="active">Mata Kuliah</a>
       @if (Auth::user()->role == "superadmin")
      <a href ="{{ route('admin.list') }}">Admin</a>
      @endif
    </aside>

    <main class="content">
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fas fa-check-circle"></i> {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <div class="table-card">
        <div class="table-header">
          <h3><i class="fas fa-book"></i> Kelola Mata Kuliah</h3>
          <button type="button" class="btn-tambah" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-plus"></i> Tambah Mata Kuliah
          </button>
        </div>

        <div class="semester-slider-container">
          <div class="slider-wrapper">
            <button class="slider-arrow" id="prevBtn" onclick="slideLeft()">
              <i class="fas fa-chevron-left"></i>
            </button>
            
            <div class="semester-tabs-overflow">
              <div class="semester-tabs" id="semesterTabs">
                @for($i = 1; $i <= 8; $i++)
                  <div class="semester-tab {{ $i == 1 ? 'active' : '' }}" onclick="showSemester({{ $i }})">
                    Semester {{ $i }}
                  </div>
                @endfor
              </div>
            </div>

            <button class="slider-arrow" id="nextBtn" onclick="slideRight()">
              <i class="fas fa-chevron-right"></i>
            </button>
          </div>
        </div>

        <!-- SEMESTER CONTENT -->
        @for($semester = 1; $semester <= 8; $semester++)
        <div class="semester-content {{ $semester == 1 ? 'active' : '' }}" id="semester{{ $semester }}">
          <div class="table-container">
            <table class="data-table">
              <thead>
                <tr>
                  <th style="width: 5%;">No</th>
                  <th style="width: 12%;">Kode</th>
                  <th style="width: 40%;">Mata Kuliah</th>
                  <th style="width: 10%;">SKS</th>
                  <th style="width: 33%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $semesterData = $matakuliahs->where('semester', $semester);
                  $no = 1;
                @endphp
                
                @forelse($semesterData as $mk)
                <tr>
                  <td style="text-align: center;">{{ $no++ }}</td>
                  <td><strong>{{ $mk->kode_matkul }}</strong></td>
                  <td>{{ $mk->nama_matkul }}</td>
                  <td>{{ $mk->sks_teori }}-{{ $mk->sks_praktik }}</td>
                  <td>
                    <button type="button" class="btn-action btn-edit" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modalEdit{{ $mk->id }}">
                      <i class="fas fa-edit"></i> Edit
                    </button>
                    
                    <form action="{{ route('admin.matakuliah.destroy', $mk->id) }}" 
                          method="POST" 
                          style="display:inline;"
                          onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn-action btn-hapus">
                        <i class="fas fa-trash"></i> Hapus
                      </button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5">
                    <div class="empty-state">
                      <i class="fas fa-inbox"></i>
                      <p>Belum ada mata kuliah di Semester {{ $semester }}</p>
                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        <i class="fas fa-plus"></i> Tambah Sekarang
                      </button>
                    </div>
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        @endfor

      </div>
    </main>
  </div>

  <!-- MODAL TAMBAH -->
  <div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Tambah Mata Kuliah Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form action="{{ route('admin.matakuliah.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Kode Mata Kuliah <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="kode_matkul" placeholder="Contoh: TPL1101" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Nama Mata Kuliah <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="nama_matkul" placeholder="Contoh: Berpikir Komputasional" required>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">SKS Teori <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="sks_teori" placeholder="Contoh: 2" min="0" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">SKS Praktik <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="sks_praktik" placeholder="Contoh: 1" min="0" required>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Semester <span class="text-danger">*</span></label>
              <select class="form-select" name="semester" required>
                <option value="">-- Pilih Semester --</option>
                @for($i = 1; $i <= 8; $i++)
                  <option value="{{ $i }}">Semester {{ $i }}</option>
                @endfor
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="fas fa-times"></i> Batal
            </button>
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save"></i> Simpan Data
            </button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- MODAL EDIT (LOOP) -->
  @foreach($matakuliahs as $mk)
  <div class="modal fade" id="modalEdit{{ $mk->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Mata Kuliah</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form action="{{ route('admin.matakuliah.update', $mk->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Kode Mata Kuliah <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="kode_matkul" value="{{ $mk->kode_matkul }}" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Nama Mata Kuliah <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="nama_matkul" value="{{ $mk->nama_matkul }}" required>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">SKS Teori <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="sks_teori" value="{{ $mk->sks_teori }}" min="0" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">SKS Praktik <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="sks_praktik" value="{{ $mk->sks_praktik }}" min="0" required>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Semester <span class="text-danger">*</span></label>
              <select class="form-select" name="semester" required>
                @for($i = 1; $i <= 8; $i++)
                  <option value="{{ $i }}" {{ $mk->semester == $i ? 'selected' : '' }}>Semester {{ $i }}</option>
                @endfor
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="fas fa-times"></i> Batal
            </button>
            <button type="submit" class="btn btn-warning">
              <i class="fas fa-save"></i> Update Data
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach

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
  
  <script>
    let currentSlide = 0;
    const tabWidth = 146; // 130px width + 16px gap

    function showSemester(semester) {
      // Hide all content
      document.querySelectorAll('.semester-content').forEach(content => {
        content.classList.remove('active');
      });
      
      // Remove active from all tabs
      document.querySelectorAll('.semester-tab').forEach(tab => {
        tab.classList.remove('active');
      });
      
      // Show selected content and activate tab
      document.getElementById('semester' + semester).classList.add('active');
      document.querySelectorAll('.semester-tab')[semester - 1].classList.add('active');
      
      // Update slide position to show active tab
      currentSlide = semester - 1;
      updateSliderPosition();
    }

    function slideLeft() {
      if (currentSlide > 0) {
        currentSlide--;
        updateSliderPosition();
      }
    }

    function slideRight() {
      if (currentSlide < 7) {
        currentSlide++;
        updateSliderPosition();
      }
    }

    function updateSliderPosition() {
      const tabs = document.getElementById('semesterTabs');
      tabs.style.transform = `translateX(-${currentSlide * tabWidth}px)`;
      
      // Update button states
      document.getElementById('prevBtn').disabled = currentSlide === 0;
      document.getElementById('nextBtn').disabled = currentSlide === 7;
    }

    // Initialize
    updateSliderPosition();
  </script>
</body>
</html>