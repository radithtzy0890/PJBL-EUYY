{{-- resources/views/emails/password_reset.blade.php --}}
@props(['name' => '', 'url' => '', 'token' => '', 'expires' => 60])

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Reset Password - {{ config('app.name') }}</title>
  <style>
    /* Simple, email-safe styles */
    body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial; margin:0; padding:0; background:#f4f6f8; color:#333; }
    .container { max-width:600px; margin:28px auto; background:#ffffff; border-radius:8px; padding:24px; box-shadow:0 2px 6px rgba(0,0,0,0.05); }
    .header { text-align:center; padding-bottom:8px; }
    .brand { font-size:20px; font-weight:700; color:#111; text-decoration:none; }
    .lead { margin:16px 0; font-size:16px; line-height:1.5; }
    .btn { display:inline-block; padding:12px 20px; border-radius:6px; text-decoration:none; font-weight:600; }
    .btn-primary { background:#2563eb; color:#fff; }
    .muted { color:#6b7280; font-size:13px; }
    .footer { margin-top:20px; font-size:12px; color:#6b7280; text-align:center; }
    @media (max-width: 420px) {
      .container { margin:12px; padding:16px; }
    }
  </style>
</head>
<body>
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f8; width:100%;">
    <tr>
      <td align="center">
        <div class="container" role="article" aria-roledescription="email">
          <div class="header">
            <a href="{{ route('home') }}" class="brand">{{ config('app.name') }}</a>
          </div>

          <p class="lead">Halo {{ $name }},</p>

          <p class="lead">
            Kami menerima permintaan untuk mereset kata sandi akun Anda. Klik tombol di bawah untuk membuat kata sandi baru. Tautan ini akan kedaluwarsa dalam <strong>{{ $expires }} menit</strong>.
          </p>

          <p style="text-align:center; margin:22px 0;">
            <a href="{{ $resetLink }}" class="btn btn-primary">Reset Kata Sandi</a>
          </p>

          <p class="muted">
            Jika tombol di atas tidak berfungsi, salin dan tempel URL ini ke browser Anda:
            <br>
            <a href="{{ $resetLink }}">{{ $resetLink }}</a>
          </p>

          <hr style="border:none; border-top:1px solid #eef2f7; margin:20px 0;">

          <p class="muted">
            Jika Anda tidak meminta pengubahan kata sandi, abaikan email ini. Tidak akan ada perubahan pada akun Anda.
          </p>

          <div class="footer">
            &mdash; Tim {{ config('app.name') }}<br>
            {{ config('app.name') }} • {{ url('/') }}
          </div>
        </div>

        {{-- Plain-text fallback for mail clients that prefer text --}}
        <div style="display:none; font-size:1px; line-height:1px; max-height:0; max-width:0; opacity:0; overflow:hidden;">
          Halo {{ $name ?: 'Pengguna' }},

          Kami menerima permintaan untuk mereset kata sandi akun Anda.
          Buka URL berikut untuk membuat kata sandi baru (tautan berlaku {{ $expires }} menit):
          {{ $url }}

          Jika Anda tidak meminta ini, abaikan pesan ini.
          — Tim {{ config('app.name') }}
        </div>
      </td>
    </tr>
  </table>
</body>
</html>
