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
    display: grid;
    grid-template-columns: 40fr 60fr;
    column-gap: 28px;
    row-gap: 40px;
    align-items: start;
  }

  .screenshot-placeholder {
    background: var(--card-bg);
    border-radius: 10px;
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
  }

  .screenshot-placeholder img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    border-radius: 10px;
  }

  @media (max-width: 1023px) {
    .sidebar { order: -1; }
  }

  @media (max-width: 767px) {
    .split-grid { grid-template-columns: 1fr; }
  }

  /* ── Footer ───────────────────────────────────── */
  .footer {
    font-family: var(--mono);
    font-size: 10px;
    letter-spacing: 0.06em;
    color: var(--faint);
    padding-top: 20px;
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
            We use the following technologies
          </div>
          <div class="tag-list" style="margin-top:12px;">
            <span class="tag">Laravel</span>
            <span class="tag">MySQL</span>
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
      Our Products
    </div>

    <div class="split-grid">

      <!-- Baris 1 -->
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

      <!-- Baris 2 -->
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
      <p class="job-title">Web Application Developer</p>
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

      
    </div>
  </aside>

</div>
</body>
</html>
