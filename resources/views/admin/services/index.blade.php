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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Portal UTDI</title>
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Crect width='32' height='32' rx='8' fill='%23FACC15'/%3E%3Cg fill='none' stroke='%23091A32' stroke-width='2.2' stroke-linecap='round' stroke-linejoin='round' transform='translate(4,4)'%3E%3Cpath d='M22 10v6M2 10l10-5 10 5-10 5z'/%3E%3Cpath d='M6 12v5c0 1.66 2.69 3 6 3s6-1.34 6-3v-5'/%3E%3C/g%3E%3C/svg%3E" />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-50 font-['Plus_Jakarta_Sans'] text-slate-800">
  <header class="bg-[#091A32] text-white border-b border-slate-800">
    <div class="mx-auto max-w-7xl px-4 py-3.5 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <span class="font-extrabold tracking-wide text-base">ADMIN PORTAL UTDI</span>
      </div>
      <div class="flex items-center gap-3">
        <a href="{{ route('home') }}" class="rounded-lg bg-white/10 px-3 py-1.5 text-xs font-semibold hover:bg-white/20">Kembali ke Portal &nearr;</a>
        <a href="{{ route('admin.password.edit') }}" class="rounded-lg bg-white/10 px-3 py-1.5 text-xs font-semibold hover:bg-white/20
        ">
          Ganti Password
        </a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="rounded-lg bg-red-600 px-3 py-1.5 text-xs font-semibold hover:bg-red-500">Keluar</button>
        </form>
      </div>
    </div>
  </header>

  <main class="mx-auto max-w-7xl px-4 py-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
      <div>
        <h1 class="text-2xl font-extrabold text-slate-900">Daftar Tautan Layanan Mahasiswa</h1>
        <p class="text-xs text-slate-500 mt-0.5">Tambah, ubah, atau atur status Wajib Akun Student untuk setiap tautan.</p>
      </div>
      <a href="{{ route('admin.services.create') }}" class="inline-flex items-center justify-center rounded-xl bg-blue-700 px-4 py-2.5 text-sm font-bold text-white shadow hover:bg-blue-600">
        + Tambah Tautan Layanan
      </a>
    </div>

    @if (session('success'))
      <div class="mb-5 rounded-xl bg-emerald-50 border border-emerald-200 px-4 py-3 text-sm font-medium text-emerald-800">
        {{ session('success') }}
      </div>
    @endif

    <form method="GET" class="mb-5 flex flex-col sm:flex-row gap-3 bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">
      <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama layanan atau kartu..." class="flex-1 rounded-xl border border-slate-300 px-3.5 py-2 text-sm" />
      <select name="category_id" class="rounded-xl border border-slate-300 px-3.5 py-2 text-sm">
        <option value="">Semua Unit / Kategori</option>
        @foreach ($categories as $cat)
          <option value="{{ $cat->id }}" @selected(request('category_id') == $cat->id)>{{ $cat->name }}</option>
        @endforeach
      </select>
      <button type="submit" class="rounded-xl bg-slate-800 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-700">Filter</button>
      @if (request()->hasAny(['q', 'category_id']))
        <a href="{{ route('admin.services.index') }}" class="rounded-xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-600 text-center">Reset</a>
      @endif
    </form>

    <div class="overflow-x-auto rounded-2xl border border-slate-200 bg-white shadow-sm">
      <table class="w-full text-left text-sm">
        <thead class="bg-slate-100 text-xs uppercase text-slate-600">
          <tr>
            <th class="px-4 py-3">Unit &amp; Kelompok Kartu</th>
            <th class="px-4 py-3">Nama Tautan Layanan</th>
            <th class="px-4 py-3">Tipe</th>
            <th class="px-4 py-3">Akses</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
          @forelse ($services as $item)
            <tr class="hover:bg-slate-50">
              <td class="px-4 py-3">
                <span class="inline-block rounded-full bg-blue-50 px-2.5 py-0.5 text-[11px] font-bold text-blue-700">{{ $item->category->name }}</span>
                <p class="mt-1 text-xs font-semibold text-slate-700">{{ $item->card_title }}</p>
              </td>
              <td class="px-4 py-3">
                <a href="{{ $item->url }}" target="_blank" class="font-bold text-slate-900 hover:text-blue-700">{{ $item->name }} &nearr;</a>
                <p class="text-xs text-slate-500 line-clamp-1">{{ $item->description }}</p>
              </td>
              <td class="px-4 py-3 text-xs font-semibold uppercase text-slate-600">{{ $item->link_type }}</td>
              <td class="px-4 py-3">
                @if ($item->is_student_only)
                  <span class="rounded-md bg-amber-100 px-2 py-0.5 text-[11px] font-bold text-amber-900">Wajib Student</span>
                @else
                  <span class="text-xs text-slate-500">Umum</span>
                @endif
              </td>
              <td class="px-4 py-3">
                @if ($item->is_active)
                  <span class="rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-bold text-emerald-800">Aktif</span>
                @else
                  <span class="rounded-full bg-slate-200 px-2.5 py-0.5 text-xs font-bold text-slate-600">Nonaktif</span>
                @endif
              </td>
              <td class="px-4 py-3 text-right space-x-2 whitespace-nowrap">
                <a href="{{ route('admin.services.edit', $item) }}" class="inline-block rounded-lg bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-800 hover:bg-amber-100">Edit</a>
                <form method="POST" action="{{ route('admin.services.destroy', $item) }}" class="inline" onsubmit="return confirm('Hapus tautan layanan ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="rounded-lg bg-red-50 px-3 py-1.5 text-xs font-bold text-red-700 hover:bg-red-100">Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="px-4 py-8 text-center text-slate-500">Belum ada data tautan layanan.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>