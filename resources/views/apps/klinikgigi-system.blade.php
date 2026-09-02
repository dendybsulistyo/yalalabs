<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistem Informasi Klinik Gigi — Yala Labs</title>
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
    --teal: #0058bc;
    --teal-dark: #00448f;
    --teal-light: #eaf2fc;
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
    max-width: 1100px;
    margin: 0 auto;
    padding: 48px 32px 80px;
  }

  @media (min-width: 768px) { .page { padding: 64px 56px 100px; } }

  /* Back */
  .back-link {
    display: inline-flex; align-items: center; gap: 6px;
    color: var(--faint); text-decoration: none;
    font-family: var(--mono); font-size: 11px; letter-spacing: .05em;
    margin-bottom: 48px; transition: color .18s;
  }
  .back-link:hover { color: var(--black); }

  /* Hero */
  .hero { display: grid; grid-template-columns: 1fr; gap: 40px; margin-bottom: 72px; align-items: start; }
  @media (min-width: 768px) { .hero { grid-template-columns: 1fr 1fr; gap: 56px; } }

  .hero-meta {
    display: inline-flex; align-items: center; gap: 6px;
    background: var(--teal-light); color: var(--teal);
    font-family: var(--mono); font-size: 10px; font-weight: 600;
    letter-spacing: .12em; text-transform: uppercase;
    padding: 5px 12px; border-radius: 20px; margin-bottom: 16px;
  }

  .hero-title { font-size: 30px; font-weight: 800; color: var(--black); letter-spacing: -.02em; line-height: 1.2; margin-bottom: 16px; }
  @media (min-width: 768px) { .hero-title { font-size: 38px; } }

  .hero-desc { font-size: 15px; color: var(--muted); line-height: 1.85; margin-bottom: 28px; }

  .tag-list { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 32px; }
  .tag { padding: 4px 12px; background: var(--tag-bg); font-family: var(--mono); font-size: 11px; letter-spacing: .03em; border-radius: 4px; }
  .tag.teal { background: var(--teal-light); color: var(--teal); }

  .hero-actions { display: flex; gap: 12px; flex-wrap: wrap; }

  .btn-primary {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 11px 24px; background: var(--teal); color: var(--white);
    font-family: var(--mono); font-size: 11px; font-weight: 600;
    letter-spacing: .06em; text-decoration: none; border-radius: 6px;
    transition: background .18s, box-shadow .18s;
  }
  .btn-primary:hover { background: var(--teal-dark); box-shadow: 0 4px 14px rgba(0,88,188,.35); }

  .btn-secondary {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 11px 24px; background: var(--tag-bg); color: var(--black);
    font-family: var(--mono); font-size: 11px; font-weight: 600;
    letter-spacing: .06em; text-decoration: none; border-radius: 6px;
    transition: background .18s;
  }
  .btn-secondary:hover { background: #d4d4d4; }

  .hero-image { border-radius: 12px; overflow: hidden; background: var(--card-bg); min-height: 240px; }
  .hero-image img { width: 100%; height: 100%; object-fit: cover; display: block; }

  /* Section label */
  .section-label { font-family: var(--mono); font-size: 10px; font-weight: 500; letter-spacing: .18em; text-transform: uppercase; color: var(--faint); margin-bottom: 20px; }

  /* ── Screenshot Gallery (tanpa tab, cukup 2 gambar) ── */
  .gallery-section { margin-bottom: 72px; }

  .screenshots-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 16px;
  }
  @media (min-width: 768px) { .screenshots-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; } }

  .screenshot-item {
    border-radius: 10px; overflow: hidden;
    background: var(--card-bg); cursor: zoom-in;
    position: relative; border: 1px solid #e8e8e8;
  }
  .screenshot-item img { width: 100%; display: block; transition: transform .3s ease; }
  .screenshot-item:hover img { transform: scale(1.03); }

  .screenshot-overlay {
    position: absolute; inset: 0;
    background: rgba(0,0,0,0); display: flex;
    align-items: center; justify-content: center;
    transition: background .2s;
  }
  .screenshot-item:hover .screenshot-overlay { background: rgba(0,0,0,.18); }
  .screenshot-overlay svg { opacity: 0; transform: scale(.8); transition: opacity .2s, transform .2s; color: #fff; }
  .screenshot-item:hover .screenshot-overlay svg { opacity: 1; transform: scale(1); }

  .screenshot-caption {
    padding: 8px 12px;
    font-family: var(--mono); font-size: 10.5px;
    color: var(--faint); letter-spacing: .04em;
    background: var(--white); border-top: 1px solid #e8e8e8;
  }

  /* ── Lightbox ─────────────────────────────────── */
  .lightbox {
    display: none; position: fixed; inset: 0; z-index: 999;
    background: rgba(0,0,0,.88);
    align-items: center; justify-content: center;
    padding: 24px;
  }
  .lightbox.open { display: flex; }

  .lightbox-inner {
    position: relative; max-width: 1100px; width: 100%;
    display: flex; flex-direction: column; align-items: center; gap: 16px;
  }

  .lightbox img {
    max-height: 80vh; max-width: 100%;
    border-radius: 8px; box-shadow: 0 24px 80px rgba(0,0,0,.6);
    display: block;
  }

  .lightbox-caption {
    font-family: var(--mono); font-size: 11px; color: rgba(255,255,255,.55);
    letter-spacing: .06em;
  }

  .lightbox-close {
    position: absolute; top: -16px; right: 0;
    background: none; border: none; color: rgba(255,255,255,.6);
    cursor: pointer; padding: 4px; line-height: 1;
    transition: color .15s;
  }
  .lightbox-close:hover { color: #fff; }

  .lightbox-nav {
    position: absolute; top: 50%; transform: translateY(-50%);
    background: rgba(255,255,255,.12); border: none; color: #fff;
    width: 44px; height: 44px; border-radius: 50%; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: background .18s;
  }
  .lightbox-nav:hover { background: rgba(255,255,255,.25); }
  .lightbox-nav.prev { left: -60px; }
  .lightbox-nav.next { right: -60px; }

  @media (max-width: 767px) {
    .lightbox-nav.prev { left: 0; }
    .lightbox-nav.next { right: 0; }
  }

  /* ── Features + Pricing ──────────────────────── */
  .bottom-grid { display: grid; grid-template-columns: 1fr; gap: 40px; margin-bottom: 72px; }
  @media (min-width: 768px) { .bottom-grid { grid-template-columns: 1fr 1fr; gap: 48px; } }

  .feature-list { display: flex; flex-direction: column; gap: 16px; }
  .feature-item { display: flex; gap: 14px; align-items: flex-start; }
  .feature-icon { width: 32px; height: 32px; border-radius: 8px; background: var(--teal-light); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
  .feature-icon svg { color: var(--teal); }
  .feature-text-title { font-size: 14px; font-weight: 700; color: var(--black); margin-bottom: 4px; }
  .feature-text-desc { font-size: 13.5px; color: var(--muted); line-height: 1.75; }

  /* Pricing */
  .pricing-grid { display: flex; flex-direction: column; gap: 16px; }

  .pricing-card { background: var(--white); border-radius: 12px; padding: 24px; }
  .pricing-card.featured { background: var(--teal); color: var(--white); }
  .pricing-card.featured .pricing-name { color: rgba(255,255,255,.75); }
  .pricing-card.featured .pricing-price { color: var(--white); }
  .pricing-card.featured .pricing-period { color: rgba(255,255,255,.6); }
  .pricing-card.featured .pricing-item { color: rgba(255,255,255,.85); }
  .pricing-card.featured .pricing-item svg { color: rgba(255,255,255,.7); }

  .pricing-badge { display: inline-block; background: rgba(255,255,255,.2); color: var(--white); font-family: var(--mono); font-size: 9px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; padding: 3px 10px; border-radius: 20px; margin-bottom: 12px; }
  .pricing-name { font-family: var(--mono); font-size: 10px; font-weight: 600; letter-spacing: .12em; text-transform: uppercase; color: var(--faint); margin-bottom: 8px; }
  .pricing-price { font-size: 26px; font-weight: 800; color: var(--black); letter-spacing: -.02em; line-height: 1; margin-bottom: 4px; }
  .pricing-period { font-size: 12px; color: var(--faint); margin-bottom: 16px; }
  .pricing-items { list-style: none; display: flex; flex-direction: column; gap: 8px; }
  .pricing-item { display: flex; align-items: center; gap: 8px; font-size: 13.5px; color: var(--muted); }
  .pricing-item svg { flex-shrink: 0; color: var(--teal); }

  /* CTA */
  .cta-box { background: var(--black); border-radius: 16px; padding: 48px 40px; text-align: center; }
  .cta-title { font-size: 22px; font-weight: 800; color: var(--white); letter-spacing: -.01em; margin-bottom: 10px; }
  .cta-desc { font-size: 13.5px; color: rgba(255,255,255,.55); margin-bottom: 28px; line-height: 1.7; }

  .footer { margin-top: 64px; font-family: var(--mono); font-size: 10px; letter-spacing: .06em; color: var(--faint); }

  @media (max-width: 767px) {
    .hero-title { font-size: 26px; }
    .cta-box { padding: 36px 24px; }
  }
</style>
</head>
<body>

<div class="page">

  <!-- Back -->
  <a href="{{ url('/') }}" class="back-link">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
    Kembali
  </a>

  <!-- Hero -->
  <div class="hero">
    <div>
      <div class="hero-meta">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
        Baru Diluncurkan
      </div>
      <h1 class="hero-title">Sistem Informasi<br>Klinik Gigi</h1>
      <p class="hero-desc">Platform khusus praktik/klinik gigi — rekam medis pasien, odontogram interaktif dengan simbol standar kedokteran gigi Indonesia (termasuk gigi sulung, implant, jembatan, hingga migrasi gigi), kasir, antrian online dengan verifikasi OTP email, sampai manajemen jadwal dokter. Satu sistem untuk admin, dokter, dan staf front office.</p>
      <div class="tag-list">
        <span class="tag teal">Odontogram Standar Indonesia</span>
        <span class="tag">Antrian Online + OTP</span>
        <span class="tag">Multi Role</span>
        <span class="tag">Web Based</span>
      </div>
      <div class="hero-actions">
        <a href="{{ route('contact') }}" class="btn-primary">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          Minta Demo
        </a>
        <a href="#pricing" class="btn-secondary">Lihat Harga</a>
        <a href="#ekosistem" class="btn-secondary">Ekosistem</a>
        <a href="https://klinikgigi.opentest.web.id" target="_blank" rel="noopener" class="btn-secondary">Coba Langsung &#8599;</a>
      </div>
    </div>
    <div class="hero-image">
      <img src="{{ asset('images/klinikgigi/login.png') }}" alt="Klinik Gigi — Halaman Login">
    </div>
  </div>

  <!-- ── Screenshot Gallery ── -->
  <div class="gallery-section">
    <p class="section-label">Screenshots</p>
    <div class="screenshots-grid">
      <div class="screenshot-item" data-src="{{ asset('images/klinikgigi/login.png') }}" data-caption="Halaman Login">
        <img src="{{ asset('images/klinikgigi/login.png') }}" alt="Halaman Login">
        <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
        <div class="screenshot-caption">Halaman Login</div>
      </div>
      <div class="screenshot-item" data-src="{{ asset('images/klinikgigi/odontogram-chart.png') }}" data-caption="Odontogram Interaktif — Standar Indonesia">
        <img src="{{ asset('images/klinikgigi/odontogram-chart.png') }}" alt="Odontogram Interaktif">
        <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
        <div class="screenshot-caption">Odontogram Interaktif — Standar Indonesia</div>
      </div>
    </div>
  </div>

  <!-- Lightbox -->
  <div class="lightbox" id="lightbox">
    <div class="lightbox-inner">
      <button class="lightbox-close" id="lb-close">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
      <button class="lightbox-nav prev" id="lb-prev">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
      </button>
      <img id="lb-img" src="" alt="">
      <button class="lightbox-nav next" id="lb-next">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
      </button>
      <div class="lightbox-caption" id="lb-caption"></div>
    </div>
  </div>

  <!-- Fitur + Pricing -->
  <div class="bottom-grid" id="ekosistem">

    <div>
      <p class="section-label">Ekosistem Klinik Gigi</p>
      <div class="feature-list">

        <div class="feature-item">
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg></div>
          <div>
            <div class="feature-text-title">Odontogram Interaktif</div>
            <div class="feature-text-desc">Chart gigi permanen &amp; sulung digabung otomatis, dengan ±26 simbol kondisi sesuai standar odontogram kedokteran gigi Indonesia — termasuk tambalan, RCT, mahkota, implant, jembatan, hingga migrasi/rotasi gigi.</div>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/><path d="M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01"/></svg></div>
          <div>
            <div class="feature-text-title">Rekam Medis &amp; Kunjungan</div>
            <div class="feature-text-desc">Data pasien, riwayat kunjungan, diagnosis, hingga hasil rontgen gigi (upload aman, hanya bisa diakses admin &amp; dokter) tersimpan rapi per pasien.</div>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></div>
          <div>
            <div class="feature-text-title">Antrian Online + Verifikasi OTP</div>
            <div class="feature-text-desc">Pasien daftar antrian sendiri lewat form publik — pilih dokter &amp; tanggal sesuai jadwal &amp; sisa kuota, verifikasi lewat kode OTP email, langsung dapat nomor antrian. Aman dari spam (rate limit + honeypot).</div>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/><path d="M12 6v6l4 2"/></svg></div>
          <div>
            <div class="feature-text-title">Jadwal &amp; Kuota Praktik Dokter</div>
            <div class="feature-text-desc">Atur jadwal praktik mingguan tiap dokter beserta kuota per sesi, dan tandai tanggal libur/cuti — otomatis menyesuaikan pilihan yang tersedia di form antrian online.</div>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg></div>
          <div>
            <div class="feature-text-title">Kasir</div>
            <div class="feature-text-desc">Catat pembayaran kunjungan langsung dari daftar tunggu kasir — sederhana, tanpa ribet, cocok untuk praktik/klinik gigi berskala kecil-menengah.</div>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
          <div>
            <div class="feature-text-title">Multi Role &amp; Hak Akses</div>
            <div class="feature-text-desc">Admin (akses penuh), Dokter (pasien, kunjungan, odontogram), dan Staf (jadwal &amp; data pasien dasar) — staf tidak bisa mengakses data medis/diagnosis pasien.</div>
          </div>
        </div>

      </div>
    </div>

    <div id="pricing">
      <p class="section-label">Harga</p>
      <div class="pricing-grid">

        <div class="pricing-card featured">
          <div class="pricing-badge">Paket</div>
          <div class="pricing-name">Professional</div>
          <div class="pricing-price">Rp 3.5 jt</div>
          <div class="pricing-period">sekali bayar</div>
          <ul class="pricing-items">
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Odontogram Standar Indonesia</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Rekam Medis &amp; Upload Rontgen</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Antrian Online + OTP Email</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Jadwal &amp; Kuota Dokter</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Kasir</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Instalasi On-premise / VPS</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Offline / Online</li>
            
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>VPS 1 Tahun (Gratis Tahun Pertama)</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>6 bulan support</li>
          </ul>
        </div>

      </div>
    </div>

  </div>

  <!-- CTA -->
  <div class="cta-box">
    <div class="cta-title">Klinik gigi Anda siap go digital?</div>
    <div class="cta-desc">Hubungi kami untuk konsultasi gratis dan demo langsung sesuai kebutuhan klinik/praktik gigi Anda.</div>
    <a href="mailto:halloooyala@gmail.com" class="btn-primary" style="margin:0 auto; width:fit-content;">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 7 10-7"/></svg>
      Hubungi Kami
    </a>
  </div>

  <footer class="footer">© 2026 Yala Labs</footer>

</div>

<script>
  // ── Lightbox ──
  const lightbox  = document.getElementById('lightbox');
  const lbImg     = document.getElementById('lb-img');
  const lbCaption = document.getElementById('lb-caption');
  let currentItems = [];
  let currentIndex = 0;

  function openLightbox(items, index) {
    currentItems = items;
    currentIndex = index;
    showSlide(currentIndex);
    lightbox.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    lightbox.classList.remove('open');
    document.body.style.overflow = '';
  }

  function showSlide(index) {
    const item = currentItems[index];
    lbImg.src = item.dataset.src;
    lbCaption.textContent = item.dataset.caption;
  }

  const screenshotItems = Array.from(document.querySelectorAll('.screenshot-item'));
  screenshotItems.forEach((item, index) => {
    item.addEventListener('click', () => openLightbox(screenshotItems, index));
  });

  document.getElementById('lb-close').addEventListener('click', closeLightbox);
  lightbox.addEventListener('click', e => { if (e.target === lightbox) closeLightbox(); });

  document.getElementById('lb-prev').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + currentItems.length) % currentItems.length;
    showSlide(currentIndex);
  });

  document.getElementById('lb-next').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % currentItems.length;
    showSlide(currentIndex);
  });

  document.addEventListener('keydown', e => {
    if (!lightbox.classList.contains('open')) return;
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowLeft')  { currentIndex = (currentIndex - 1 + currentItems.length) % currentItems.length; showSlide(currentIndex); }
    if (e.key === 'ArrowRight') { currentIndex = (currentIndex + 1) % currentItems.length; showSlide(currentIndex); }
  });
</script>
</body>
</html>
