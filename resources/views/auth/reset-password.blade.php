<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Karya Teknologi RPL - SV IPB</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
</head>
<body>
  <div class="login-container">

    <div class="left-panel">
      <div class="logos">
      </div>
      <div class="welcome-text">
        <h1>Selamat datang di...</h1>
        <h2>Portal Karya Teknologi Rekayasa Perangkat Lunak</h2>
        <p>Sekolah Vokasi IPB University</p>
      </div>
    </div>

    <div class="right-panel">
      <div class="login-box">
        <h2>Atur Ulang Kata Sandi</h2>
        <p>Masukkan password baru dan konfirmasi password baru</p>
        <form action="{{ route('reset-password.submit', $token) }}" method="POST">
          @csrf
          @method('post')
          <div class="mb-3">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" placeholder="Masukkan password" required>
          </div>
          <div class="mb-3">
              <label for="password-confirmation">Konfirmasi Password</label>
              <input type="password" id="password-confirmation" name="password_confirmation" placeholder="Masukkan konfirmasi password" required>
          </div>

          <button class="login-btn" type="submit">Perbarui</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>