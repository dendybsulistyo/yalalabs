<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hubungi Kami — Yala Labs</title>
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
    --card-bg: #f0f0f0;
    --accent: #2563eb;
    --accent-dark: #1d4ed8;
    --accent-light: #eef3ff;
  }

  body {
    font-family: var(--sans);
    background-color: var(--bg);
    color: var(--text);
    font-size: 15px;
    line-height: 1.7;
    -webkit-font-smoothing: antialiased;
  }

  .page {
    max-width: 720px;
    margin: 0 auto;
    padding: 48px 32px 80px;
  }

  @media (min-width: 768px) { .page { padding: 64px 56px 100px; } }

  .back-link {
    display: inline-flex; align-items: center; gap: 6px;
    color: var(--faint); text-decoration: none;
    font-family: var(--mono); font-size: 11px; letter-spacing: .05em;
    margin-bottom: 48px; transition: color .18s;
  }
  .back-link:hover { color: var(--black); }

  .hero-meta {
    display: inline-flex; align-items: center; gap: 6px;
    background: var(--accent-light); color: var(--accent);
    font-family: var(--mono); font-size: 10px; font-weight: 600;
    letter-spacing: .12em; text-transform: uppercase;
    padding: 5px 12px; border-radius: 20px; margin-bottom: 16px;
  }

  .hero-title {
    font-size: 30px; font-weight: 800; color: var(--black);
    letter-spacing: -.02em; line-height: 1.2; margin-bottom: 16px;
  }
  @media (min-width: 768px) { .hero-title { font-size: 38px; } }

  .hero-desc {
    font-size: 15px; color: var(--muted); line-height: 1.85; margin-bottom: 44px;
    max-width: 520px;
  }

  .contact-grid {
    display: grid; grid-template-columns: 1fr; gap: 14px; margin-bottom: 48px;
  }
  @media (min-width: 640px) { .contact-grid { grid-template-columns: 1fr 1fr; } }

  .contact-card {
    display: flex; align-items: center; gap: 14px;
    background: var(--white); border-radius: 8px; padding: 20px;
    text-decoration: none; color: inherit;
    box-shadow: 0 1px 3px rgba(17,17,17,.06), 0 8px 24px rgba(17,17,17,.04);
    transition: transform .18s ease, box-shadow .18s ease;
  }

  .contact-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 10px rgba(17,17,17,.08), 0 16px 32px rgba(17,17,17,.08);
  }

  .contact-card.whatsapp .contact-icon { background: #e8faf0; color: #1fa855; }
  .contact-card.email .contact-icon { background: var(--accent-light); color: var(--accent); }
  .contact-card.location .contact-icon { background: var(--tag-bg); color: var(--muted); }
  .contact-card.web .contact-icon { background: var(--tag-bg); color: var(--muted); }

  .contact-icon {
    width: 40px; height: 40px; border-radius: 8px; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
  }

  .contact-label {
    font-family: var(--mono); font-size: 10px; font-weight: 600;
    letter-spacing: .1em; text-transform: uppercase; color: var(--faint);
    margin-bottom: 3px;
  }

  .contact-value {
    font-size: 14px; font-weight: 700; color: var(--black);
  }

  .section-label {
    font-family: var(--mono); font-size: 10px; font-weight: 500;
    letter-spacing: .18em; text-transform: uppercase; color: var(--faint);
    margin-bottom: 20px;
  }

  .cta-box {
    background: var(--black); border-radius: 16px; padding: 44px 36px; text-align: center;
  }
  .cta-title { font-size: 20px; font-weight: 800; color: var(--white); letter-spacing: -.01em; margin-bottom: 10px; }
  .cta-desc { font-size: 13.5px; color: rgba(255,255,255,.55); margin-bottom: 26px; line-height: 1.7; }

  .btn-whatsapp {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 12px 26px; background: #25D366; color: #ffffff;
    font-family: var(--sans); font-size: 13px; font-weight: 700;
    text-decoration: none; border-radius: 8px;
    transition: background .18s, transform .15s;
  }
  .btn-whatsapp:hover { background: #20bd5a; transform: translateY(-1px); }

  .footer { margin-top: 64px; font-family: var(--mono); font-size: 10px; letter-spacing: .06em; color: var(--faint); }

  @media (max-width: 767px) { .hero-title { font-size: 26px; } .cta-box { padding: 36px 24px; } }

  /* ── Form ─────────────────────────────────────── */
  .form-status {
    background: #e8faf0; color: #1a7a42; border-radius: 8px;
    padding: 14px 18px; font-size: 13.5px; margin-bottom: 24px;
  }

  .contact-form {
    background: var(--white); border-radius: 12px; padding: 28px;
    box-shadow: 0 1px 3px rgba(17,17,17,.06), 0 8px 24px rgba(17,17,17,.04);
    margin-bottom: 48px;
  }

  .form-row { display: grid; grid-template-columns: 1fr; gap: 16px; margin-bottom: 16px; }
  @media (min-width: 640px) { .form-row.two-col { grid-template-columns: 1fr 1fr; } }

  .form-group label {
    display: block; font-family: var(--mono); font-size: 10.5px; font-weight: 600;
    letter-spacing: .06em; text-transform: uppercase; color: var(--muted); margin-bottom: 6px;
  }

  .form-group input,
  .form-group select,
  .form-group textarea {
    width: 100%; padding: 11px 14px; font-family: var(--sans); font-size: 14px;
    color: var(--text); background: var(--bg); border: 1px solid var(--tag-bg);
    border-radius: 6px; transition: border-color .15s;
  }

  .form-group input:focus,
  .form-group select:focus,
  .form-group textarea:focus {
    outline: none; border-color: var(--accent);
  }

  .form-group textarea { resize: vertical; min-height: 100px; }

  .form-error { color: #c0392b; font-size: 12px; margin-top: 5px; }

  /* Honeypot: disembunyikan dari manusia, tapi tetap ada di DOM untuk bot */
  .form-honeypot {
    position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden;
  }

  .btn-submit {
    width: 100%; padding: 13px 28px; background: var(--black); color: var(--white);
    font-family: var(--sans); font-size: 13px; font-weight: 700; letter-spacing: .03em;
    border: none; border-radius: 6px; cursor: pointer; transition: opacity .18s;
    margin-top: 8px;
  }
  .btn-submit:hover { opacity: .85; }

  .cf-turnstile { margin-bottom: 16px; }
</style>
</head>
<body>

<div class="page">

  <a href="{{ url('/') }}" class="back-link">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
    Kembali
  </a>

  <div class="hero-meta">
    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 7 10-7"/></svg>
    Hubungi Kami
  </div>
  <h1 class="hero-title">Mari Diskusikan<br>Kebutuhan Anda</h1>
  <p class="hero-desc">Konsultasi gratis untuk pembuatan sistem sesuai kebutuhan instansi/perusahaan Anda. Isi form di bawah, atau hubungi kami langsung lewat WhatsApp/email.</p>

  @if (session('status'))
    <div class="form-status">{{ session('status') }}</div>
  @endif

  <p class="section-label">Kirim Pesan</p>
  <form class="contact-form" method="POST" action="{{ route('contact.store') }}">
    @csrf

    <div class="form-row two-col">
      <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name') <p class="form-error">{{ $message }}</p> @enderror
      </div>
      <div class="form-group">
        <label for="institution_name">Nama Instansi</label>
        <input type="text" id="institution_name" name="institution_name" value="{{ old('institution_name') }}">
        @error('institution_name') <p class="form-error">{{ $message }}</p> @enderror
      </div>
    </div>

    <div class="form-row two-col">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email') <p class="form-error">{{ $message }}</p> @enderror
      </div>
      <div class="form-group">
        <label for="phone">No. HP/WA</label>
        <input type="text" id="phone" name="phone" placeholder="08xxxxxxxxxx" value="{{ old('phone') }}" required>
        @error('phone') <p class="form-error">{{ $message }}</p> @enderror
      </div>
    </div>

    <div class="form-row">
      <div class="form-group">
        <label for="product_interest">Produk yang Diminati</label>
        <select id="product_interest" name="product_interest" required>
          <option value="">-- Pilih Produk --</option>
          <option value="sekolah" @selected(old('product_interest') === 'sekolah')>Sistem Informasi Sekolah</option>
          <option value="klinik" @selected(old('product_interest') === 'klinik')>Sistem Informasi Klinik</option>
          <option value="ticket" @selected(old('product_interest') === 'ticket')>Knowledge Base & Ticket System</option>
          <option value="lainnya" @selected(old('product_interest') === 'lainnya')>Lainnya</option>
        </select>
        @error('product_interest') <p class="form-error">{{ $message }}</p> @enderror
      </div>
    </div>

    <div class="form-row">
      <div class="form-group">
        <label for="message">Pesan / Kebutuhan</label>
        <textarea id="message" name="message" required>{{ old('message') }}</textarea>
        @error('message') <p class="form-error">{{ $message }}</p> @enderror
      </div>
    </div>

    <div class="form-honeypot" aria-hidden="true">
      <label for="website">Website</label>
      <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
    </div>

    @if (config('services.turnstile.site_key'))
      <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
      @error('cf-turnstile-response') <p class="form-error">{{ $message }}</p> @enderror
    @endif

    <button type="submit" class="btn-submit">Kirim Pesan</button>
  </form>

  <p class="section-label">Atau Hubungi Langsung</p>
  <div class="contact-grid">

    <a href="https://wa.me/6283896247627" target="_blank" class="contact-card whatsapp">
      <div class="contact-icon">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2.05 22l5.25-1.38a9.9 9.9 0 0 0 4.74 1.21h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.87 9.87 0 0 0 12.04 2zm5.8 14.09c-.24.68-1.4 1.32-1.94 1.4-.5.08-1.11.11-1.79-.11-.41-.13-.94-.3-1.62-.6-2.85-1.23-4.71-4.1-4.85-4.29-.14-.19-1.16-1.54-1.16-2.94s.73-2.09 1-2.37c.24-.27.53-.34.71-.34.18 0 .36 0 .51.01.17.01.38-.06.6.45.24.56.8 1.96.87 2.1.07.14.11.31.02.5-.09.19-.14.31-.27.47-.14.16-.29.36-.41.48-.14.14-.28.29-.12.57.16.28.71 1.17 1.53 1.9 1.05.94 1.94 1.23 2.22 1.37.28.14.44.12.61-.07.16-.19.68-.79.87-1.06.18-.27.37-.22.62-.13.25.09 1.6.75 1.87.89.27.14.46.2.52.32.07.12.07.68-.17 1.36z"/>
        </svg>
      </div>
      <div>
        <div class="contact-label">WhatsApp</div>
        <div class="contact-value">+62 838-9624-7627</div>
      </div>
    </a>

    <a href="mailto:halloooyala@gmail.com" class="contact-card email">
      <div class="contact-icon">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 7 10-7"/></svg>
      </div>
      <div>
        <div class="contact-label">Email</div>
        <div class="contact-value">halloooyala@gmail.com</div>
      </div>
    </a>

    <div class="contact-card location">
      <div class="contact-icon">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
      </div>
      <div>
        <div class="contact-label">Lokasi</div>
        <div class="contact-value">Yogyakarta, Indonesia</div>
      </div>
    </div>

    <a href="https://yala.web.id" target="_blank" class="contact-card web">
      <div class="contact-icon">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
      </div>
      <div>
        <div class="contact-label">Website</div>
        <div class="contact-value">yala.web.id</div>
      </div>
    </a>

  </div>

  <div class="cta-box">
    <div class="cta-title">Siap mulai proyek Anda?</div>
    <div class="cta-desc">Chat langsung via WhatsApp untuk respon tercepat — kami biasanya membalas dalam beberapa jam.</div>
    <a href="https://wa.me/6283896247627" target="_blank" class="btn-whatsapp">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2.05 22l5.25-1.38a9.9 9.9 0 0 0 4.74 1.21h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.87 9.87 0 0 0 12.04 2zm5.8 14.09c-.24.68-1.4 1.32-1.94 1.4-.5.08-1.11.11-1.79-.11-.41-.13-.94-.3-1.62-.6-2.85-1.23-4.71-4.1-4.85-4.29-.14-.19-1.16-1.54-1.16-2.94s.73-2.09 1-2.37c.24-.27.53-.34.71-.34.18 0 .36 0 .51.01.17.01.38-.06.6.45.24.56.8 1.96.87 2.1.07.14.11.31.02.5-.09.19-.14.31-.27.47-.14.16-.29.36-.41.48-.14.14-.28.29-.12.57.16.28.71 1.17 1.53 1.9 1.05.94 1.94 1.23 2.22 1.37.28.14.44.12.61-.07.16-.19.68-.79.87-1.06.18-.27.37-.22.62-.13.25.09 1.6.75 1.87.89.27.14.46.2.52.32.07.12.07.68-.17 1.36z"/>
      </svg>
      Chat WhatsApp
    </a>
  </div>

  <footer class="footer">© 2026 Yala Labs</footer>

</div>

@if (config('services.turnstile.site_key'))
  <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
@endif
</body>
</html>
