<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal TPL SV IPB - Karya</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/kelolakarya3.css') }}">
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

    <aside class="sidebar">
      <a href="{{ route('dashboard') }}">Dashboard</a>
      <a href="{{ route('karya.index') }}">Kelola Karya</a>
      <a href="{{ route('info-prodi.index') }}">Edit Info Profil</a>
      <a href="{{ route('karya.validasi') }}">Validasi Konten</a>
      <a href="{{ route('dosen.index') }}">Dosen</a>
      <a href="{{ route('admin.berita.index') }}">Berita</a>
      <a href="{{ route('admin.matakuliah.index') }}">Mata Kuliah</a>
      <a href ="{{ route('admin.review.index') }}">Kelola Review</a>
      @if (Auth::user()->role == "admin")
        <a href="{{ route('admin.list') }}">Admin</a>
      @endif
    </aside>

    <div class="content">
      <h2 class="title-halaman">Lihat Karya</h2>

      <div class="form-container">

        {{-- FORM UPDATE --}}
        <form action="{{ route('karya.update', $karya->id) }}" method="POST">
          @csrf
          @method('PUT')

          <label>Judul Karya</label>
          <input type="text" name="judul" value="{{ $karya->judul }}" required>

          <label>Deskripsi</label>
          <textarea name="deskripsi" required>{{ $karya->deskripsi }}</textarea>

          <label>Tim Pembuat</label>
          <input type="text" name="tim_pembuat" value="{{ $karya->tim_pembuat }}" required>

          <label>Link/PDF</label>
          <input type="text" name="preview_karya" value="{{ $karya->preview_karya }}">

          <label>Status Validasi</label>
          <select name="status_validasi" required>
            <option value="submission" {{ $karya->status_validasi == 'submission' ? 'selected' : '' }}>Submission</option>
            <option value="accepted" {{ $karya->status_validasi == 'accepted' ? 'selected' : '' }}>Accepted</option>
            <option value="rejected" {{ $karya->status_validasi == 'rejected' ? 'selected' : '' }}>Rejected</option>
          </select>

          <label>Tahun</label>
          <input type="number" name="tahun" value="{{ $karya->tahun }}" required>

          {{-- TOMBOL SIMPAN (Updated: Ada Icon, Ukuran Sama) --}}
          <button class="btn-save" type="submit" 
            style="margin-top:20px; 
                   width: 100%; 
                   display: flex; 
                   justify-content: center; 
                   align-items: center; 
                   gap: 10px; 
                   background:#2563eb; 
                   color:white; 
                   padding:12px 20px; 
                   border-radius:8px; 
                   border:none; 
                   font-size: 16px; 
                   cursor: pointer;">
            <i data-feather="save" style="width:20px; height:20px;"></i>
            Simpan Perubahan
          </button>
        </form>

        {{-- FORM DELETE --}}
        <form action="{{ route('karya.destroy', $karya->id) }}" method="POST"
          onsubmit="return confirm('Yakin ingin menghapus karya ini?');" style="margin-top:15px;">
          @csrf
          @method('DELETE')

          {{-- TOMBOL HAPUS (Updated: Ukuran Sama) --}}
          <button class="btn-delete" type="submit" 
            style="width: 100%; 
                   display: flex; 
                   justify-content: center; 
                   align-items: center; 
                   gap: 10px; 
                   background:#dc2626; 
                   color:white; 
                   padding:12px 20px; 
                   border-radius:8px; 
                   border:none; 
                   font-size: 16px; 
                   cursor: pointer;">
            <i data-feather="trash-2" style="width:20px; height:20px;"></i>
            Hapus Karya
          </button>
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
            <p><strong>KAMPUS SUKABUMI</strong> — Jl. Sarasa No. 46, Babakan, Cibeureum, Kota Sukabumi, Jawa Barat 43114
            </p>
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

  <script>feather.replace();</script>
</body>

</html>