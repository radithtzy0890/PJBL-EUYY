<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kelola Karya Portal TPL SV IPB</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/kelolakarya1.css') }}">
</head>
<body>
  <div class="nav-container1">
    <img src="{{ asset('images/logo_TPL.png') }}" alt="Logo TPL SVIPB" class="logo-TPL">
  </div>

  <div class="nav-container2">
    <h2>Selamat Datang Di Portal Karya Teknologi Rekayasa Perangkat Lunak SV IPB </h2> 
    <p>Syntax Error Compile Lagi</p>
  </div>

  <div class="container">
    <div class="sidebar">
      <a href="{{ route('dashboard') }}">Dashboard</a>
      <a href="{{ route('karya.index') }}"> Kelola Karya</a>
      <a href="{{ route('info-prodi.index') }}">Info Prodi</a>
      <a href="{{ route('karya.validasi') }}">Validasi Konten</a>
      <a href ="{{ route('dosen.index') }}" class="active">  Dosen</a>
      <a href ="{{ route('admin.berita.index') }}">Berita</a>
      <a href ="{{ route('admin.matakuliah.index') }}">Mata Kuliah</a>
      <a href ="{{ route('admin.review.index') }}">Kelola Review</a>
         @if (Auth::user()->role == "admin")
        <a href ="{{ route('admin.list') }}">Admin</a>
        @endif
    </div>

<div class="content">
    <h2 class="title-halaman">Edit Dosen</h2>
    <div class="form-container">
        <form action="{{ route('dosen.update', $dosen->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- Nama Dosen -->
            <label>Nama Dosen</label>
            <input type="text"
                   name="nama"
                   value="{{ old('nama', $dosen->nama) }}"
                   placeholder="Masukkan Nama Dosen">

            <!-- Prodi -->
            <label>Program Studi</label>
            <input type="text"
                   name="prodi"
                   value="{{ old('prodi', $dosen->prodi) }}"
                   placeholder="Contoh: Teknologi Rekayasa Perangkat Lunak">

            <!-- Research Interest -->
            <label>Research Interest</label>
            <input type="text"
                   name="research_interest"
                   value="{{ old('research_interest', $dosen->research_interest) }}"
                   placeholder="Masukkan Research Interest">

            <!-- Foto -->
            <label>Foto Dosen</label>
            <div class="upload-box">
                <img id="preview"
                     src="{{ $dosen->foto ? asset('storage/'.$dosen->foto) : asset('images/default-user.png') }}"
                     class="preview-img">

                <input type="file"
                       name="foto"
                       accept="image/*"
                       onchange="previewImage(event)">
            </div>
            <!-- Tombol -->
            <button class="btn-submit" type="submit">
                Simpan Perubahan
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