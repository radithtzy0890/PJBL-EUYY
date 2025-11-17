<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Karya - Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
  <style>
    .form-container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      max-width: 800px;
      margin: 30px auto;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: 500;
    }
    input, select, textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 14px;
      box-sizing: border-box;
    }
    textarea {
      min-height: 100px;
      resize: vertical;
    }
    .btn-submit {
      background-color: #28a745;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }
    .btn-cancel {
      background-color: #6c757d;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-left: 10px;
      text-decoration: none;
      display: inline-block;
    }
    .error {
      color: #dc3545;
      font-size: 12px;
      margin-top: 5px;
    }
  </style>
</head>

<body>
  <div class="nav-container1">
    <img src="{{ asset('images/logo_TPL.png') }}" alt="Logo TPL" class="logo-TPL">
  </div>

  <div class="nav-container2">
    <h2>Tambah Karya Baru</h2>
    <p>Isi form di bawah untuk menambahkan karya mahasiswa</p>
    
    <div style="position: absolute; top: 20px; right: 20px; color: white;">
      <span>Halo, {{ Auth::user()->name }}</span>
      <a href="{{ route('logout') }}" style="color: #ff6b6b; margin-left: 15px; text-decoration: none;">Logout</a>
    </div>
  </div>

  <div class="form-container">
    @if ($errors->any())
      <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
        <strong>Oops! Ada yang salah:</strong>
        <ul style="margin: 10px 0 0 20px;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.karya.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      
      {{-- Judul Karya --}}
      <div class="form-group">
        <label for="judul">Judul Karya <span style="color: red;">*</span></label>
        <input type="text" id="judul" name="judul" value="{{ old('judul') }}" required 
               placeholder="Contoh: Sistem Informasi Pengelolaan Data Mahasiswa">
        @error('judul')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      {{-- Kategori --}}
      <div class="form-group">
        <label for="kategori">Kategori <span style="color: red;">*</span></label>
        <select id="kategori" name="kategori" required>
          <option value="">Pilih Kategori</option>
          <option value="Web Development" {{ old('kategori') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
          <option value="Mobile Apps" {{ old('kategori') == 'Mobile Apps' ? 'selected' : '' }}>Mobile Apps</option>
          <option value="Data Science" {{ old('kategori') == 'Data Science' ? 'selected' : '' }}>Data Science</option>
          <option value="IoT" {{ old('kategori') == 'IoT' ? 'selected' : '' }}>Internet of Things</option>
          <option value="Game Development" {{ old('kategori') == 'Game Development' ? 'selected' : '' }}>Game Development</option>
          <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
        </select>
        @error('kategori')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      {{-- Deskripsi --}}
      <div class="form-group">
        <label for="deskripsi">Deskripsi <span style="color: red;">*</span></label>
        <textarea id="deskripsi" name="deskripsi" required 
                  placeholder="Jelaskan detail tentang karya ini...">{{ old('deskripsi') }}</textarea>
        @error('deskripsi')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      {{-- Tim Pembuat --}}
      <div class="form-group">
        <label for="tim_pembuat">Tim Pembuat <span style="color: red;">*</span></label>
        <input type="text" id="tim_pembuat" name="tim_pembuat" value="{{ old('tim_pembuat') }}" required 
               placeholder="Contoh: Salsabila dan Tim Syntax Error">
        @error('tim_pembuat')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      {{-- Tahun --}}
      <div class="form-group">
        <label for="tahun">Tahun <span style="color: red;">*</span></label>
        <select id="tahun" name="tahun" required>
          <option value="">Pilih Tahun</option>
          @for ($year = date('Y'); $year >= 2020; $year--)
            <option value="{{ $year }}" {{ old('tahun', date('Y')) == $year ? 'selected' : '' }}>
              {{ $year }}
            </option>
          @endfor
        </select>
        @error('tahun')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      {{-- Link Pengumpulan (Google Drive, dll) --}}
      <div class="form-group">
        <label for="link_pengumpulan">Pengumpulan (Link/PDF)</label>
        <input type="url" id="link_pengumpulan" name="link_pengumpulan" value="{{ old('link_pengumpulan') }}" 
               placeholder="https://drive.google.com/karya123">
        <small style="color: #666;">Link Google Drive, GitHub, atau URL lainnya</small>
        @error('link_pengumpulan')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      {{-- Upload Gambar --}}
      <div class="form-group">
        <label for="preview_karya">Screenshot/Gambar Karya</label>
        <input type="file" id="preview_karya" name="preview_karya" accept="image/*">
        <small style="color: #666;">Format: JPG, PNG, max 2MB</small>
        @error('preview_karya')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      {{-- Buttons --}}
      <button type="submit" class="btn-submit">
        <i data-feather="save"></i> Simpan ke Validasi
      </button>
      <a href="{{ route('kelolakarya') }}" class="btn-cancel">
        <i data-feather="x"></i> Batal
      </a>
    </form>
  </div>

  <script>feather.replace();</script>
</body>
</html>