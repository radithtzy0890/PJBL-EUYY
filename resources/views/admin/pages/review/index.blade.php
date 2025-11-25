<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal TPL SVIPB - Kelola Review</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>

  <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">

  <style>
    .table-card {
      margin-top: 20px;
      background: #ffffff;
      border-radius: 16px;
      padding: 25px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      border-radius: 12px;
      overflow: hidden;
    }

    thead {
      background: linear-gradient(90deg, #304ffe, #512da8);
      color: white;
    }

    thead th {
      padding: 14px;
      text-align: left;
      font-size: 15px;
    }

    tbody tr {
      background: #fff;
      border-bottom: 1px solid #eee;
      transition: 0.2s;
    }

    tbody tr:hover {
      background: #f6f4ff;
    }

    tbody td {
      padding: 14px;
      color: #333;
      font-size: 15px;
    }

    .btn-action {
      padding: 7px 14px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: 0.2s;
      font-size: 14px;
    }

    .btn-lihat {
      background: #1e88e5;
      color: white;
    }

    .btn-lihat:hover {
      background: #1565c0;
    }

    .btn-edit {
      background: #fbc02d;
      color: #333;
    }

    .btn-edit:hover {
      background: #f9a825;
    }

    .btn-delete {
      background: #e53935;
      color: white;
    }

    .btn-delete:hover {
      background: #c62828;
    }

    .aksi-wrapper {
      display: flex;
      gap: 10px;
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
      <a href="{{ 'dashboard' }}">Dashboard</a>
      <a href="{{ route('karya.index') }}">Kelola Karya</a>
      <a href="{{ route('info-prodi.index') }}">Edit Info Profil</a>
      <a href="{{ route('karya.validasi') }}">Validasi Konten</a>
      <a href="{{ route('dosen.index') }}">Dosen</a>
      <a href="{{ route('admin.berita.index') }}">Berita</a>
      <a href="{{ route('admin.matakuliah.index') }}">Mata Kuliah</a>
      <a href="{{ route('admin.review.index') }}" class="active">Kelola Review</a>

      @if (Auth::user()->role == "superadmin")
      <a href="{{ route('admin.list') }}">Admin</a>
      @endif
    </aside>

    <main class="content">

      <h1 style="font-weight:600; margin-bottom: 10px;">Kelola Review</h1>

      <div class="table-card">

        <table>
          <thead>
            <tr>
              <th>User</th>
              <th>Karya</th>
              <th>Rating</th>
              <th>Komentar</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($reviews as $rev)
            <tr>
              <td>{{ $rev->user->name }}</td>
              <td>{{ $rev->karya->judul }}</td>
              <td>{{ $rev->rating }}</td>
              <td>{{ $rev->comment }}</td>

              <td>
                <div class="aksi-wrapper">
                  <!-- HAPUS -->
                  <form action="{{ route('admin.review.destroy', $rev->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus review ini?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn-action btn-delete">
                      <i data-feather="trash-2"></i> Hapus
                    </button>
                  </form>

                </div>
              </td>

            </tr>
            @endforeach
          </tbody>

        </table>

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
            <p><strong>KAMPUS SUKABUMI</strong> — Jl. Sarasa No. 46, Babakan, Kota Sukabumi, Jawa Barat 43142</p>
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

  <script>
    feather.replace();
  </script>

</body>

</html>
