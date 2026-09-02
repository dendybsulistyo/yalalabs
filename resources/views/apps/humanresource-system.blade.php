<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Human Resource — Yala Labs</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box} body{margin:0;background:#f7f9fc;color:#172033;font:15px/1.7 Inter,Arial,sans-serif}.page{max-width:1160px;margin:auto;padding:48px 28px 80px}.back{display:inline-flex;gap:7px;align-items:center;color:#64748b;text-decoration:none;font:11px 'JetBrains Mono',monospace;letter-spacing:.05em}.back:hover{color:#2563eb}.hero{display:grid;grid-template-columns:1fr;gap:42px;margin:48px 0 76px;align-items:center}.eyebrow{display:inline-flex;gap:7px;align-items:center;border:1px solid #bfdbfe;background:#eff6ff;border-radius:20px;padding:5px 11px;color:#2563eb;font:600 10px 'JetBrains Mono',monospace;letter-spacing:.1em}.eyebrow i{height:6px;width:6px;border-radius:50%;background:#2563eb}.title{font-size:34px;line-height:1.15;letter-spacing:-.035em;margin:18px 0}.desc{color:#64748b;max-width:540px}.tags{display:flex;flex-wrap:wrap;gap:8px;margin:26px 0}.tag{font:11px 'JetBrains Mono',monospace;background:#eef2f7;color:#475569;border-radius:5px;padding:4px 10px}.button{display:inline-flex;align-items:center;gap:8px;padding:11px 20px;border-radius:7px;background:#2563eb;color:#fff;text-decoration:none;font:600 11px 'JetBrains Mono',monospace;letter-spacing:.04em;box-shadow:0 8px 18px #2563eb2b}.button:hover{background:#1d4ed8}.hero-shot{overflow:hidden;border:1px solid #dbe4ef;border-radius:14px;background:#fff;box-shadow:0 20px 55px #0f172a14}.hero-shot img{display:block;width:100%}.section-label{margin:0 0 20px;color:#64748b;font:600 10px 'JetBrains Mono',monospace;letter-spacing:.16em}.gallery{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}.shot{overflow:hidden;position:relative;border:1px solid #dbe4ef;border-radius:11px;background:#fff;cursor:zoom-in}.shot img{width:100%;display:block;transition:transform .25s}.shot:hover img{transform:scale(1.025)}.caption{padding:9px 12px;border-top:1px solid #edf1f6;color:#64748b;font:11px 'JetBrains Mono',monospace}.note{margin-top:12px;color:#94a3b8;font-size:12px}.bottom{display:grid;grid-template-columns:1fr;gap:36px;margin-top:74px;padding-top:56px;border-top:1px solid #dbe4ef}.feature{display:flex;gap:14px;margin-bottom:18px}.icon{flex:0 0 34px;height:34px;display:grid;place-items:center;border-radius:9px;background:#eff6ff;color:#2563eb;font-weight:700}.feature h3{font-size:14px;margin:0 0 3px}.feature p{margin:0;color:#64748b;font-size:13px}.cta{border-radius:14px;padding:34px;background:#10255b;color:#fff}.cta h2{margin:0;font-size:23px;letter-spacing:-.025em}.cta p{color:#cbd5e1;font-size:13px}.cta .button{background:#fff;color:#1d4ed8;box-shadow:none}@media(min-width:760px){.page{padding:64px 50px 100px}.hero{grid-template-columns:1fr 1fr;gap:52px}.title{font-size:42px}.gallery{grid-template-columns:repeat(3,1fr);gap:16px}.shot:first-child{grid-column:span 2}.bottom{grid-template-columns:1.1fr .9fr;gap:72px}}@media(max-width:560px){.gallery{grid-template-columns:1fr}.shot:first-child{grid-column:auto}.page{padding:32px 18px 64px}}
    </style>
</head>
<body>
<main class="page">
    <a class="back" href="{{ url('/') }}">← KEMBALI KE YALA LABS</a>
    <section class="hero">
        <div>
            <span class="eyebrow"><i></i> WEB APPLICATION</span>
            <h1 class="title">Sistem Human<br>Resource</h1>
            <p class="desc">Sistem terpusat untuk mengelola siklus kerja pegawai: data kepegawaian, kehadiran, cuti dan izin, perjalanan dinas, hingga payroll.</p>
            <div class="tags"><span class="tag">Multi Role</span><span class="tag">Web Based</span><span class="tag">Payroll</span><span class="tag">Approval Workflow</span></div>
            <a class="button" href="{{ route('contact') }}">KONSULTASIKAN KEBUTUHAN ANDA →</a>
        </div>
        <div class="hero-shot"><img src="{{ asset('images/humanresource/dashboard-preview.svg') }}" alt="Dashboard Sistem Human Resource"></div>
    </section>

    <section>
        <p class="section-label">SCREENSHOTS</p>
        <div class="gallery" id="gallery">
            <figure class="shot" data-src="{{ asset('images/humanresource/dashboard-preview.svg') }}" data-caption="Dashboard Human Resource"><img src="{{ asset('images/humanresource/dashboard-preview.svg') }}" alt="Dashboard Human Resource"><figcaption class="caption">Dashboard &amp; Ringkasan Aktivitas</figcaption></figure>
            <figure class="shot" data-src="{{ asset('images/humanresource/pegawai-preview.svg') }}" data-caption="Data Pegawai"><img src="{{ asset('images/humanresource/pegawai-preview.svg') }}" alt="Data Pegawai"><figcaption class="caption">Data Pegawai</figcaption></figure>
            <figure class="shot" data-src="{{ asset('images/humanresource/cuti-preview.svg') }}" data-caption="Cuti dan Izin"><img src="{{ asset('images/humanresource/cuti-preview.svg') }}" alt="Rekap Cuti dan Izin"><figcaption class="caption">Rekap Cuti &amp; Izin</figcaption></figure>
            <figure class="shot" data-src="{{ asset('images/humanresource/login.png') }}" data-caption="Halaman Login"><img src="{{ asset('images/humanresource/login.png') }}" alt="Halaman Login Human Resource"><figcaption class="caption">Halaman Login</figcaption></figure>
        </div>
        <p class="note">Tampilan data pada galeri menggunakan data demonstrasi anonim.</p>
    </section>

    <section class="bottom">
        <div>
            <p class="section-label">FITUR UTAMA</p>
            <div class="feature"><div class="icon">01</div><div><h3>Data Pegawai Terintegrasi</h3><p>Profil, unit kerja, jabatan, riwayat, dokumen, dan informasi penting pegawai dalam satu tempat.</p></div></div>
            <div class="feature"><div class="icon">02</div><div><h3>Kehadiran, Cuti &amp; Izin</h3><p>Rekap presensi serta alur pengajuan dan persetujuan cuti yang transparan sesuai peran pengguna.</p></div></div>
            <div class="feature"><div class="icon">03</div><div><h3>Perjalanan Dinas &amp; Payroll</h3><p>Pengelolaan penugasan, biaya perjalanan, komponen gaji, periode payroll, dan slip gaji.</p></div></div>
        </div>
        <aside class="cta"><h2>HR yang rapi, keputusan yang lebih cepat.</h2><p>Diskusikan alur kerja Human Resource yang sesuai dengan kebutuhan organisasi Anda.</p><a class="button" href="{{ route('contact') }}">KONSULTASI GRATIS</a></aside>
    </section>
</main>
<div id="lightbox" style="display:none;position:fixed;inset:0;z-index:20;background:#020617e8;padding:24px;align-items:center;justify-content:center"><button id="close" style="position:absolute;top:20px;right:24px;border:0;background:none;color:white;font-size:30px;cursor:pointer">×</button><div style="max-width:1100px;width:100%"><img id="lightbox-image" style="display:block;max-width:100%;max-height:78vh;margin:auto;border-radius:8px"><p id="lightbox-caption" style="text-align:center;color:#cbd5e1;font:11px 'JetBrains Mono',monospace"></p></div></div>
<script>
const box=document.getElementById('lightbox'), image=document.getElementById('lightbox-image'), caption=document.getElementById('lightbox-caption');
document.querySelectorAll('.shot').forEach(shot=>shot.onclick=()=>{image.src=shot.dataset.src;caption.textContent=shot.dataset.caption;box.style.display='flex';document.body.style.overflow='hidden'});
function close(){box.style.display='none';document.body.style.overflow=''} document.getElementById('close').onclick=close;box.onclick=e=>{if(e.target===box)close()};document.onkeydown=e=>{if(e.key==='Escape')close()};
</script>
</body>
</html>
