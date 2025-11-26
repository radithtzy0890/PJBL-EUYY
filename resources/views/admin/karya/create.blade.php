<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Karya - Portal TPL SVIPB</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/kelolakarya1.css') }}">
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
      <a href="{{ 'dashboard' }}" class="active">Dashboard</a>
      <a href="{{ route('karya.index') }}">Kelola Karya</a>
       <a href="{{ route('info-prodi.index') }}">Edit Info Profil</a>
      <a href="{{ route('karya.validasi') }}">Validasi Konten</a>
      <a href ="{{ route('dosen.index') }}">Dosen</a>
      <a href ="{{ route('admin.berita.index') }}">Berita</a>
      <a href ="{{ route('admin.matakuliah.index') }}">Mata Kuliah</a>
      <a href ="{{ route('admin.review.index') }}">Kelola Karya</a>
       @if (Auth::user()->role == "superadmin")
      <a href ="{{ route('admin.list') }}">Admin</a>
      @endif
    </aside>
    </div>

    <div class="content">
      <h2 class="title-halaman">Tambah Karya</h2>

      {{-- Tampilkan pesan sukses / error --}}
      @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
      @elseif(session('error'))
        <div class="alert error">{{ session('error') }}</div>
      @endif

      {{-- FORM TAMBAH KARYA --}}
      <div class="form-container">
        <form action="{{ route('admin.karya.store') }}" method="POST" enctype="multipart/form-data">
          @csrf


@section('content')
<div class="content">
  <h2 class="title-halaman">Tambah Karya</h2>

  <div class="form-container">
    <form action="{{ route('admin.karya.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <label>Judul Karya</label>
      <input type="text" name="judul" placeholder="Masukkan judul karya" required>

      <label>Deskripsi</label>
      <textarea name="deskripsi" placeholder="Masukkan deskripsi karya" required></textarea>

      <label>Kategori</label>
      <input type="text" name="kategori" placeholder="Masukkan kategori" required>

      <label>Tahun</label>
      <input type="number" name="tahun" placeholder="Masukkan tahun" required>

      <label>File Karya (PDF/Link)</label>
      <input type="file" name="file_karya" accept=".pdf,image/*">

      <label>Preview (opsional)</label>
      <input type="file" name="preview_karya" accept="image/*">

      <label>Tim Pembuat</label>
      <input type="text" name="tim_pembuat" placeholder="Masukkan nama tim pembuat" required>

      <button class="btn-submit" type="submit">Simpan</button>
    </form>
  </div>
</div>
</body>
</html>
