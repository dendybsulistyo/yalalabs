<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Yala Labs</title>
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
  }

  html { height: 100%; }

  body {
    font-family: var(--sans);
    background-color: var(--bg);
    color: var(--text);
    font-size: 14px;
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  ::selection { background: #d0e1fb; color: #2c4a6e; }

  /* ── Layout ───────────────────────────────────── */
  .layout {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  @media (min-width: 1024px) {
    .layout {
      flex-direction: row;
      align-items: flex-start;
    }
  }

  /* ── Sidebar ──────────────────────────────────── */
  .sidebar {
    background: var(--white);
    padding: 48px 32px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: left;
  }

  @media (min-width: 768px) and (max-width: 1023px) {
    .sidebar { padding: 64px 80px; }
  }

  @media (min-width: 1024px) {
    .sidebar {
      width: 38%;
      min-width: 320px;
      max-width: 480px;
      position: sticky;
      top: 0;
      height: 100vh;
      overflow-y: auto;
      justify-content: flex-start;
      padding: 114px 48px 64px;
    }
  }

  .sidebar-inner {
    max-width: 280px;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }

  /* ── Avatar ───────────────────────────────────── */
  .avatar {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    overflow: hidden;
    margin-bottom: 28px;
    flex-shrink: 0;
    background: var(--tag-bg);
  }

  .avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }

  @media (max-width: 400px) {
    .avatar { width: 112px; height: 112px; }
  }

  /* ── Name / Title / Bio ───────────────────────── */
  .name {
    font-size: 28px;
    font-weight: 700;
    color: var(--black);
    letter-spacing: -0.01em;
    margin-bottom: 4px;
  }

  .job-title {
    font-size: 16px;
    font-weight: 600;
    color: var(--muted);
    margin-bottom: 16px;
  }

  .bio {
    font-size: 15px;
    color: var(--muted);
    line-height: 1.8;
    margin-bottom: 28px;
  }

  /* ── Contact ──────────────────────────────────── */
  .contact-list {
    list-style: none;
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 28px;
  }

  .contact-item {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 8px;
    color: var(--muted);
    font-family: var(--mono);
    font-size: 13px;
    letter-spacing: 0.03em;
  }

  .contact-item svg { flex-shrink: 0; opacity: 0.65; }

  /* ── Social Links ─────────────────────────────── */
  .social-links {
    display: flex;
    gap: 24px;
    margin-bottom: 36px;
  }

  .social-link {
    display: flex;
    align-items: center;
    gap: 6px;
    color: var(--muted);
    text-decoration: none;
    font-family: var(--mono);
    font-size: 11.5px;
    letter-spacing: 0.03em;
    transition: color 0.18s;
  }

  .social-link:hover { color: var(--black); }

  /* ── CTA Button ───────────────────────────────── */
  .btn-contact {
    width: 100%;
    padding: 13px 28px;
    background: var(--black);
    color: var(--white);
    font-family: var(--sans);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    cursor: pointer;
    border: none;
    border-radius: 3px;
    transition: opacity 0.18s;
  }

  .btn-contact:hover { opacity: 0.8; }

  /* ── Main Content ─────────────────────────────── */
  .main {
    flex: 1;
    background: var(--bg);
    padding: 48px 32px;
  }

  @media (min-width: 768px) and (max-width: 1023px) {
    .main { padding: 64px 80px; }
  }

  @media (min-width: 1024px) {
    .main { padding: 64px 56px; }
  }

  .main-inner {
    max-width: 600px;
    margin: 0 auto;
    width: 100%;
  }

  /* ── Section ──────────────────────────────────── */
  .section { margin-bottom: 52px; }

  .section-heading {
    font-size: 10px;
    font-family: var(--mono);
    font-weight: 500;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--faint);
    margin-bottom: 28px;
  }

  /* ── Skills ───────────────────────────────────── */
  .skills-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 28px;
  }

  @media (min-width: 560px) {
    .skills-grid { grid-template-columns: 1fr 1fr; }
    .skill-group.full { grid-column: 1 / -1; }
  }

  .skill-group-label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    font-weight: 600;
    color: var(--muted);
    margin-bottom: 12px;
  }

  .skill-group-label svg { opacity: 0.55; flex-shrink: 0; }

  .tag-list {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
  }

  .tag {
    padding: 5px 13px;
    background: var(--tag-bg);
    font-family: var(--mono);
    font-size: 11.5px;
    letter-spacing: 0.03em;
    border-radius: 4px;
    cursor: default;
    user-select: none;
    transition: background 0.18s, color 0.18s, transform 0.15s;
  }

  .tag:hover {
    background: var(--black);
    color: var(--white);
    transform: translateY(-2px);
  }

  /* ── Experience ───────────────────────────────── */
  .exp-list {
    display: flex;
    flex-direction: column;
    gap: 36px;
  }

  .exp-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 8px;
    flex-wrap: wrap;
  }

  .exp-role {
    font-size: 15px;
    font-weight: 700;
    color: var(--black);
  }

  .exp-company {
    font-size: 13px;
    font-weight: 600;
    color: var(--muted);
    margin-top: 2px;
    margin-bottom: 10px;
  }

  .exp-period {
    font-family: var(--mono);
    font-size: 10.5px;
    letter-spacing: 0.08em;
    color: var(--faint);
    white-space: nowrap;
    padding-top: 3px;
    flex-shrink: 0;
  }

  .exp-desc {
    font-size: 13.5px;
    color: var(--muted);
    line-height: 1.8;
    margin-bottom: 12px;
  }

  .btn-detail {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 7px 18px;
    background: #2563eb;
    color: #ffffff;
    font-family: var(--mono);
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.06em;
    text-decoration: none;
    border-radius: 6px;
    transition: background 0.18s, gap 0.18s, box-shadow 0.18s;
  }

  .btn-detail:hover {
    background: #1d4ed8;
    gap: 10px;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.35);
  }

  

  /* ── Split Grid (Experience) ─────────────────── */
  .split-grid {
    display: flex;
    flex-direction: column;
    gap: 24px;
  }

  .product-card {
    display: grid;
    grid-template-columns: 40fr 60fr;
    column-gap: 28px;
    align-items: center;
    background: var(--white);
    border-radius: 6px;
    padding: 20px;
    box-shadow: 0 1px 3px rgba(17, 17, 17, 0.06), 0 8px 24px rgba(17, 17, 17, 0.04);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .product-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 10px rgba(17, 17, 17, 0.08), 0 16px 32px rgba(17, 17, 17, 0.08);
  }

  .screenshot-placeholder {
    background: var(--card-bg);
    border-radius: 4px;
    min-height: 150px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: var(--faint);
    font-family: var(--mono);
    font-size: 11px;
    letter-spacing: 0.06em;
    overflow: hidden;
    box-shadow: inset 0 0 0 1px rgba(17, 17, 17, 0.06);
  }

  .screenshot-placeholder img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    border-radius: 4px;
  }

  @media (max-width: 1023px) {
    .sidebar { order: -1; }
  }

  @media (max-width: 767px) {
    .product-card { grid-template-columns: 1fr; }
  }

  /* ── Footer ───────────────────────────────────── */
  .footer {
    font-family: var(--mono);
    font-size: 10px;
    letter-spacing: 0.06em;
    color: var(--faint);
    padding-top: 20px;
  }


  /* ── WhatsApp CTA ─────────────────────────────── */
  .whatsapp-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    padding: 12px 20px;
    background: #25D366;
    color: #ffffff;
    text-decoration: none;
    font-family: var(--sans);
    font-size: 13px;
    font-weight: 700;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(37, 211, 102, 0.28);
    transition: background 0.18s, transform 0.15s, box-shadow 0.18s;
  }

  .whatsapp-btn:hover {
    background: #20bd5a;
    transform: translateY(-1px);
    box-shadow: 0 4px 14px rgba(37, 211, 102, 0.38);
  }

  .whatsapp-btn svg { flex-shrink: 0; }

  /* ── Support note ─────────────────────────────── */
  .support-note {
    width: 100%;
    text-align: center;
    font-family: var(--mono);
    font-size: 11.5px;
    color: var(--faint);
    letter-spacing: 0.02em;
    margin-top: 18px;
    padding-top: 18px;
    border-top: 1px solid var(--tag-bg);
  }

</style>
</head>
<body>

<div class="layout">

  <!-- Main Content -->
  <main class="main">
  <div class="main-inner">

    <!-- Skills -->
    <section class="section">
      <div class="skills-grid">
        <div class="skill-group full">
          <div class="skill-group-label">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="3" width="7" height="7" rx="1"/>
              <rect x="14" y="3" width="7" height="7" rx="1"/>
              <rect x="3" y="14" width="7" height="7" rx="1"/>
              <rect x="14" y="14" width="7" height="7" rx="1"/>
            </svg>
            Teknologi yang digunakan
          </div>
          <div class="tag-list" style="margin-top:12px;">
            <span class="tag">Laravel</span>
            <span class="tag">Cloudflare</span>
            <span class="tag">Linux</span>
          </div>
        </div>
      </div>
    </section>
    

    <div class="skill-group-label" style="margin-bottom:20px;">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
        <rect x="3" y="3" width="7" height="7" rx="1"/>
        <rect x="14" y="3" width="7" height="7" rx="1"/>
        <rect x="3" y="14" width="7" height="7" rx="1"/>
        <rect x="14" y="14" width="7" height="7" rx="1"/>
      </svg>
      Produk Kami
    </div>

    <div class="split-grid">

      <div class="product-card">
        <div class="screenshot-placeholder">
          <img src="{{ asset('images/portalticket.png') }}" alt="App Screenshot">
        </div>
        <div class="exp-item">
          <div class="exp-role">Knowledge Base & Ticket System</div>
          <div class="exp-company">Web Based</div>
          <p class="exp-desc">Mengelola keluhan User dan permasalahan Layanan di instansi / unit kerja Anda secara efisien.</p>
          <a href="{{ route('ticket-system') }}" class="btn-detail">
            Detail
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
          </a>
        </div>
      </div>

      <div class="product-card">
        <div class="screenshot-placeholder">
          <img src="{{ asset('images/klinik/beranda.png') }}" alt="Sistem Informasi Klinik">
        </div>
        <div class="exp-item">
          <div class="exp-role">Sistem Informasi Klinik</div>
          <div class="exp-company">Web Based</div>
          <p class="exp-desc">Mengelola Rumah Sakit dan Klinik dengan menggunakan standart HL7 FHIR, ICD10, LOINC dan lain lain</p>
          <a href="{{ route('klinik-system') }}" class="btn-detail">
            Detail
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
          </a>
        </div>
      </div>

      <div class="product-card">
        <div class="screenshot-placeholder">
          <img src="{{ asset('images/erpsekolah/beranda.png') }}" alt="Sistem Informasi Sekolah">
        </div>
        <div class="exp-item">
          <div class="exp-role">Sistem Informasi Sekolah</div>
          <div class="exp-company">Web Based</div>
          <p class="exp-desc">Mengelola PPDB, data siswa & guru, penjadwalan, presensi, hingga nilai dan rapor digital dalam satu platform terpadu.</p>
          <a href="{{ route('erpsekolah-system') }}" class="btn-detail">
            Detail
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
          </a>
        </div>
      </div>

    </div>

    <footer class="footer">© 2026 Yala Labs</footer>

  </div>
  </main>

  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-inner">

      <div class="avatar">
        <img src={{ asset('images/yala.png') }}>
      </div>

      <h1 class="name">Yala Labs</h1>
      <p class="job-title">Web App / Laravel Developer</p>
      <p class="bio">lets connect and solve the problems</p>

      <ul class="contact-list">
        <li class="contact-item">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="1.8"
            stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/>
            <path d="M2 12h20"/>
            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
        </svg>
          yala.web.id
        </li>
        <li class="contact-item">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <rect x="2" y="4" width="20" height="16" rx="2"/>
            <path d="m2 7 10 7 10-7"/>
          </svg>
          halloooyala@gmail.com
        </li>
  
        <li class="contact-item">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
            <circle cx="12" cy="9" r="2.5"/>
          </svg>
         Yogyakarta, Indonesia
        </li>
      </ul>

      <a href="https://wa.me/6283896247627" target="_blank" class="whatsapp-btn">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2.05 22l5.25-1.38a9.9 9.9 0 0 0 4.74 1.21h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.87 9.87 0 0 0 12.04 2zm5.8 14.09c-.24.68-1.4 1.32-1.94 1.4-.5.08-1.11.11-1.79-.11-.41-.13-.94-.3-1.62-.6-2.85-1.23-4.71-4.1-4.85-4.29-.14-.19-1.16-1.54-1.16-2.94s.73-2.09 1-2.37c.24-.27.53-.34.71-.34.18 0 .36 0 .51.01.17.01.38-.06.6.45.24.56.8 1.96.87 2.1.07.14.11.31.02.5-.09.19-.14.31-.27.47-.14.16-.29.36-.41.48-.14.14-.28.29-.12.57.16.28.71 1.17 1.53 1.9 1.05.94 1.94 1.23 2.22 1.37.28.14.44.12.61-.07.16-.19.68-.79.87-1.06.18-.27.37-.22.62-.13.25.09 1.6.75 1.87.89.27.14.46.2.52.32.07.12.07.68-.17 1.36z"/>
        </svg>
        WhatsApp
      </a>

      <p class="support-note">support by CV. Andita Yogyakarta</p>
    </div>
  </aside>

</div>
</body>
</html>
