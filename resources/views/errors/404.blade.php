<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Halaman Tidak Ditemukan — Yala Labs</title>
<meta name="robots" content="noindex">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Hanken+Grotesk:wght@600;700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-on-background font-body antialiased selection:bg-primary/20 selection:text-primary">

<!-- Nav -->
<nav class="w-full sticky top-0 z-50 bg-surface/80 glass-nav border-b border-surface-container-highest h-20 flex items-center">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop flex items-center justify-between w-full">
        <a href="{{ url('/') }}" class="font-headline text-xl font-bold text-primary tracking-tight">Yala Labs</a>
        <a href="{{ route('contact') }}"
           class="bg-primary text-on-primary px-5 py-2.5 rounded-lg text-sm font-semibold hover:opacity-90 transition-all duration-200 active:scale-95">
            Konsultasi Gratis
        </a>
    </div>
</nav>

<!-- 404 -->
<header class="relative py-24 md:py-32 overflow-hidden">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10 flex flex-col items-center text-center">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/5 border border-primary/10 text-primary font-label text-[11px] tracking-wider mb-8">
            <span class="material-symbols-outlined text-[14px]">error_outline</span>
            HALAMAN TIDAK DITEMUKAN
        </div>

        <p class="font-headline text-gradient-red font-bold leading-none tracking-tight text-[7rem] md:text-[10rem]">404</p>

        <h1 class="font-headline text-3xl md:text-4xl font-bold mb-6 mt-2 leading-[1.1] tracking-tight max-w-xl">
            Halaman tidak ditemukan..
        </h1>
        <p class="font-body text-lg text-on-surface-variant mb-10 max-w-xl leading-relaxed">
            Alamat yang Anda tuju sudah pindah, berganti nama, atau memang belum pernah ada.
            Coba kembali ke beranda atau lihat produk kami di bawah ini.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 mb-16">
            <a href="{{ url('/') }}"
               class="bg-primary text-on-primary px-8 py-4 rounded-lg font-semibold shadow-lg hover:opacity-90 transition-all active:scale-95 flex items-center justify-center group">
                <span class="material-symbols-outlined mr-2 group-hover:-translate-x-1 transition-transform">arrow_back</span>
                Kembali ke Beranda
            </a>
            <a href="{{ route('contact') }}"
               class="bg-surface-container-lowest border border-surface-container-highest text-on-surface px-8 py-4 rounded-lg font-semibold hover:bg-surface-container-low transition-all active:scale-95 flex items-center justify-center">
                Konsultasi Gratis
            </a>
        </div>

        <div class="w-full max-w-3xl">
            <p class="font-label text-[11px] text-on-surface-variant uppercase tracking-widest mb-6">Atau lihat produk kami</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="{{ route('klinikgigi-system') }}"
                   class="hover-lift soft-bloom rounded-xl border border-surface-container-highest bg-surface-container-lowest px-4 py-5 text-sm font-semibold text-on-surface hover:text-primary transition-colors">
                    Klinik Gigi
                </a>
                <a href="{{ route('klinik-system') }}"
                   class="hover-lift soft-bloom rounded-xl border border-surface-container-highest bg-surface-container-lowest px-4 py-5 text-sm font-semibold text-on-surface hover:text-primary transition-colors">
                    Klinik
                </a>
                <a href="{{ route('ticket-system') }}"
                   class="hover-lift soft-bloom rounded-xl border border-surface-container-highest bg-surface-container-lowest px-4 py-5 text-sm font-semibold text-on-surface hover:text-primary transition-colors">
                    Ticket System
                </a>
                <a href="{{ route('erpsekolah-system') }}"
                   class="hover-lift soft-bloom rounded-xl border border-surface-container-highest bg-surface-container-lowest px-4 py-5 text-sm font-semibold text-on-surface hover:text-primary transition-colors">
                    Sistem Sekolah
                </a>
            </div>
        </div>
    </div>

    <div class="absolute inset-0 -z-10 opacity-[0.03]" style="background-image: radial-gradient(#bc0003 0.5px, transparent 0.5px); background-size: 24px 24px;"></div>
</header>

<!-- Footer -->
<footer class="w-full py-8 bg-surface-container-lowest border-t border-surface-container-highest">
    <br><br><div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-on-surface-variant text-xs">© 2026 Yala Labs. support by CV. Andita Yogyakarta.</p>
        <p class="text-on-surface-variant text-xs">yala.web.id · halloooyala@gmail.com</p>
    </div>
</footer>

</body>
</html>
