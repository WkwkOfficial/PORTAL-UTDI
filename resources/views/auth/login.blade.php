<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Admin — Portal UTDI</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
          colors: { academic: { 600: '#2563EB', 700: '#1D4ED8', 900: '#0F294A', 950: '#091A32' } }
        }
      }
    }
  </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-academic-950 via-academic-900 to-academic-700 flex items-center justify-center p-4 font-sans">
  <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-2xl">
    <div class="text-center mb-6">
      <span class="inline-block rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-academic-700">Halaman Pengelola Portal</span>
      <h1 class="mt-2 text-2xl font-extrabold text-slate-900">Login Admin UTDI</h1>
      <p class="mt-1 text-xs text-slate-500">Masuk untuk mengelola tautan layanan &amp; informasi mahasiswa</p>
    </div>

    @if ($errors->any())
      <div class="mb-4 rounded-xl bg-red-50 border border-red-200 p-3 text-xs text-red-700 font-medium">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
      @csrf
      <div>
        <label class="block text-xs font-bold text-slate-700 mb-1">Email Admin</label>
        <input type="email" name="email" value="{{ old('email', 'admin@utdi.ac.id') }}" required autofocus
          class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm focus:border-academic-600 focus:outline-none focus:ring-2 focus:ring-academic-600/20" />
      </div>
      <div>
        <label class="block text-xs font-bold text-slate-700 mb-1">Password</label>
        <input type="password" name="password" required
          class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm focus:border-academic-600 focus:outline-none focus:ring-2 focus:ring-academic-600/20" />
      </div>
      <div class="flex items-center justify-between text-xs">
        <label class="inline-flex items-center gap-2 text-slate-600">
          <input type="checkbox" name="remember" class="rounded border-slate-300 text-academic-600" />
          Ingat sesi saya
        </label>
        <a href="{{ route('home') }}" class="font-semibold text-academic-700 hover:underline">&larr; Kembali ke Portal</a>
      </div>
      <button type="submit" class="w-full rounded-xl bg-academic-700 py-2.5 text-sm font-bold text-white shadow hover:bg-academic-600 transition">
        Masuk Dashboard Admin
      </button>
    </form>
  </div>
  <script>
  document.querySelector('form')?.addEventListener('submit', () => {
    sessionStorage.setItem('utdi_admin_tab_active', '1');
  });
</script>
</body>
</html>