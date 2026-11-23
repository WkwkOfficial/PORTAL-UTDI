<!DOCTYPE html>
<html lang="id">
<head>
    <script>
  if (!sessionStorage.getItem('utdi_admin_tab_active')) {
    window.addEventListener('DOMContentLoaded', () => {
      const logoutForm = document.querySelector('form[action*="logout"]');
      if (logoutForm) {
        logoutForm.submit();
      }
    });
  }
</script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ganti Password Admin — Portal UTDI</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-50 text-slate-800">
  <header class="border-b border-slate-200 bg-white">
    <div class="mx-auto flex max-w-4xl items-center justify-between px-4 py-4">
      <div>
        <h1 class="text-lg font-bold text-slate-900">Pengaturan Keamanan Admin</h1>
        <p class="text-xs text-slate-500">Perbarui kata sandi akun pengelola Portal UTDI</p>
      </div>
      <div class="flex items-center gap-3">
        <a href="{{ route('admin.services.index') }}" class="rounded-lg border border-slate-200 px-3 py-1.5 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
          &larr; Kembali ke Layanan
        </a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="rounded-lg bg-rose-600 px-3 py-1.5 text-sm font-semibold text-white transition hover:bg-rose-700">
            Keluar
          </button>
        </form>
      </div>
    </div>
  </header>

  <main class="mx-auto max-w-xl px-4 py-8">
    @if (session('status'))
      <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">
        {{ session('status') }}
      </div>
    @endif

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
      <form method="POST" action="{{ route('admin.password.update') }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
          <label for="current_password" class="mb-1 block text-sm font-semibold text-slate-700">Password Saat Ini</label>
          <input type="password" id="current_password" name="current_password" required
                 class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm focus:border-blue-600 focus:outline-none">
          @error('current_password')
            <p class="mt-1 text-xs font-medium text-rose-600">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="password" class="mb-1 block text-sm font-semibold text-slate-700">Password Baru</label>
          <input type="password" id="password" name="password" required
                 class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm focus:border-blue-600 focus:outline-none">
          @error('password')
            <p class="mt-1 text-xs font-medium text-rose-600">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="password_confirmation" class="mb-1 block text-sm font-semibold text-slate-700">Konfirmasi Password Baru</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required
                 class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm focus:border-blue-600 focus:outline-none">
        </div>

        <div class="pt-2">
          <button type="submit" class="w-full rounded-xl bg-blue-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-800">
            Simpan Password Baru
          </button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>