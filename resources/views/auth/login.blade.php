<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin — Yala Labs</title>
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --sans: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
    --mono: 'SF Mono', 'Fira Code', 'Cascadia Code', 'Consolas', 'Liberation Mono', monospace;
    --black: #111111;
    --white: #ffffff;
    --text: #1a1c1c;
    --muted: #505f76;
    --faint: #76777d;
    --bg: #f7f7f7;
    --tag-bg: #ebebeb;
    --accent: #2563eb;
  }

  body {
    font-family: var(--sans);
    background-color: var(--bg);
    color: var(--text);
    font-size: 15px;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 24px;
  }

  .login-box {
    width: 100%;
    max-width: 380px;
    background: var(--white);
    border-radius: 12px;
    padding: 32px;
    box-shadow: 0 1px 3px rgba(17,17,17,.06), 0 8px 24px rgba(17,17,17,.04);
  }

  .login-title { font-size: 20px; font-weight: 800; color: var(--black); margin-bottom: 6px; }
  .login-desc { font-size: 13px; color: var(--muted); margin-bottom: 24px; }

  .form-group { margin-bottom: 16px; }
  .form-group label {
    display: block; font-family: var(--mono); font-size: 10.5px; font-weight: 600;
    letter-spacing: .06em; text-transform: uppercase; color: var(--muted); margin-bottom: 6px;
  }
  .form-group input {
    width: 100%; padding: 11px 14px; font-family: var(--sans); font-size: 14px;
    color: var(--text); background: var(--bg); border: 1px solid var(--tag-bg);
    border-radius: 6px;
  }
  .form-group input:focus { outline: none; border-color: var(--accent); }

  .form-error {
    background: #fdecea; color: #c0392b; border-radius: 6px;
    padding: 10px 14px; font-size: 13px; margin-bottom: 16px;
  }

  .btn-submit {
    width: 100%; padding: 13px 28px; background: var(--black); color: var(--white);
    font-family: var(--sans); font-size: 13px; font-weight: 700; letter-spacing: .03em;
    border: none; border-radius: 6px; cursor: pointer; transition: opacity .18s;
  }
  .btn-submit:hover { opacity: .85; }
</style>
</head>
<body>

  <div class="login-box">
    <div class="login-title">Login Admin</div>
    <div class="login-desc">Yala Labs — akses internal</div>

    @if ($errors->any())
      <div class="form-error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login.attempt') }}">
      @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit" class="btn-submit">Masuk</button>
    </form>
  </div>

</body>
</html>
