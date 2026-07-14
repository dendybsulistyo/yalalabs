<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistem Informasi Sekolah — Yala Labs</title>
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
    --teal: #0041a2;
    --teal-dark: #003080;
    --teal-light: #eef3ff;
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
  .btn-primary:hover { background: var(--teal-dark); box-shadow: 0 4px 14px rgba(0,65,162,.35); }

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

  /* ── Tab Gallery ────────────────────────────────── */
  .gallery-section { margin-bottom: 72px; }

  .tab-nav {
    display: flex; flex-wrap: wrap; gap: 4px;
    margin-bottom: 20px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 0;
  }

  .tab-btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 8px 16px; background: none; border: none;
    font-family: var(--mono); font-size: 11px; font-weight: 600;
    letter-spacing: .06em; color: var(--faint); cursor: pointer;
    border-bottom: 2px solid transparent; margin-bottom: -1px;
    transition: color .18s, border-color .18s;
  }
  .tab-btn:hover { color: var(--text); }
  .tab-btn.active { color: var(--teal); border-bottom-color: var(--teal); }

  .tab-count {
    display: inline-flex; align-items: center; justify-content: center;
    width: 18px; height: 18px; border-radius: 50%;
    background: var(--tag-bg); font-size: 10px; color: var(--faint);
  }
  .tab-btn.active .tab-count { background: var(--teal-light); color: var(--teal); }

  .tab-panel { display: none; }
  .tab-panel.active { display: block; }

  .screenshots-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
  }
  @media (min-width: 768px) { .screenshots-grid { grid-template-columns: repeat(3, 1fr); gap: 16px; } }

  .screenshot-item {
    border-radius: 10px; overflow: hidden;
    background: var(--card-bg); cursor: zoom-in;
    position: relative;
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
        Web Application
      </div>
      <h1 class="hero-title">Sistem Informasi<br>Sekolah</h1>
      <p class="hero-desc">Platform terpadu untuk mengelola seluruh operasional sekolah — dari penerimaan siswa baru (PPDB), data siswa & guru, kelas & tahun ajaran, kenaikan kelas, penjadwalan pelajaran, presensi, hingga input nilai dan rapor digital. Satu sistem untuk admin, guru/wali kelas, dan siswa.</p>
      <div class="tag-list">
        <span class="tag teal">PPDB Online</span>
        <span class="tag">Web Based</span>
        <span class="tag">Multi Role</span>
        <span class="tag">Rapor PDF</span>
      </div>
      <div class="hero-actions">
        <a href="{{ route('contact') }}" class="btn-primary">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          Demo
        </a>
        <a href="#pricing" class="btn-secondary">Lihat Harga</a>
      </div>
    </div>
    <div class="hero-image">
      <img src="{{ asset('images/erpsekolah/beranda.png') }}" alt="Sistem Informasi Sekolah">
    </div>
  </div>

  <!-- ── Screenshot Gallery ── -->
  <div class="gallery-section">
    <p class="section-label">Screenshots</p>

    <!-- Tabs -->
    <div class="tab-nav">
      <button class="tab-btn active" data-tab="beranda">
        Beranda &amp; PPDB <span class="tab-count">5</span>
      </button>
      <button class="tab-btn" data-tab="kesiswaan">
        Kesiswaan &amp; Akademik <span class="tab-count">6</span>
      </button>
      <button class="tab-btn" data-tab="jadwal">
        Penjadwalan <span class="tab-count">5</span>
      </button>
      <button class="tab-btn" data-tab="presensi">
        Presensi <span class="tab-count">3</span>
      </button>
      <button class="tab-btn" data-tab="nilai">
        Nilai &amp; Rapor <span class="tab-count">4</span>
      </button>
    </div>

    <!-- Beranda & PPDB -->
    <div class="tab-panel active" data-panel="beranda">
      <div class="screenshots-grid">
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/beranda.png') }}" data-caption="Landing Page">
          <img src="{{ asset('images/erpsekolah/beranda.png') }}" alt="Beranda">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Landing Page</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/login.png') }}" data-caption="Halaman Login">
          <img src="{{ asset('images/erpsekolah/login.png') }}" alt="Login">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Halaman Login</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/ppdb-daftar.png') }}" data-caption="Formulir PPDB Online">
          <img src="{{ asset('images/erpsekolah/ppdb-daftar.png') }}" alt="Formulir PPDB">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Formulir PPDB Online</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/pengumuman.png') }}" data-caption="Pengumuman Publik">
          <img src="{{ asset('images/erpsekolah/pengumuman.png') }}" alt="Pengumuman">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Pengumuman Publik</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/ppdb-admin.png') }}" data-caption="Kelola Pendaftar PPDB">
          <img src="{{ asset('images/erpsekolah/ppdb-admin.png') }}" alt="PPDB Admin">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Kelola Pendaftar PPDB</div>
        </div>
      </div>
    </div>

    <!-- Kesiswaan & Akademik -->
    <div class="tab-panel" data-panel="kesiswaan">
      <div class="screenshots-grid">
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/dashboard-admin.png') }}" data-caption="Dashboard Admin">
          <img src="{{ asset('images/erpsekolah/dashboard-admin.png') }}" alt="Dashboard Admin">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Dashboard Admin</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/data-siswa.png') }}" data-caption="Master Data Siswa">
          <img src="{{ asset('images/erpsekolah/data-siswa.png') }}" alt="Data Siswa">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Master Data Siswa</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/data-guru.png') }}" data-caption="Data Guru & Staf">
          <img src="{{ asset('images/erpsekolah/data-guru.png') }}" alt="Data Guru">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Data Guru & Staf</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/data-kelas.png') }}" data-caption="Kelola Kelas">
          <img src="{{ asset('images/erpsekolah/data-kelas.png') }}" alt="Data Kelas">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Kelola Kelas</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/tahun-ajaran.png') }}" data-caption="Tahun Ajaran">
          <img src="{{ asset('images/erpsekolah/tahun-ajaran.png') }}" alt="Tahun Ajaran">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Tahun Ajaran</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/approval-kenaikan.png') }}" data-caption="Approval Kenaikan Kelas">
          <img src="{{ asset('images/erpsekolah/approval-kenaikan.png') }}" alt="Approval Kenaikan Kelas">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Approval Kenaikan Kelas</div>
        </div>
      </div>
    </div>

    <!-- Penjadwalan -->
    <div class="tab-panel" data-panel="jadwal">
      <div class="screenshots-grid">
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/mata-pelajaran.png') }}" data-caption="Master Mata Pelajaran">
          <img src="{{ asset('images/erpsekolah/mata-pelajaran.png') }}" alt="Mata Pelajaran">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Master Mata Pelajaran</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/pengampu-mapel.png') }}" data-caption="Penugasan Guru per Mapel">
          <img src="{{ asset('images/erpsekolah/pengampu-mapel.png') }}" alt="Penugasan Guru">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Penugasan Guru per Mapel</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/jadwal-admin.png') }}" data-caption="Susun Jadwal Mingguan">
          <img src="{{ asset('images/erpsekolah/jadwal-admin.png') }}" alt="Jadwal Admin">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Susun Jadwal Mingguan</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/jadwal-guru.png') }}" data-caption="Jadwal Mengajar Guru">
          <img src="{{ asset('images/erpsekolah/jadwal-guru.png') }}" alt="Jadwal Guru">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Jadwal Mengajar Guru</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/jadwal-siswa.png') }}" data-caption="Jadwal Kelas — Tampilan Siswa">
          <img src="{{ asset('images/erpsekolah/jadwal-siswa.png') }}" alt="Jadwal Siswa">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Jadwal Kelas — Tampilan Siswa</div>
        </div>
      </div>
    </div>

    <!-- Presensi -->
    <div class="tab-panel" data-panel="presensi">
      <div class="screenshots-grid">
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/presensi-guru.png') }}" data-caption="Input Presensi — Guru">
          <img src="{{ asset('images/erpsekolah/presensi-guru.png') }}" alt="Presensi Guru">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Input Presensi — Guru</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/rekap-presensi-admin.png') }}" data-caption="Rekap Presensi — Admin">
          <img src="{{ asset('images/erpsekolah/rekap-presensi-admin.png') }}" alt="Rekap Presensi Admin">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Rekap Presensi — Admin</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/presensi-siswa.png') }}" data-caption="Rekap Presensi — Siswa">
          <img src="{{ asset('images/erpsekolah/presensi-siswa.png') }}" alt="Presensi Siswa">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Rekap Presensi — Siswa</div>
        </div>
      </div>
    </div>

    <!-- Nilai & Rapor -->
    <div class="tab-panel" data-panel="nilai">
      <div class="screenshots-grid">
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/nilai-guru.png') }}" data-caption="Input Nilai & Nilai Akhir Otomatis">
          <img src="{{ asset('images/erpsekolah/nilai-guru.png') }}" alt="Input Nilai">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Input Nilai & Nilai Akhir Otomatis</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/rapor-wali-kelas.png') }}" data-caption="Rapor — Catatan Wali Kelas">
          <img src="{{ asset('images/erpsekolah/rapor-wali-kelas.png') }}" alt="Rapor Wali Kelas">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Rapor — Catatan Wali Kelas</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/rapor-siswa.png') }}" data-caption="Rapor Digital — Tampilan Siswa">
          <img src="{{ asset('images/erpsekolah/rapor-siswa.png') }}" alt="Rapor Siswa">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Rapor Digital — Tampilan Siswa</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/erpsekolah/dashboard-siswa.png') }}" data-caption="Dashboard Siswa">
          <img src="{{ asset('images/erpsekolah/dashboard-siswa.png') }}" alt="Dashboard Siswa">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Dashboard Siswa</div>
        </div>
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
  <div class="bottom-grid">

    <div>
      <p class="section-label">Fitur Utama</p>
      <div class="feature-list">

        <div class="feature-item">
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5-10-5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div>
          <div>
            <div class="feature-text-title">PPDB Online</div>
            <div class="feature-text-desc">Pendaftaran siswa baru lewat formulir publik, verifikasi bertahap oleh panitia, sampai otomatis jadi akun siswa begitu diterima.</div>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
          <div>
            <div class="feature-text-title">Data Siswa, Guru & Kelas</div>
            <div class="feature-text-desc">Master data terpusat: siswa aktif, guru & mata pelajaran yang diampu, kelas per tahun ajaran, lengkap dengan penempatan &amp; kenaikan kelas.</div>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg></div>
          <div>
            <div class="feature-text-title">Penjadwalan Otomatis</div>
            <div class="feature-text-desc">Susun jadwal mingguan per kelas dengan validasi bentrok otomatis — guru atau kelas tidak bisa terjadwal dobel di jam yang sama.</div>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></div>
          <div>
            <div class="feature-text-title">Presensi Digital</div>
            <div class="feature-text-desc">Guru input presensi per jam pelajaran, otomatis tervalidasi sesuai jadwal & tanggal. Rekap real-time untuk siswa, wali kelas, hingga admin.</div>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8zM14 2v6h6M16 13H8M16 17H8M10 9H8"/></svg></div>
          <div>
            <div class="feature-text-title">Nilai & Rapor Digital</div>
            <div class="feature-text-desc">Input nilai per jenis penilaian (tugas, ulangan, UTS, UAS) dengan bobot, kalkulasi nilai akhir otomatis, dan rapor siap unduh dalam format PDF.</div>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/><path d="M12 6v6l4 2"/></svg></div>
          <div>
            <div class="feature-text-title">Multi Role & Hak Akses</div>
            <div class="feature-text-desc">Admin, Kepala Sekolah, TU, Guru/Wali Kelas, dan Siswa masing-masing punya tampilan & akses sesuai perannya.</div>
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
          <div class="pricing-price">Rp 15 jt</div>
          <div class="pricing-period">sekali bayar</div>
          <ul class="pricing-items">
             <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>PPDB Online</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Data Siswa, Guru & Kelas</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Penjadwalan & Presensi</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Instalasi On-premise / VPS</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Support Teknis</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Kenaikan Kelas & Approval</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Nilai, Rapor & Export PDF</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Online VPS 1 tahun</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Support Teknis</li>
          </ul>
        </div>

      </div>
    </div>

  </div>

  <!-- CTA -->
  <div class="cta-box">
    <div class="cta-title">Tertarik menggunakan aplikasi ini?</div>
    <div class="cta-desc">Hubungi kami untuk konsultasi gratis dan demo langsung sesuai kebutuhan sekolah Anda.</div>
    <a href="mailto:halloooyala@gmail.com" class="btn-primary" style="margin:0 auto; width:fit-content;">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 7 10-7"/></svg>
      Hubungi Kami
    </a>
  </div>

  <footer class="footer">© 2026 Yala Labs</footer>

</div>

<script>
  // ── Tabs ──
  const tabBtns   = document.querySelectorAll('.tab-btn');
  const tabPanels = document.querySelectorAll('.tab-panel');

  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const target = btn.dataset.tab;
      tabBtns.forEach(b => b.classList.remove('active'));
      tabPanels.forEach(p => p.classList.remove('active'));
      btn.classList.add('active');
      document.querySelector(`[data-panel="${target}"]`).classList.add('active');
    });
  });

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

  document.querySelectorAll('.screenshot-item').forEach(item => {
    item.addEventListener('click', () => {
      const panel  = item.closest('.tab-panel');
      const items  = Array.from(panel.querySelectorAll('.screenshot-item'));
      const index  = items.indexOf(item);
      openLightbox(items, index);
    });
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
