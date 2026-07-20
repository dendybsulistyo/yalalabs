<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Yala Labs — Sistem Informasi untuk Sekolah, Klinik & Instansi Anda</title>
<meta name="description" content="Yala Labs membangun aplikasi web siap pakai: Sistem Klinik Gigi (baru!), Sistem Klinik, Knowledge Base &amp; Ticket System, dan Sistem Informasi Sekolah.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Hanken+Grotesk:wght@600;700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-on-background font-body antialiased selection:bg-primary/20 selection:text-primary">

<!-- Nav -->
<nav class="w-full sticky top-0 z-50 bg-surface/80 glass-nav border-b border-surface-container-highest h-20 flex items-center">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop flex items-center justify-between w-full">
        <div class="flex items-center gap-12">
            <a href="{{ url('/') }}" class="font-headline text-xl font-bold text-primary tracking-tight">Yala Labs</a>
            <div class="hidden md:flex items-center gap-8">
                <a href="#produk" class="text-on-surface-variant hover:text-primary transition-colors text-sm">Produk</a>
                <a href="#ekosistem" class="text-on-surface-variant hover:text-primary transition-colors text-sm">Ekosistem</a>
                <a href="{{ route('klinikgigi-system') }}" class="text-primary font-semibold text-sm">Klinik Gigi — Baru</a>
            </div>
        </div>
        <a href="{{ route('contact') }}"
           class="bg-primary text-on-primary px-5 py-2.5 rounded-lg text-sm font-semibold hover:opacity-90 transition-all duration-200 active:scale-95">
            Konsultasi Gratis
        </a>
    </div>
</nav>

<!-- Hero — sorotan produk baru: Klinik Gigi -->
<header class="relative pt-16 pb-24 md:pb-section-gap overflow-hidden">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop grid lg:grid-cols-2 gap-12 lg:gap-16 items-center relative z-10">
        <div class="max-w-2xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/5 border border-primary/10 text-primary font-label text-[11px] tracking-wider mb-8">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                </span>
                BARU DILUNCURKAN...
            </div>
            <h1 class="font-headline text-4xl md:text-6xl font-bold mb-6 leading-[1.1] tracking-tight">
                Manajemen Pasien Gigi & Mulut, <span class="text-gradient-red"><br>Go Digital.</span>
            </h1>
            <p class="font-body text-lg text-on-surface-variant mb-10 max-w-xl leading-relaxed">
    
                Produk terbaru Yala Labs, <strong class="text-on-surface">Manajemen Pasien Gigi & Mulut</strong>, hadir dengan odontogram
                interaktif standar Indonesia, antrian online terverifikasi OTP, hingga manajemen jadwal dokter —
                semua dalam satu platform.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('klinikgigi-system') }}"
                   class="bg-primary text-on-primary px-8 py-4 rounded-lg font-semibold shadow-lg hover:opacity-90 transition-all active:scale-95 flex items-center justify-center group">
                    Lihat Sistem Klinik Gigi
                    <span class="material-symbols-outlined ml-2 group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
                <a href="{{ route('contact') }}"
                   class="bg-surface-container-lowest border border-surface-container-highest text-on-surface px-8 py-4 rounded-lg font-semibold hover:bg-surface-container-low transition-all active:scale-95 flex items-center justify-center">
                    Konsultasi Gratis
                </a>
            </div>
        </div>

        <div class="relative hidden lg:block">
            <div class="absolute -top-20 -right-20 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
            <div class="relative rounded-xl overflow-hidden browser-frame border border-surface-container-highest bg-surface-container-lowest">
                <div class="flex items-center gap-1.5 px-4 py-3 border-b border-surface-container-highest bg-surface-container-low">
                    <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span>
                    <span class="w-2.5 h-2.5 rounded-full bg-yellow-400"></span>
                    <span class="w-2.5 h-2.5 rounded-full bg-green-400"></span>
                </div>
                <img src="{{ asset('images/klinikgigi/login.png') }}" alt="Sistem Klinik Gigi — Halaman Login" class="w-full block">
            </div>
        </div>
    </div>

    <div class="absolute inset-0 -z-10 opacity-[0.03]" style="background-image: radial-gradient(#bc0003 0.5px, transparent 0.5px); background-size: 24px 24px;"></div>
</header>

<!-- Teknologi -->
<section class="py-14 border-y border-surface-container-highest bg-surface-container-lowest">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
        <p class="text-center font-label text-[11px] text-on-surface-variant uppercase tracking-widest mb-8">Dibangun dengan teknologi yang teruji</p>
        <div class="flex flex-wrap justify-center items-center gap-8">
            <span class="px-4 py-2 rounded-lg bg-surface-container-low text-on-surface-variant text-sm font-label">Laravel</span>
            <span class="px-4 py-2 rounded-lg bg-surface-container-low text-on-surface-variant text-sm font-label">Cloudflare</span>
            <span class="px-4 py-2 rounded-lg bg-surface-container-low text-on-surface-variant text-sm font-label">Linux</span>
            <span class="px-4 py-2 rounded-lg bg-surface-container-low text-on-surface-variant text-sm font-label">MySQL</span>
            <span class="px-4 py-2 rounded-lg bg-surface-container-low text-on-surface-variant text-sm font-label">Tailwind CSS</span>
        </div>
    </div>
</section>

<!-- Produk Unggulan -->
<section id="produk" class="py-16 md:py-section-gap">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
        <div class="mb-16">
            <h2 class="font-headline text-3xl md:text-4xl font-bold mb-4">Solusi untuk kebutuhan Anda.</h2>
            <p class="font-body text-lg text-on-surface-variant max-w-2xl">Sistem siap pakai untuk klinik gigi, klinik umum, sekolah, dan instansi/usaha Anda —  web based, bisa digunakan melalui browser mana saja.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-gutter">

            <a href="{{ route('klinikgigi-system') }}" class="relative p-8 rounded-xl bg-surface-container-lowest border-2 border-primary/20 hover-lift group flex flex-col">
                <span class="absolute -top-3 left-8 bg-primary text-on-primary text-[10px] font-label font-bold tracking-widest uppercase px-3 py-1 rounded-full">Baru</span>
                <div class="w-12 h-12 rounded-lg bg-primary/5 text-primary flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-on-primary transition-colors">
                    <span class="material-symbols-outlined">dentistry</span>
                </div>
                <h3 class="font-headline text-xl font-semibold mb-3">Klinik / Rumah Sakit Gigi & Mulut</h3>
                <p class="text-sm text-on-surface-variant mb-6 flex-1">Odontogram interaktif standar Indonesia, antrian online + OTP, jadwal dokter, kasir, dan rekam medis dalam satu sistem.</p>
                <span class="inline-flex items-center text-primary font-semibold text-sm group-hover:gap-2 transition-all">
                    Lihat Detail
                    <span class="material-symbols-outlined ml-1 text-sm">arrow_outward</span>
                </span>
            </a>

            <a href="{{ route('klinik-system') }}" class="p-8 rounded-xl bg-surface-container-lowest border border-surface-container-highest hover-lift group flex flex-col">
                <div class="w-12 h-12 rounded-lg bg-primary/5 text-primary flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-on-primary transition-colors">
                    <span class="material-symbols-outlined">local_hospital</span>
                </div>
                <h3 class="font-headline text-xl font-semibold mb-3">Sistem Klinik / Rekam Medis</h3>
                <p class="text-sm text-on-surface-variant mb-6 flex-1">Pendaftaran pasien, rekam medis, farmasi, laboratorium, hingga kasir — standar ICD-10, LOINC &amp; HL7 FHIR.</p>
                <span class="inline-flex items-center text-primary font-semibold text-sm group-hover:gap-2 transition-all">
                    Lihat Detail
                    <span class="material-symbols-outlined ml-1 text-sm">arrow_outward</span>
                </span>
            </a>

            <a href="{{ route('ticket-system') }}" class="p-8 rounded-xl bg-surface-container-lowest border border-surface-container-highest hover-lift group flex flex-col">
                <div class="w-12 h-12 rounded-lg bg-primary/5 text-primary flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-on-primary transition-colors">
                    <span class="material-symbols-outlined">confirmation_number</span>
                </div>
                <h3 class="font-headline text-xl font-semibold mb-3">Knowledge Base &amp; Ticket System</h3>
                <p class="text-sm text-on-surface-variant mb-6 flex-1">Kelola keluhan dan permasalahan layanan di instansi/unit kerja Anda secara terpusat dan efisien.</p>
                <span class="inline-flex items-center text-primary font-semibold text-sm group-hover:gap-2 transition-all">
                    Lihat Detail
                    <span class="material-symbols-outlined ml-1 text-sm">arrow_outward</span>
                </span>
            </a>

            <a href="{{ route('erpsekolah-system') }}" class="p-8 rounded-xl bg-surface-container-lowest border border-surface-container-highest hover-lift group flex flex-col">
                <div class="w-12 h-12 rounded-lg bg-primary/5 text-primary flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-on-primary transition-colors">
                    <span class="material-symbols-outlined">school</span>
                </div>
                <h3 class="font-headline text-xl font-semibold mb-3">Sistem Informasi Sekolah</h3>
                <p class="text-sm text-on-surface-variant mb-6 flex-1">PPDB online, data siswa &amp; guru, penjadwalan, presensi, hingga nilai dan rapor digital.</p>
                <span class="inline-flex items-center text-primary font-semibold text-sm group-hover:gap-2 transition-all">
                    Lihat Detail
                    <span class="material-symbols-outlined ml-1 text-sm">arrow_outward</span>
                </span>
            </a>

        </div>
    </div>
</section>

<!-- Ekosistem -->
<section id="ekosistem" class="py-16 md:py-section-gap bg-surface-container-low border-y border-surface-container-highest">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
        <div class="text-center mb-16">
            <h2 class="font-headline text-3xl md:text-4xl font-bold mb-4">Diagram Standart Odontogram </h2>
            <p class="font-body text-lg text-on-surface-variant max-w-2xl mx-auto">Salah satu fitur untuk mengelola Pasien Gigi & Mulut yaitu chart odontogram interaktif yang mengikuti simbol Standar Kedokteran Gigi Indonesia</p>
        </div>
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <div class="flex gap-6 p-6 rounded-xl bg-surface-container-lowest border border-surface-container-highest hover:border-primary/30 transition-all">
                    <div class="shrink-0 w-14 h-14 rounded-full bg-primary/5 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary">grid_view</span>
                    </div>
                    <div>
                        <h4 class="font-headline text-lg font-semibold mb-2">Gigi Permanen &amp; Sulung Digabung</h4>
                        <p class="text-on-surface-variant text-sm">Chart selalu menampilkan gigi permanen dan sulung sekaligus, supaya kasus gigi sulung persisten pada pasien dewasa tidak terlewat.</p>
                    </div>
                </div>
                <div class="flex gap-6 p-6 rounded-xl bg-surface-container-lowest border border-surface-container-highest hover:border-primary/30 transition-all">
                    <div class="shrink-0 w-14 h-14 rounded-full bg-primary/5 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary">verified</span>
                    </div>
                    <div>
                        <h4 class="font-headline text-lg font-semibold mb-2">±26 Simbol Kondisi Standar</h4>
                        <p class="text-on-surface-variant text-sm">Dari tambalan, karies, RCT, mahkota, implant, jembatan, hingga migrasi/rotasi gigi — semua mengikuti konvensi odontogram kedokteran gigi Indonesia.</p>
                    </div>
                </div>
                <div class="flex gap-6 p-6 rounded-xl bg-surface-container-lowest border border-surface-container-highest hover:border-primary/30 transition-all">
                    <div class="shrink-0 w-14 h-14 rounded-full bg-primary/5 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary">lock</span>
                    </div>
                    <div>
                        <h4 class="font-headline text-lg font-semibold mb-2">Data Medis Terlindungi</h4>
                        <p class="text-on-surface-variant text-sm">Diagnosis, odontogram, dan hasil rontgen hanya bisa diakses admin &amp; dokter — staf front office cuma bisa lihat jadwal &amp; data dasar pasien.</p>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="absolute inset-0 bg-primary/5 blur-3xl rounded-full"></div>
                <div class="relative rounded-xl overflow-hidden browser-frame border border-surface-container-highest bg-surface-container-lowest">
                    <img src="{{ asset('images/klinikgigi/odontogram-chart.png') }}" alt="Odontogram Interaktif — Klinik Gigi" class="w-full block">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-16 md:py-section-gap relative overflow-hidden">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop text-center relative z-10">
        <h2 class="font-headline text-3xl md:text-5xl font-bold mb-8 leading-[1.1]">sistem untuk usaha Anda?<br>kami wujudkan dalam 14 hari</h2>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('contact') }}"
               class="bg-primary text-on-primary px-10 py-5 rounded-lg font-semibold shadow-lg hover:opacity-90 transition-all active:scale-95 flex items-center group">
                Konsultasi Gratis
                <span class="material-symbols-outlined ml-2 group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
            <a href="{{ route('klinikgigi-system') }}"
               class="bg-surface-container-lowest border border-surface-container-highest text-on-surface px-10 py-5 rounded-lg font-semibold hover:bg-surface-container-low transition-all active:scale-95 flex items-center">
                Lihat Sistem Klinik Gigi
            </a>
        </div>
    </div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-4xl h-full opacity-5 pointer-events-none">
        <svg viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 40 0 L 0 0 0 40" fill="none" stroke="#bc0003" stroke-width="0.5"></path>
                </pattern>
            </defs>
            <rect fill="url(#grid)" width="1000" height="1000"></rect>
        </svg>
    </div>
</section>

<!-- Footer -->
<footer class="w-full pt-16 md:pt-section-gap pb-16 bg-surface-container-lowest border-t border-surface-container-highest">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop grid grid-cols-2 md:grid-cols-4 gap-gutter">
        <div class="col-span-2 mb-10 md:mb-0">
            <a href="{{ url('/') }}" class="font-headline text-xl font-bold text-primary mb-6 block">Yala Labs</a>
            <p class="text-on-surface-variant mb-6 pr-12 text-sm leading-relaxed">
                Kami membangun sistem informasi berbasis web siap pakai untuk sekolah, klinik, dan instansi/usaha Anda.
            </p>
            <ul class="space-y-2 text-sm text-on-surface-variant">
                <li>yala.web.id</li>
                <li>halloooyala@gmail.com</li>
                <li>Yogyakarta, Indonesia</li>
            </ul>
            <a href="https://wa.me/6283896247627" target="_blank"
               class="inline-flex items-center gap-2 mt-6 px-5 py-2.5 rounded-lg bg-[#25D366] text-white text-sm font-semibold hover:opacity-90 transition-all">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2.05 22l5.25-1.38a9.9 9.9 0 0 0 4.74 1.21h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.87 9.87 0 0 0 12.04 2zm5.8 14.09c-.24.68-1.4 1.32-1.94 1.4-.5.08-1.11.11-1.79-.11-.41-.13-.94-.3-1.62-.6-2.85-1.23-4.71-4.1-4.85-4.29-.14-.19-1.16-1.54-1.16-2.94s.73-2.09 1-2.37c.24-.27.53-.34.71-.34.18 0 .36 0 .51.01.17.01.38-.06.6.45.24.56.8 1.96.87 2.1.07.14.11.31.02.5-.09.19-.14.31-.27.47-.14.16-.29.36-.41.48-.14.14-.28.29-.12.57.16.28.71 1.17 1.53 1.9 1.05.94 1.94 1.23 2.22 1.37.28.14.44.12.61-.07.16-.19.68-.79.87-1.06.18-.27.37-.22.62-.13.25.09 1.6.75 1.87.89.27.14.46.2.52.32.07.12.07.68-.17 1.36z"/></svg>
                WhatsApp
            </a>
        </div>
        <div>
            <h5 class="font-semibold text-primary mb-6 text-sm">Produk</h5>
            <ul class="space-y-3 text-sm">
                <li><a href="{{ route('klinikgigi-system') }}" class="text-on-surface-variant hover:text-primary transition-all">Sistem Klinik Gigi</a></li>
                <li><a href="{{ route('klinik-system') }}" class="text-on-surface-variant hover:text-primary transition-all">Sistem Klinik</a></li>
                <li><a href="{{ route('ticket-system') }}" class="text-on-surface-variant hover:text-primary transition-all">Ticket System</a></li>
                <li><a href="{{ route('erpsekolah-system') }}" class="text-on-surface-variant hover:text-primary transition-all">Sistem Sekolah</a></li>
            </ul>
        </div>
        <div>
            <h5 class="font-semibold text-primary mb-6 text-sm">Perusahaan</h5>
            <ul class="space-y-3 text-sm">
                <li><a href="{{ route('contact') }}" class="text-on-surface-variant hover:text-primary transition-all">Konsultasi Gratis</a></li>
                <li><a href="mailto:halloooyala@gmail.com" class="text-on-surface-variant hover:text-primary transition-all">Kontak Email</a></li>
            </ul>
        </div>
    </div>
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop mt-12 pt-8 border-t border-surface-container-highest flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-on-surface-variant text-xs">© 2026 Yala Labs. support by CV. Andita Yogyakarta.</p>
    </div>
</footer>

<script>
    window.addEventListener('scroll', () => {
        const nav = document.querySelector('nav');
        if (window.scrollY > 20) {
            nav.classList.add('shadow-md');
        } else {
            nav.classList.remove('shadow-md');
        }
    });
</script>
</body>
</html>
