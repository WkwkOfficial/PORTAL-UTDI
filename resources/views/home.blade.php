<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal Mahasiswa UTDI</title>
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Crect width='32' height='32' rx='8' fill='%232563EB'/%3E%3Cg fill='none' stroke='%23ffffff' stroke-width='2.2' stroke-linecap='round' stroke-linejoin='round' transform='translate(4,4)'%3E%3Cpath d='M22 10v6M2 10l10-5 10 5-10 5z'/%3E%3Cpath d='M6 12v5c0 1.66 2.69 3 6 3s6-1.34 6-3v-5'/%3E%3C/g%3E%3C/svg%3E" />
  <meta name="description" content="Portal terpadu layanan mahasiswa Universitas Teknologi Digital Indonesia (UTDI): Akademik, Perpustakaan, dan UPT Lab & Sertifikasi." />

  <!-- Google Fonts: Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

  <!-- Tailwind CSS via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'Inter', 'system-ui', '-apple-system', 'sans-serif'],
          },
          colors: {
            academic: {
              50: '#EFF6FF',
              100: '#DBEAFE',
              200: '#BFDBFE',
              300: '#93C5FD',
              400: '#60A5FA',
              500: '#3B82F6',
              600: '#2563EB',
              700: '#1D4ED8',
              800: '#1E3A8A',
              900: '#0F294A',
              950: '#091A32',
            },
          },
          boxShadow: {
            card: '0 1px 3px 0 rgba(15, 41, 74, 0.06), 0 1px 2px -1px rgba(15, 41, 74, 0.04)',
            'card-hover': '0 12px 28px -8px rgba(29, 78, 216, 0.14), 0 4px 10px -4px rgba(15, 41, 74, 0.06)',
            floating: '0 20px 40px -15px rgba(15, 41, 74, 0.16)',
          },
        },
      },
    };
  </script>

  <style>
    .hero-grid-pattern {
      background-image:
        linear-gradient(to right, rgba(255, 255, 255, 0.06) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255, 255, 255, 0.06) 1px, transparent 1px);
      background-size: 36px 36px;
    }

    .no-scrollbar::-webkit-scrollbar {
      display: none;
    }
    .no-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    mark.search-highlight {
      background-color: #FEF08A;
      color: #0F294A;
      padding: 0 2px;
      border-radius: 3px;
      font-weight: 600;
    }

    @keyframes fadeSlideUp {
      from {
        opacity: 0;
        transform: translateY(8px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-card-in {
      animation: fadeSlideUp 0.22s ease-out both;
    }
  </style>
</head>
<body class="min-h-screen bg-slate-50 font-sans text-slate-800 antialiased selection:bg-academic-200 selection:text-academic-900 flex flex-col">

  <!-- Top Navigation Bar -->
  <header class=" border-b border-academic-800/30 bg-academic-950/95 text-white backdrop-blur-md">
    <div class="flex w-full items-center justify-between gap-4 px-4 py-3 sm:px-6 lg:px-8">
      <a href="#top" class="flex items-center gap-3 group focus:outline-none">
        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-academic-500 to-academic-700 shadow-md ring-1 ring-white/20 transition-transform group-hover:scale-105">
          <!-- Academic Crest / Digital Campus SVG -->
          <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
            <path d="M6 12v5c0 1.66 2.69 3 6 3s6-1.34 6-3v-5" />
          </svg>
        </div>
        <div class="leading-tight">
          <div class="flex items-center gap-2">
            <span class="text-sm font-extrabold tracking-wide text-white sm:text-base">PORTAL UTDI</span>
            <span class="hidden rounded-full bg-academic-500/25 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-wider text-academic-200 ring-1 ring-academic-400/30 sm:inline-block">Mahasiswa</span>
          </div>
          <p class="text-[11px] text-academic-200/80 sm:text-xs">Universitas Teknologi Digital Indonesia</p>
        </div>
      </a>

      <nav class="ml-auto hidden items-center gap-1 md:flex" aria-label="Navigasi Utama">
        <a href="#layanan" class="rounded-lg px-3 py-1.5 text-sm font-medium text-academic-100 transition hover:bg-white/10 hover:text-white">Daftar Layanan</a>
        <button type="button" id="navToeflShortcut" class="flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-sm font-medium text-amber-200 transition hover:bg-amber-400/15 hover:text-amber-100">
          <span class="h-2 w-2 rounded-full bg-amber-400"></span>
          TOEFL &amp; Sertifikasi
        </button>
        <a href="#kontak-resmi" class="rounded-lg px-3 py-1.5 text-sm font-medium text-academic-100 transition hover:bg-white/10 hover:text-white">Kontak Resmi</a>
      </nav>

      <div class="flex items-center gap-2">
        <button
          type="button"
          id="focusSearchBtn"
          class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-3 py-1.5 text-xs font-medium text-academic-100 ring-1 ring-white/15 transition hover:bg-white/20 hover:text-white"
          title="Cari layanan (tekan /)"
        >
          <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="11" cy="11" r="8" />
            <path d="m21 21-4.3-4.3" />
          </svg>
          <span class="hidden sm:inline">Cari</span>
          <kbd class="hidden rounded bg-white/15 px-1.5 py-0.5 font-mono text-[10px] text-white/90 sm:inline">/</kbd>
        </button>
        <a href="#kontak-resmi" class="inline-flex items-center gap-1.5 rounded-xl bg-academic-600 px-3 py-1.5 text-xs font-semibold text-white shadow-sm transition hover:bg-academic-500 sm:text-sm">
          <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
          </svg>
          <span class="hidden sm:inline">Bantuan</span>
        </a>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section id="top" class="relative overflow-hidden bg-gradient-to-br from-academic-950 via-academic-900 to-academic-700 pb-24 pt-10 text-white sm:pb-28 sm:pt-14">
    <div class="hero-grid-pattern pointer-events-none absolute inset-0"></div>
    <div class="pointer-events-none absolute -right-24 -top-24 h-80 w-80 rounded-full bg-academic-500/20 blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-sky-400/15 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="mx-auto max-w-3xl text-center">
        <div class="mb-4 inline-flex items-center gap-2 rounded-full bg-white/10 px-3.5 py-1.5 text-xs font-semibold text-academic-100 ring-1 ring-white/20 backdrop-blur-sm">
          <span class="inline-block h-2 w-2 rounded-full bg-sky-400"></span>
          Portal Layanan Terpadu Mahasiswa Kampus UTDI
        </div>

        <h1 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl lg:text-5xl">
          Pusat Tautan &amp; Layanan
          <span class="bg-gradient-to-r from-sky-300 to-academic-200 bg-clip-text text-transparent">Mahasiswa UTDI</span>
        </h1>

        <p class="mx-auto mt-4 max-w-2xl text-sm leading-relaxed text-academic-100/90 sm:text-base">
          Akses cepat seluruh tautan resmi akademik, jadwal kuliah &amp; praktikum, perpustakaan &amp; unggah laporan, hingga layanan UPT Lab &amp; sertifikasi dalam satu halaman.
        </p>
      </div>
    </div>
  </section>

  <!-- Floating Search & Category Filter Bar -->
  <section id="layanan" class="relative z-20 -mt-16 mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="rounded-2xl border border-slate-200/90 bg-white p-4 shadow-floating sm:p-6">
      <div class="flex flex-col gap-4">
        <!-- Search Input Row -->
        <div class="relative">
          <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-academic-600">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <circle cx="11" cy="11" r="8" />
              <path d="m21 21-4.3-4.3" />
            </svg>
          </div>
          <input
            type="search"
            id="searchInput"
            autocomplete="off"
            placeholder="Cari layanan instan...   misal: Jadwal, TOEFL, PKL, Yudisium, PDDikti, Eprints, Cuti"
            aria-label="Cari layanan mahasiswa UTDI"
            class="w-full rounded-xl border border-slate-200 bg-slate-50/80 py-3.5 pl-12 pr-24 text-sm text-slate-800 placeholder-slate-400 transition focus:border-academic-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-academic-500/15 sm:text-base"
          />
          <div class="absolute inset-y-0 right-0 flex items-center gap-1.5 pr-3">
            <button
              type="button"
              id="clearSearchBtn"
              class="hidden items-center gap-1 rounded-lg bg-slate-200/80 px-2.5 py-1 text-xs font-semibold text-slate-600 transition hover:bg-slate-300 hover:text-slate-900"
              aria-label="Hapus pencarian"
            >
              <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M18 6 6 18" />
                <path d="m6 6 12 12" />
              </svg>
              Hapus
            </button>
            <kbd class="hidden rounded-lg border border-slate-200 bg-white px-2 py-1 font-mono text-[11px] font-medium text-slate-400 sm:inline-block">/</kbd>
          </div>
        </div>

        <!-- Category Filter Tabs + Quick Tags -->
        <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
          <!-- Category Filter Buttons -->
          <div id="categoryFilters" class="flex items-center gap-2 overflow-x-auto pb-1 no-scrollbar lg:pb-0" role="tablist" aria-label="Filter kategori layanan">
            <!-- Rendered by JS -->
          </div>

          <!-- Live Result Counter -->
          <div class="flex items-center justify-between gap-3 text-xs text-slate-500 sm:text-sm">
            {{-- <p id="resultSummary" aria-live="polite" class="font-medium text-slate-600">
              Menampilkan seluruh layanan
            </p> --}}
            <button
              type="button"
              id="resetAllBtn"
              class="hidden shrink-0 items-center gap-1 rounded-lg bg-academic-50 px-2.5 py-1 text-xs font-semibold text-academic-700 ring-1 ring-academic-200 transition hover:bg-academic-100"
            >
              Reset Filter
            </button>
          </div>
        </div>

        <!-- Quick Search Chips -->
        <div class="flex flex-wrap items-center gap-1.5 border-t border-slate-100 pt-3">
          <span class="mr-1 text-xs font-medium text-slate-400">Populer:</span>
          <button type="button" data-quick-search="Jadwal" class="quick-chip rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-600 transition hover:bg-academic-100 hover:text-academic-800">Jadwal</button>
          <button type="button" data-quick-search="TOEFL" class="quick-chip rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-600 transition hover:bg-academic-100 hover:text-academic-800">TOEFL &amp; Sertifikasi</button>
          <button type="button" data-quick-search="Laporan" class="quick-chip rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-600 transition hover:bg-academic-100 hover:text-academic-800">Laporan PKL/PBL/PjBL</button>
          <button type="button" data-quick-search="Yudisium" class="quick-chip rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-600 transition hover:bg-academic-100 hover:text-academic-800">Yudisium</button>
          <button type="button" data-quick-search="PDDikti" class="quick-chip rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-600 transition hover:bg-academic-100 hover:text-academic-800">PDDikti</button>
          <button type="button" data-quick-search="Perpus" class="quick-chip rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-600 transition hover:bg-academic-100 hover:text-academic-800">Perpustakaan</button>
          <button type="button" data-quick-search="Cuti" class="quick-chip rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-600 transition hover:bg-academic-100 hover:text-academic-800">Cuti / Undur Diri</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Main Services Container -->
  <main class="mx-auto w-full max-w-7xl flex-1 px-4 py-8 sm:px-6 sm:py-10 lg:px-8">
    <!-- Dynamic Sections & Service Cards Rendered Here -->
    <div id="servicesContainer" class="space-y-10"></div>

    <!-- Empty Search State -->
    <div id="emptyState" class="hidden rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-14 text-center shadow-card">
      <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-academic-50 text-academic-600">
        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <circle cx="11" cy="11" r="8" />
          <path d="m21 21-4.3-4.3" />
          <path d="M8 11h6" />
        </svg>
      </div>
      <h2 class="mt-4 text-lg font-bold text-slate-900">Layanan tidak ditemukan</h2>
      <p class="mx-auto mt-1.5 max-w-md text-sm text-slate-500">
        Tidak ada tautan yang cocok dengan kata kunci <span id="emptyQueryText" class="font-semibold text-slate-700"></span> pada kategori terpilih.
      </p>
      <button
        type="button"
        id="emptyResetBtn"
        class="mt-5 inline-flex items-center gap-2 rounded-xl bg-academic-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-academic-700"
      >
        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
          <path d="M3 3v5h5" />
        </svg>
        Tampilkan Semua Layanan
      </button>
    </div>

    <!-- Official Help & Contact Cards Section -->
    <section id="kontak-resmi" class="mt-14 scroll-mt-24">
      <div class="overflow-hidden rounded-3xl border border-academic-200/80 bg-gradient-to-br from-academic-900 via-academic-800 to-academic-950 p-6 text-white shadow-floating sm:p-8 lg:p-10">
        <div class="flex flex-col gap-4 border-b border-white/15 pb-6 ">
          <div>
            <span class="inline-flex items-center gap-1.5 rounded-full bg-academic-500/25 px-3 py-1 text-xs font-semibold text-academic-100 ring-1 ring-white/20">
              <svg class="h-3.5 w-3.5 text-sky-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
              </svg>
              Pusat Bantuan &amp; Layanan Resmi
            </span>
            <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-white sm:text-3xl">
              Kontak WhatsApp &amp; Email Resmi UTDI
            </h2>
            <p class="mt-1.5 max-w-2xl text-sm text-academic-100/85">
              Mengalami kendala akses formulir, jadwal kuliah/praktikum, atau administrasi? Hubungi unit layanan resmi kampus berikut.
            </p>
          </div>
          <div class="rounded-xl bg-amber-400/15 px-4 py-2.5 text-xs text-amber-100 ring-1 ring-amber-300/30">
            <strong class="block text-amber-200">Catatan Penting !!!</strong>
            Demi keamanan akun Anda, seluruh kontak layanan resmi UTDI tidak pernah meminta kata sandi (password), kode OTP, maupun kredensial akun Student Anda dengan alasan apa pun. Waspadai segala bentuk penipuan yang mengatasnamakan pihak kampus.
          </div>
        </div>

        <div id="officialContactsGrid" class="mt-6 grid grid-cols-1 gap-5 md:grid-cols-3">
          <!-- Rendered by JS from OFFICIAL_CONTACTS -->
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="mt-auto border-t border-slate-200 bg-white">
    <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-4 px-4 py-6 text-center text-xs text-slate-500 sm:flex-row sm:px-6 sm:text-left lg:px-8">
      <div>
        <p class="font-semibold text-slate-700">Portal Layanan Mahasiswa — Universitas Teknologi Digital Indonesia (UTDI)</p>
        <p class="mt-0.5">Seluruh tautan mengarah ke portal, dokumen, dan formulir resmi unit terkait di lingkungan kampus UTDI.</p>
        <p class="text-slate-700">© 2026 Student Staff. All Right Reserved. Design by <a href="https://www.instagram.com/wikawkwk?gwpx=NDI2ZXphNXNpZGVz" target="_blank" rel="noopener noreferrer" class="font-semibold text-academic-700 hover:underline">@wikawkwk</a></p> 
      </div>
      <div class="flex items-center gap-3">
        <a href="#top" class="inline-flex items-center gap-1.5 rounded-lg border border-slate-200 bg-slate-50 px-3 py-1.5 font-semibold text-slate-700 transition hover:border-academic-300 hover:bg-academic-50 hover:text-academic-700">
          <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="m18 15-6-6-6 6" />
          </svg>
          Kembali ke Atas
        </a>

        @auth
          <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-1.5 rounded-lg bg-academic-700 px-3 py-1.5 font-semibold text-white transition hover:bg-academic-600">
            Dashboard Admin
          </a>
        @else
          <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 rounded-lg border border-slate-200 bg-slate-50 px-3 py-1.5 font-semibold text-slate-700 transition hover:border-academic-300 hover:bg-academic-50 hover:text-academic-700">
            Admin
          </a>
        @endauth
      </div>
    </div>
  </footer>

  <!-- Toast Notification -->
  <div
    id="toast"
    role="status"
    aria-live="polite"
    class="pointer-events-none fixed bottom-5 right-5 z-50 flex translate-y-4 items-center gap-2.5 rounded-xl bg-academic-950 px-4 py-3 text-sm font-medium text-white opacity-0 shadow-xl ring-1 ring-white/15 transition-all duration-200"
  >
    <svg class="h-4 w-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
      <path d="M20 6 9 17l-5-5" />
    </svg>
    <span id="toastMessage">Disalin ke papan klip</span>
  </div>

  <script>
    // =========================================================================
    // DATA SOURCE: Seluruh daftar tautan & kontak resmi dari "Link web kampus.txt"
    // =========================================================================

    const CATEGORIES = @json($categoriesPayload);

    const SERVICE_CARDS = @json($serviceCardsPayload);

    const OFFICIAL_CONTACTS = [
      {
        unit: 'Akademik UTDI',
        badge: 'Layanan Akademik',
        description: 'Konsultasi jadwal kuliah, cuti, undur diri, perubahan data PDDikti, dan administrasi yudisium.',
        items: [
          {
            label: 'WhatsApp Akademik UTDI',
            display: '+62 895-0400-0232',
            copyValue: '089504000232',
            href: 'https://api.whatsapp.com/send?phone=6289504000232',
            type: 'whatsapp',
            cta: 'Chat WhatsApp',
          },
          {
            label: 'Instagram UTDI',
            display: '@utdi_official',
            copyValue: 'https://www.instagram.com/utdi_official/',
            href: 'https://www.instagram.com/utdi_official/',
            type: 'instagram',
            cta: 'Buka IG',
          },
        ],
      },
      {
        unit: 'UPT Lab & Sertifikasi',
        badge: 'Lab, TOEFL & Sertifikasi',
        description: 'Informasi jadwal praktikum, peraturan lab, sertifikasi kompetensi, serta pendaftaran Tes TOEFL.',
        items: [
          {
            label: 'WhatsApp UPT Lab & Sertifikasi',
            display: '+62 815-9777-143',
            copyValue: '08159777143',
            href: 'https://api.whatsapp.com/send?phone=628159777143',
            type: 'whatsapp',
            cta: 'Chat WhatsApp',
          },
          {
            label: 'Email Resmi UPT Lab',
            display: 'upt.lab@utdi.ac.id',
            copyValue: 'upt.lab@utdi.ac.id',
            href: 'mailto:upt.lab@utdi.ac.id',
            type: 'email',
            cta: 'Kirim Email',
          },
        ],
      },
      {
        unit: 'Perpustakaan UTDI',
        badge: 'Pustaka & Karya Ilmiah',
        description: 'Bantuan akses katalog buku, repositori Eprints, serta verifikasi unggah TA, PKL, PBL, dan PjBL.',
        items: [
          {
            label: 'Email Resmi Perpustakaan',
            display: 'perpus@utdi.ac.id',
            copyValue: 'perpus@utdi.ac.id',
            href: 'mailto:perpus@utdi.ac.id',
            type: 'email',
            cta: 'Kirim Email',
          },
          {
            label: 'Instagram Perpustakaan',
            display: '@perpustakaan_utdi',
            copyValue: 'https://www.instagram.com/perpustakaan_utdi/',
            href: 'https://www.instagram.com/perpustakaan_utdi/',
            type: 'instagram',
            cta: 'Buka IG',
          },
        ],
      },
    ];

    // =========================================================================
    // ICON & UTILITY HELPERS
    // =========================================================================

    function escapeHtml(str) {
      return String(str)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
    }

    function escapeRegex(str) {
      return str.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }

    function highlightText(text, query) {
      if (!query) return escapeHtml(text);
      const tokens = query
        .trim()
        .split(/\s+/)
        .filter((t) => t.length > 0);
      if (tokens.length === 0) return escapeHtml(text);

      const sortedTokens = [...new Set(tokens)].sort((a, b) => b.length - a.length);
      const pattern = new RegExp(`(${sortedTokens.map(escapeRegex).join('|')})`, 'gi');
      const parts = String(text).split(pattern);

      return parts
        .map((part, idx) => {
          if (idx % 2 === 1) {
            return `<mark class="search-highlight">${escapeHtml(part)}</mark>`;
          }
          return escapeHtml(part);
        })
        .join('');
    }

    function getCardIconSvg(iconName, className = 'h-5 w-5') {
      const icons = {
        'book-open': `<svg class="${className}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>`,
        calendar: `<svg class="${className}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg>`,
        'clipboard-check': `<svg class="${className}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="8" height="4" x="8" y="2" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/></svg>`,
        library: `<svg class="${className}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m16 6 4 14"/><path d="M12 6v14"/><path d="M8 8v12"/><path d="M4 4v16"/></svg>`,
        upload: `<svg class="${className}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>`,
        cpu: `<svg class="${className}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="16" height="16" x="4" y="4" rx="2"/><rect width="6" height="6" x="9" y="9" rx="1"/><path d="M15 2v2"/><path d="M15 20v2"/><path d="M2 15h2"/><path d="M2 9h2"/><path d="M20 15h2"/><path d="M20 9h2"/><path d="M9 2v2"/><path d="M9 20v2"/></svg>`,
        'shield-check': `<svg class="${className}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>`,
        award: `<svg class="${className}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>`,
      };
      return icons[iconName] || icons['book-open'];
    }

    function getLinkTypeMeta(type) {
      const map = {
        form: {
          bg: 'bg-violet-50 text-violet-700 ring-violet-200/80',
          iconBg: 'bg-violet-100 text-violet-700',
          icon: `<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M9 15h6"/><path d="M9 11h6"/></svg>`,
        },
        sheet: {
          bg: 'bg-emerald-50 text-emerald-700 ring-emerald-200/80',
          iconBg: 'bg-emerald-100 text-emerald-700',
          icon: `<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M3 9h18"/><path d="M3 15h18"/><path d="M9 3v18"/></svg>`,
        },
        'drive-folder': {
          bg: 'bg-sky-50 text-sky-700 ring-sky-200/80',
          iconBg: 'bg-sky-100 text-sky-700',
          icon: `<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"/></svg>`,
        },
        'drive-file': {
          bg: 'bg-blue-50 text-blue-700 ring-blue-200/80',
          iconBg: 'bg-blue-100 text-blue-700',
          icon: `<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>`,
        },
        web: {
          bg: 'bg-academic-50 text-academic-700 ring-academic-200/80',
          iconBg: 'bg-academic-100 text-academic-700',
          icon: `<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>`,
        },
        whatsapp: {
          bg: 'bg-teal-50 text-teal-700 ring-teal-200/80',
          iconBg: 'bg-teal-100 text-teal-700',
          icon: `<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>`,
        },
        email: {
          bg: 'bg-indigo-50 text-indigo-700 ring-indigo-200/80',
          iconBg: 'bg-indigo-100 text-indigo-700',
          icon: `<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>`,
        },
        instagram: {
          bg: 'bg-pink-50 text-pink-700 ring-pink-200/80',
          iconBg: 'bg-pink-100 text-pink-700',
          icon: `<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>`,
        },
      };
      return map[type] || map.web;
    }

    function getCategoryTheme(category) {
      const themes = {
        Akademik: {
          badge: 'bg-academic-50 text-academic-700 ring-academic-200',
          iconBox: 'bg-academic-600 text-white',
          sectionAccent: 'border-academic-600',
          sectionPill: 'bg-academic-100 text-academic-800',
        },
        Perpustakaan: {
          badge: 'bg-sky-50 text-sky-700 ring-sky-200',
          iconBox: 'bg-sky-600 text-white',
          sectionAccent: 'border-sky-600',
          sectionPill: 'bg-sky-100 text-sky-800',
        },
        'UPT Lab & Sertifikasi': {
          badge: 'bg-indigo-50 text-indigo-700 ring-indigo-200',
          iconBox: 'bg-indigo-600 text-white',
          sectionAccent: 'border-indigo-600',
          sectionPill: 'bg-indigo-100 text-indigo-800',
        },
      };
      return themes[category] || themes.Akademik;
    }

    // =========================================================================
    // STATE MANAGEMENT
    // =========================================================================

    const state = {
      activeCategory: 'Semua',
      searchQuery: '',
    };

    const searchInput = document.getElementById('searchInput');
    const clearSearchBtn = document.getElementById('clearSearchBtn');
    const resetAllBtn = document.getElementById('resetAllBtn');
    const emptyResetBtn = document.getElementById('emptyResetBtn');
    const categoryFiltersEl = document.getElementById('categoryFilters');
    const servicesContainerEl = document.getElementById('servicesContainer');
    const emptyStateEl = document.getElementById('emptyState');
    const emptyQueryTextEl = document.getElementById('emptyQueryText');
    const resultSummaryEl = document.getElementById('resultSummary');
    const officialContactsGridEl = document.getElementById('officialContactsGrid');
    const focusSearchBtn = document.getElementById('focusSearchBtn');
    const navToeflShortcut = document.getElementById('navToeflShortcut');
    const heroTotalLinks = document.getElementById('heroTotalLinks');

    // Compute total links on load
    const totalLinksAll = SERVICE_CARDS.reduce((sum, card) => sum + card.links.length, 0);
    if (heroTotalLinks) heroTotalLinks.textContent = String(totalLinksAll);

    // =========================================================================
    // FILTERING LOGIC
    // =========================================================================

    function matchesTokens(haystack, tokens) {
      const normalized = haystack.toLowerCase();
      return tokens.every((token) => normalized.includes(token));
    }

    function getFilteredCards() {
      const query = state.searchQuery.trim().toLowerCase();
      const tokens = query.split(/\s+/).filter(Boolean);

      return SERVICE_CARDS.filter((card) => {
        if (state.activeCategory !== 'Semua' && card.category !== state.activeCategory) {
          return false;
        }
        return true;
      })
        .map((card) => {
          if (tokens.length === 0) {
            return { ...card, matchedLinks: card.links };
          }

          const cardMeta = `${card.title} ${card.subtitle} ${card.category} ${card.warningBadge || ''} ${card.warningDetail || ''}`;

          const matchedLinks = card.links.filter((link) => {
            const combined = `${card.category} ${link.title} ${link.note || ''} ${link.typeLabel} ${link.keywords || ''} ${link.url}`;
            return matchesTokens(combined, tokens);
          });

          if (matchedLinks.length > 0) {
            return { ...card, matchedLinks };
          }

          // Fallback: if the card header/subtitle itself matched all tokens, show all its links
          if (matchesTokens(cardMeta, tokens)) {
            return { ...card, matchedLinks: card.links };
          }

          return null;
        })
        .filter(Boolean);
    }

    function countLinksByCategory(categoryId) {
      return SERVICE_CARDS.filter((c) => categoryId === 'Semua' || c.category === categoryId)
        .reduce((acc, c) => acc + c.links.length, 0);
    }

    // =========================================================================
    // RENDER FUNCTIONS
    // =========================================================================

    function renderCategoryFilters() {
      categoryFiltersEl.innerHTML = CATEGORIES.map((cat) => {
        const isActive = state.activeCategory === cat.id;
        const count = countLinksByCategory(cat.id);

        return `
          <button
            type="button"
            role="tab"
            aria-selected="${isActive}"
            data-category="${escapeHtml(cat.id)}"
            class="inline-flex shrink-0 items-center gap-2 rounded-xl px-3.5 py-2 text-xs font-semibold transition-all sm:text-sm ${
              isActive
                ? 'bg-academic-700 text-white shadow-sm ring-1 ring-academic-700'
                : 'bg-slate-100 text-slate-700 hover:bg-academic-50 hover:text-academic-700'
            }"
          >
            <span>${escapeHtml(cat.label)}</span>
          </button>
        `;
      }).join('');

      categoryFiltersEl.querySelectorAll('button[data-category]').forEach((btn) => {
        btn.addEventListener('click', () => {
          state.activeCategory = btn.dataset.category;
          renderApp();
        });
      });
    }

    function renderLinkItem(link, isWarningCard, query) {
      const meta = getLinkTypeMeta(link.type);
      const isMailto = link.url.startsWith('mailto:');
      const targetAttr = isMailto ? '' : 'target="_blank" rel="noopener noreferrer"';

      return `
        <a
          href="${escapeHtml(link.url)}"
          ${targetAttr}
          class="group flex items-start justify-between gap-3 rounded-xl border p-3.5 transition-all duration-150 ${
            isWarningCard
              ? 'border-amber-200/90 bg-white hover:border-amber-400 hover:bg-amber-50/50 hover:shadow-sm'
              : 'border-slate-200/80 bg-slate-50/50 hover:border-academic-300 hover:bg-academic-50/50 hover:shadow-sm'
          }"
        >
          <div class="flex min-w-0 items-start gap-3">
            <span class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-lg ${meta.iconBg} transition-transform group-hover:scale-105">
              ${meta.icon}
            </span>
            <div class="min-w-0">
              <div class="flex flex-wrap items-center gap-1.5">
                <p class="text-sm font-semibold text-slate-800 transition-colors group-hover:text-academic-800">
                  ${highlightText(link.title, query)}
                </p>
              </div>
              ${
                link.note
                  ? `<p class="mt-0.5 text-xs leading-relaxed text-slate-500">${highlightText(link.note, query)}</p>`
                  : ''
              }
              <div class="mt-2 flex flex-wrap items-center gap-1.5">
                <span class="inline-flex items-center rounded-md px-2 py-0.5 text-[11px] font-semibold ring-1 ${meta.bg}">
                  ${escapeHtml(link.typeLabel)}
                </span>
                ${
                  isWarningCard
                    ? `<span class="inline-flex items-center gap-1 rounded-md bg-amber-100 px-2 py-0.5 text-[11px] font-bold text-amber-900 ring-1 ring-amber-300/80">
                        <svg class="h-3 w-3 text-amber-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        Akun Student
                      </span>`
                    : ''
                }
              </div>
            </div>
          </div>

          <span class="mt-1 flex h-7 w-7 shrink-0 items-center justify-center rounded-lg text-slate-400 transition-all group-hover:translate-x-0.5 group-hover:-translate-y-0.5 group-hover:bg-white group-hover:text-academic-700 group-hover:shadow-sm">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M7 17 17 7" />
              <path d="M7 7h10v10" />
            </svg>
          </span>
        </a>
      `;
    }

    function renderServiceCard(card, query) {
      const theme = getCategoryTheme(card.category);
      const isWarning = Boolean(card.requiresStudentAccount);
      const colSpanClass = card.colSpan === 2 ? 'lg:col-span-2' : '';
      let linksGridClass = 'grid grid-cols-1 gap-3';
      if (card.colSpan === 2) {
        if (card.matchedLinks.length === 3 && isWarning) {
          linksGridClass = 'grid grid-cols-1 gap-3 md:grid-cols-3';
        } else if (card.matchedLinks.length > 1) {
          linksGridClass = 'grid grid-cols-1 gap-3 md:grid-cols-2';
        }
      }

      return `
        <article
          id="card-${escapeHtml(card.id)}"
          class="animate-card-in scroll-mt-24 flex flex-col rounded-2xl border p-5 shadow-card transition-shadow duration-200 hover:shadow-card-hover sm:p-6 ${colSpanClass} ${
            isWarning
              ? 'border-amber-300 bg-gradient-to-b from-amber-50/70 via-white to-white ring-2 ring-amber-200/70'
              : 'border-slate-200/90 bg-white'
          }"
        >
          <!-- Card Header -->
          <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
            <div class="flex items-start gap-3.5">
              <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl shadow-sm ${
                isWarning ? 'bg-amber-500 text-white' : theme.iconBox
              }">
                ${getCardIconSvg(card.icon, 'h-5 w-5')}
              </div>
              <div>
                <div class="flex flex-wrap items-center gap-2">
                  <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-[11px] font-semibold ring-1 ${theme.badge}">
                    ${escapeHtml(card.category)}
                  </span>
                  ${
                    isWarning
                      ? `<span class="inline-flex items-center gap-1.5 rounded-full bg-red-600 px-3 py-0.5 text-[11px] font-extrabold uppercase tracking-wide text-white shadow-sm">
                          <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                            <line x1="12" x2="12" y1="9" y2="13"/>
                            <line x1="12" x2="12.01" y1="17" y2="17"/>
                          </svg>
                          ${escapeHtml(card.warningBadge)}
                        </span>`
                      : ''
                  }
                </div>
                <h3 class="mt-1.5 text-lg font-bold text-slate-900 sm:text-xl">
                  ${highlightText(card.title, query)}
                </h3>
                <p class="mt-1 text-xs leading-relaxed text-slate-500 sm:text-sm">
                  ${highlightText(card.subtitle, query)}
                </p>
              </div>
            </div>

            
          </div>

          ${
            isWarning
              ? `<!-- Special Student Account Alert Box -->
                <div class="mt-4 flex items-start gap-3 rounded-xl border border-amber-300 bg-amber-100/75 px-4 py-3 text-amber-950">
                  <div class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-amber-500 text-white">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                      <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                  </div>
                  <div class="text-xs leading-relaxed sm:text-sm">
                    <p class="font-bold text-amber-950">Perhatian: Wajib Akun Student UTDI</p>
                    <p class="mt-0.5 text-amber-900">${escapeHtml(card.warningDetail)}</p>
                  </div>
                </div>`
              : ''
          }

          <!-- Links List -->
          <div class="mt-5 ${linksGridClass}">
            ${card.matchedLinks.map((link) => renderLinkItem(link, isWarning, query)).join('')}
          </div>
        </article>
      `;
    }

    function renderServices() {
      const query = state.searchQuery.trim();
      const filteredCards = getFilteredCards();

      // Controls visibility
      clearSearchBtn.classList.toggle('hidden', query.length === 0);
      clearSearchBtn.classList.toggle('inline-flex', query.length > 0);

      const isFiltered = query.length > 0 || state.activeCategory !== 'Semua';
      resetAllBtn.classList.toggle('hidden', !isFiltered);
      resetAllBtn.classList.toggle('inline-flex', isFiltered);

      const totalMatchedLinks = filteredCards.reduce((sum, c) => sum + c.matchedLinks.length, 0);

      // if (query.length > 0) {
      //   resultSummaryEl.innerHTML = `Ditemukan <strong class="text-academic-700">${totalMatchedLinks} tautan</strong> pada <strong class="text-academic-700">${filteredCards.length} kartu layanan</strong>`;
      // } else if (state.activeCategory !== 'Semua') {
      //   resultSummaryEl.innerHTML = `Kategori <strong class="text-academic-700">${escapeHtml(state.activeCategory)}</strong> • ${totalMatchedLinks} tautan tersedia`;
      // } else {
      //   resultSummaryEl.innerHTML = `Menampilkan seluruh <strong class="text-academic-700">${totalMatchedLinks} tautan</strong> dalam ${filteredCards.length} kartu layanan`;
      // }

      if (filteredCards.length === 0) {
        servicesContainerEl.innerHTML = '';
        emptyStateEl.classList.remove('hidden');
        emptyQueryTextEl.textContent = query ? `"${query}"` : '';
        return;
      }

      emptyStateEl.classList.add('hidden');

      // Group cards by category order: Akademik, Perpustakaan, UPT Lab & Sertifikasi
      const categoryOrder = ['Akademik', 'Perpustakaan', 'UPT Lab & Sertifikasi'];
      const sectionsHtml = categoryOrder
        .map((catName) => {
          const cardsInCat = filteredCards.filter((c) => c.category === catName);
          if (cardsInCat.length === 0) return '';

          const catObj = CATEGORIES.find((c) => c.id === catName);
          const theme = getCategoryTheme(catName);

          return `
            <section aria-labelledby="section-${escapeHtml(catName.replace(/\W+/g, '-').toLowerCase())}">
              <div class="mb-5 flex flex-col gap-2 border-l-4 ${theme.sectionAccent} pl-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                  <div class="flex items-center gap-2.5">
                    <h2 id="section-${escapeHtml(catName.replace(/\W+/g, '-').toLowerCase())}" class="text-xl font-extrabold tracking-tight text-slate-900 sm:text-2xl">
                      ${escapeHtml(catName)}
                    </h2>
                  </div>
                  <p class="mt-0.5 text-xs text-slate-500 sm:text-sm">${escapeHtml(catObj ? catObj.description : '')}</p>
                </div>
              </div>

              <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                ${cardsInCat.map((card) => renderServiceCard(card, query)).join('')}
              </div>
            </section>
          `;
        })
        .join('');

      servicesContainerEl.innerHTML = sectionsHtml;
    }

    function renderOfficialContacts() {
      officialContactsGridEl.innerHTML = OFFICIAL_CONTACTS.map((group) => {
        const itemsHtml = group.items
          .map((item) => {
            const isMailto = item.href.startsWith('mailto:');
            const targetAttr = isMailto ? '' : 'target="_blank" rel="noopener noreferrer"';
            const meta = getLinkTypeMeta(item.type);

            return `
              <div class="rounded-xl bg-white/10 p-3.5 ring-1 ring-white/15 transition hover:bg-white/15">
                <div class="flex items-center justify-between gap-2">
                  <span class="text-[11px] font-medium uppercase tracking-wider text-academic-200">${escapeHtml(item.label)}</span>
                  <button
                    type="button"
                    data-copy="${escapeHtml(item.copyValue)}"
                    class="copy-btn inline-flex items-center gap-1 rounded-md bg-white/10 px-2 py-0.5 text-[11px] font-semibold text-academic-100 transition hover:bg-white/25 hover:text-white"
                    title="Salin ${escapeHtml(item.display)}"
                  >
                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <rect width="14" height="14" x="8" y="8" rx="2" ry="2"/>
                      <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/>
                    </svg>
                    Salin
                  </button>
                </div>
                <p class="mt-1 truncate text-sm font-bold text-white sm:text-base">${escapeHtml(item.display)}</p>
                <a
                  href="${escapeHtml(item.href)}"
                  ${targetAttr}
                  class="mt-2.5 inline-flex w-full items-center justify-center gap-1.5 rounded-lg bg-white px-3 py-2 text-xs font-bold text-academic-900 shadow-sm transition hover:bg-academic-50"
                >
                  ${meta.icon}
                  <span>${escapeHtml(item.cta)}</span>
                </a>
              </div>
            `;
          })
          .join('');

        return `
          <div class="flex flex-col justify-between rounded-2xl bg-white/10 p-5 ring-1 ring-white/15 backdrop-blur-sm">
            <div>
              <span class="inline-block rounded-full bg-academic-500/30 px-2.5 py-0.5 text-[11px] font-semibold text-sky-200 ring-1 ring-sky-300/30">
                ${escapeHtml(group.badge)}
              </span>
              <h3 class="mt-2.5 text-lg font-extrabold text-white">${escapeHtml(group.unit)}</h3>
              <p class="mt-1 text-xs leading-relaxed text-academic-100/80">${escapeHtml(group.description)}</p>
            </div>
            <div class="mt-4 space-y-3">
              ${itemsHtml}
            </div>
          </div>
        `;
      }).join('');

      officialContactsGridEl.querySelectorAll('.copy-btn').forEach((btn) => {
        btn.addEventListener('click', () => {
          copyToClipboard(btn.dataset.copy);
        });
      });
    }

    function renderApp() {
      renderCategoryFilters();
      renderServices();
    }

    // =========================================================================
    // INTERACTIONS: LIVE SEARCH, SHORTCUTS, CLIPBOARD & TOAST
    // =========================================================================

    let toastTimer = null;
    function showToast(message) {
      const toast = document.getElementById('toast');
      const toastMsg = document.getElementById('toastMessage');
      toastMsg.textContent = message;
      toast.classList.remove('opacity-0', 'translate-y-4');
      toast.classList.add('opacity-100', 'translate-y-0');

      clearTimeout(toastTimer);
      toastTimer = setTimeout(() => {
        toast.classList.remove('opacity-100', 'translate-y-0');
        toast.classList.add('opacity-0', 'translate-y-4');
      }, 2400);
    }

    async function copyToClipboard(text) {
      try {
        if (navigator.clipboard && window.isSecureContext) {
          await navigator.clipboard.writeText(text);
        } else {
          const tempInput = document.createElement('input');
          tempInput.value = text;
          document.body.appendChild(tempInput);
          tempInput.select();
          document.execCommand('copy');
          document.body.removeChild(tempInput);
        }
        showToast(`Disalin: ${text}`);
      } catch (err) {
        showToast('Gagal menyalin otomatis. Silakan salin manual.');
      }
    }

    function resetAllFilters() {
      state.activeCategory = 'Semua';
      state.searchQuery = '';
      searchInput.value = '';
      renderApp();
    }

    // Live search input listener
    searchInput.addEventListener('input', (e) => {
      state.searchQuery = e.target.value;
      renderServices();
    });

    clearSearchBtn.addEventListener('click', () => {
      state.searchQuery = '';
      searchInput.value = '';
      searchInput.focus();
      renderServices();
    });

    resetAllBtn.addEventListener('click', resetAllFilters);
    emptyResetBtn.addEventListener('click', resetAllFilters);

    // Quick search chips
    document.querySelectorAll('.quick-chip').forEach((chip) => {
      chip.addEventListener('click', () => {
        const keyword = chip.dataset.quickSearch || '';
        state.activeCategory = 'Semua';
        state.searchQuery = keyword;
        searchInput.value = keyword;
        renderApp();
        document.getElementById('layanan').scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
    });

    // Navbar shortcut to TOEFL & Sertifikasi card
    navToeflShortcut.addEventListener('click', () => {
      state.activeCategory = 'UPT Lab & Sertifikasi';
      state.searchQuery = '';
      searchInput.value = '';
      renderApp();
      requestAnimationFrame(() => {
        const card = document.getElementById('card-lab-toefl-sertifikasi');
        if (card) {
          card.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
      });
    });

    // Search button in top navbar
    focusSearchBtn.addEventListener('click', () => {
      searchInput.focus();
      searchInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
    });

    // Keyboard shortcuts: '/' or Ctrl/Cmd+K to focus search; Escape to clear
    document.addEventListener('keydown', (e) => {
      const activeTag = document.activeElement ? document.activeElement.tagName.toLowerCase() : '';
      const isTyping = activeTag === 'input' || activeTag === 'textarea';

      if ((e.key === '/' && !isTyping) || ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k')) {
        e.preventDefault();
        searchInput.focus();
        searchInput.select();
      } else if (e.key === 'Escape' && document.activeElement === searchInput) {
        if (searchInput.value) {
          state.searchQuery = '';
          searchInput.value = '';
          renderServices();
        } else {
          searchInput.blur();
        }
      }
    });

    // Initial render
    renderApp();
    renderOfficialContacts();
  </script>
</body>
</html>
