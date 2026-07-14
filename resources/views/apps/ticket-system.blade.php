<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Knowledge Base & Ticket System — Yala Labs</title>
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
    --blue: #2563eb;
    --blue-dark: #1d4ed8;
    --blue-light: #eff6ff;
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
    background: var(--blue-light); color: var(--blue);
    font-family: var(--mono); font-size: 10px; font-weight: 600;
    letter-spacing: .12em; text-transform: uppercase;
    padding: 5px 12px; border-radius: 20px; margin-bottom: 16px;
  }

  .hero-title { font-size: 30px; font-weight: 800; color: var(--black); letter-spacing: -.02em; line-height: 1.2; margin-bottom: 16px; }
  @media (min-width: 768px) { .hero-title { font-size: 38px; } }

  .hero-desc { font-size: 15px; color: var(--muted); line-height: 1.85; margin-bottom: 28px; }

  .tag-list { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 32px; }
  .tag { padding: 4px 12px; background: var(--tag-bg); font-family: var(--mono); font-size: 11px; letter-spacing: .03em; border-radius: 4px; }
  .tag.blue { background: var(--blue-light); color: var(--blue); }

  .hero-actions { display: flex; gap: 12px; flex-wrap: wrap; }

  .btn-primary {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 11px 24px; background: var(--blue); color: var(--white);
    font-family: var(--mono); font-size: 11px; font-weight: 600;
    letter-spacing: .06em; text-decoration: none; border-radius: 6px;
    transition: background .18s, box-shadow .18s;
  }
  .btn-primary:hover { background: var(--blue-dark); box-shadow: 0 4px 14px rgba(37,99,235,.35); }

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

  /* ── Tab Gallery ──────────────────────────────────────── */
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
  .tab-btn.active { color: var(--blue); border-bottom-color: var(--blue); }

  .tab-count {
    display: inline-flex; align-items: center; justify-content: center;
    width: 18px; height: 18px; border-radius: 50%;
    background: var(--tag-bg); font-size: 10px; color: var(--faint);
  }
  .tab-btn.active .tab-count { background: var(--blue-light); color: var(--blue); }

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

  /* ── Lightbox ──────────────────────────────────────── */
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

  /* ── Features + Pricing ───────────────────────────── */
  .bottom-grid { display: grid; grid-template-columns: 1fr; gap: 40px; margin-bottom: 72px; }
  @media (min-width: 768px) { .bottom-grid { grid-template-columns: 1fr 1fr; gap: 48px; } }

  .feature-list { display: flex; flex-direction: column; gap: 16px; }
  .feature-item { display: flex; gap: 14px; align-items: flex-start; }
  .feature-icon { width: 32px; height: 32px; border-radius: 8px; background: var(--blue-light); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
  .feature-icon svg { color: var(--blue); }
  .feature-text-title { font-size: 14px; font-weight: 700; color: var(--black); margin-bottom: 4px; }
  .feature-text-desc { font-size: 13.5px; color: var(--muted); line-height: 1.75; }

  /* Pricing */
  .pricing-grid { display: flex; flex-direction: column; gap: 16px; }

  .pricing-card { background: var(--white); border-radius: 12px; padding: 24px; }
  .pricing-card.featured { background: var(--blue); color: var(--white); }
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
  .pricing-item svg { flex-shrink: 0; color: var(--blue); }

  /* CTA */
  .cta-box { background: var(--black); border-radius: 16px; padding: 48px 40px; text-align: center; }
  .cta-title { font-size: 22px; font-weight: 800; color: var(--white); letter-spacing: -.01em; margin-bottom: 10px; }
  .cta-desc { font-size: 13.5px; color: rgba(255,255,255,.55); margin-bottom: 28px; line-height: 1.7; }

  .footer { margin-top: 64px; font-family: var(--mono); font-size: 10px; letter-spacing: .06em; color: var(--faint); }
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
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        Web Application
      </div>
      <h1 class="hero-title">Knowledge Base &amp;<br>Ticket System</h1>
      <p class="hero-desc">Kelola keluhan dan permasalahan layanan di instansi atau unit kerja Anda secara terpusat. Setiap tiket tercatat, terlacak, dan tertangani secara efisien — lengkap dengan fitur chat antara user dan Technical Support.</p>
      <div class="tag-list">
        <span class="tag blue">Laravel</span>
        <span class="tag blue">Alpine.js</span>
        <span class="tag blue">MySQL</span>
        <span class="tag">Web Based</span>
        <span class="tag">Multi User</span>
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
      <img src="{{ asset('images/tickets/beranda.png') }}" alt="Knowledge Base & Ticket System">
    </div>
  </div>

  <!-- ── Demo Gallery ── -->
  <div class="gallery-section">
    <p class="section-label">Screenshots</p>

    <!-- Tabs -->
    <div class="tab-nav">
      <button class="tab-btn active" data-tab="beranda">
        Beranda <span class="tab-count">3</span>
      </button>
      <button class="tab-btn" data-tab="admin">
        Dashboard Admin <span class="tab-count">7</span>
      </button>
      <button class="tab-btn" data-tab="agent">
        Dashboard Agent <span class="tab-count">4</span>
      </button>
      <button class="tab-btn" data-tab="user">
        Dashboard User <span class="tab-count">4</span>
      </button>
    </div>

    <!-- Beranda -->
    <div class="tab-panel active" data-panel="beranda">
      <div class="screenshots-grid">
        <div class="screenshot-item" data-src="{{ asset('images/tickets/beranda.png') }}" data-caption="Beranda — Hero">
          <img src="{{ asset('images/tickets/beranda.png') }}" alt="Beranda">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Hero — Landing Page</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/tickets/beranda2.png') }}" data-caption="Beranda — Knowledge Base">
          <img src="{{ asset('images/tickets/beranda2.png') }}" alt="Beranda 2">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Knowledge Base</div>
        </div>
        <div class="screenshot-item" data-src="{{ asset('images/tickets/beranda3.png') }}" data-caption="Beranda — Artikel Detail">
          <img src="{{ asset('images/tickets/beranda3.png') }}" alt="Beranda 3">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Artikel Detail</div>
        </div>
      </div>
    </div>

    <!-- Admin -->
    <div class="tab-panel" data-panel="admin">
      <div class="screenshots-grid">
        @foreach(range(1,7) as $i)
        <div class="screenshot-item" data-src="{{ asset('images/tickets/dashboardAdmin'.$i.'.png') }}" data-caption="Dashboard Admin — {{ $i }}">
          <img src="{{ asset('images/tickets/dashboardAdmin'.$i.'.png') }}" alt="Dashboard Admin {{ $i }}">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Admin — Halaman {{ $i }}</div>
        </div>
        @endforeach
      </div>
    </div>

    <!-- Agent -->
    <div class="tab-panel" data-panel="agent">
      <div class="screenshots-grid">
        @foreach(range(1,4) as $i)
        <div class="screenshot-item" data-src="{{ asset('images/tickets/dashboardAgent'.$i.'.png') }}" data-caption="Dashboard Agent — {{ $i }}">
          <img src="{{ asset('images/tickets/dashboardAgent'.$i.'.png') }}" alt="Dashboard Agent {{ $i }}">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">Agent — Halaman {{ $i }}</div>
        </div>
        @endforeach
      </div>
    </div>

    <!-- User -->
    <div class="tab-panel" data-panel="user">
      <div class="screenshots-grid">
        @foreach(range(1,4) as $i)
        <div class="screenshot-item" data-src="{{ asset('images/tickets/dashboardUser'.$i.'.png') }}" data-caption="Dashboard User — {{ $i }}">
          <img src="{{ asset('images/tickets/dashboardUser'.$i.'.png') }}" alt="Dashboard User {{ $i }}">
          <div class="screenshot-overlay"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></div>
          <div class="screenshot-caption">User — Halaman {{ $i }}</div>
        </div>
        @endforeach
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
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
          <div>
            <div class="feature-text-title">Tiket & Live Chat</div>
            <div class="feature-text-desc">Keluhan user masuk sebagai tiket dan dapat dikomunikasikan langsung via chat dengan Technical Support.</div>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
          <div>
            <div class="feature-text-title">Tracking Status Real-time</div>
            <div class="feature-text-desc">Setiap tiket terlacak statusnya dari open hingga resolved secara real-time.</div>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
          <div>
            <div class="feature-text-title">Multi Role</div>
            <div class="feature-text-desc">Admin, Agent/Support, dan User memiliki akses dan tampilan yang berbeda sesuai kebutuhan.</div>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div>
          <div>
            <div class="feature-text-title">Laporan & Statistik</div>
            <div class="feature-text-desc">Dashboard dengan grafik dan laporan performa penanganan tiket per periode.</div>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div>
          <div>
            <div class="feature-text-title">Knowledge Base + AI Suggest</div>
            <div class="feature-text-desc">Artikel panduan tersusun rapi dengan saran artikel berbasis AI saat user membuat tiket (*)</div>
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
          <div class="pricing-price">Rp 10 jt</div>
          <div class="pricing-period">sekali bayar</div>
          <ul class="pricing-items">
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Manajemen tiket</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Live chat</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Knowledge base</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>AI article suggestion(*)</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Instalasi (On-premise / VPS)</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>VPS 1 Tahun (Gratis Tahun Pertama)</li>
            <li class="pricing-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>6 bulan support</li>
          </ul>
        </div>

      </div>
    </div>

  </div>

  <!-- CTA -->
  <div class="cta-box">
    <div class="cta-title">Tertarik menggunakan aplikasi ini?</div>
    <div class="cta-desc">Hubungi kami untuk konsultasi gratis dan demo langsung sesuai kebutuhan instansi Anda.</div>
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
