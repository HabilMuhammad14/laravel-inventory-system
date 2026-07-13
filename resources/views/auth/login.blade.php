<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Inventaris Toko Sembako UM</title>
  <style>
    *{margin:0;padding:0;box-sizing:border-box}
    body{font-family:Arial,sans-serif;min-height:100vh;background:#f5f5f3;display:flex;align-items:center;justify-content:center;padding:20px}

    .login-card{background:#fff;border:1px solid #e5e5e5;border-radius:16px;width:100%;max-width:400px;padding:36px 32px;box-shadow:0 4px 24px rgba(0,0,0,.06)}

    .login-header{text-align:center;margin-bottom:28px}
    .logo-circle{width:48px;height:48px;background:#dbeafe;border-radius:12px;display:flex;align-items:center;justify-content:center;margin:0 auto 14px}
    .logo-circle svg{width:24px;height:24px;stroke:#1a56db;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
    .login-title{font-size:18px;font-weight:700;color:#111;margin-bottom:4px}
    .login-sub{font-size:13px;color:#999}

    .form-group{margin-bottom:16px}
    label{display:block;font-size:13px;color:#555;margin-bottom:6px;font-weight:500}
    .form-input{width:100%;height:38px;padding:5px 12px;border:1px solid #ddd;border-radius:8px;font-size:13.5px;color:#333;outline:none;transition:border-color .15s}
    .form-input:focus{border-color:#3b82f6;box-shadow:0 0 0 2px #dbeafe}
    .form-input.is-invalid{border-color:#fca5a5;background:#fef2f2}
    .error-text{display:block;color:#b91c1c;font-size:11.5px;margin-top:4px}

    .remember-row{display:flex;align-items:center;gap:8px;margin-bottom:20px}
    .remember-row input[type=checkbox]{width:15px;height:15px;accent-color:#1a56db;cursor:pointer}
    .remember-row label{font-size:13px;color:#666;margin:0;font-weight:400;cursor:pointer}

    .btn-login{width:100%;height:40px;background:#1a56db;color:#fff;border:none;border-radius:8px;font-size:14px;font-weight:500;cursor:pointer}
    .btn-login:hover{background:#1648c0}

    .forgot-link{display:block;text-align:center;margin-top:14px;font-size:12.5px;color:#888;text-decoration:none}
    .forgot-link:hover{color:#1a56db}

    .error-box{background:#fef2f2;border:1px solid #fca5a5;border-radius:8px;padding:10px 14px;margin-bottom:18px;font-size:13px;color:#b91c1c}

    @media(max-width:480px){
      .login-card{padding:28px 20px}
    }
  </style>
</head>
<body>

<div class="login-card">

  <div class="login-header">
    <div class="logo-circle">
      <svg viewBox="0 0 24 24"><path d="M20 7H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/><path d="M16 3H8a2 2 0 0 0-2 2v2h12V5a2 2 0 0 0-2-2z"/></svg>
    </div>
    <div class="login-title">Inventaris</div>
    <div class="login-sub">Toko Sembako Utama Mandiri</div>
  </div>

  @if ($errors->any())
  <div class="error-box">
    @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
    @endforeach
  </div>
  @endif

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group">
      <label for="email">Email</label>
      <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="nama@email.com">
      @error('email')
        <span class="error-text">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
      @error('password')
        <span class="error-text">{{ $message }}</span>
      @enderror
    </div>

    <div class="remember-row">
      <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
      <label for="remember">Ingat saya</label>
    </div>

    <button type="submit" class="btn-login">Masuk</button>

    @if (Route::has('password.request'))
      <a class="forgot-link" href="{{ route('password.request') }}">Lupa password?</a>
    @endif

  </form>

</div>

</body>
</html>
