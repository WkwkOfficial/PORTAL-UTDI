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

    <div class="mb-4 flex items-center gap-2">
      <a href="{{ route('admin.services.index', array_filter(['q' => request('q'), 'category_id' => request('category_id')])) }}"
        class="inline-flex items-center gap-2 rounded-xl px-4 py-2 text-sm font-bold transition {{ $status !== 'trashed' ? 'bg-[#091A32] text-white shadow-sm' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-100' }}">
        Aktif
      </a>
      <a href="{{ route('admin.services.index', array_filter(['status' => 'trashed', 'q' => request('q'), 'category_id' => request('category_id')])) }}"
        class="inline-flex items-center gap-2 rounded-xl px-4 py-2 text-sm font-bold transition {{ $status === 'trashed' ? 'bg-red-600 text-white shadow-sm' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-100' }}">
        Terhapus
        @if ($trashedCount > 0)
          <span class="rounded-full px-2 py-0.5 text-xs {{ $status === 'trashed' ? 'bg-white/20 text-white' : 'bg-red-100 text-red-700' }}">{{ $trashedCount }}</span>
        @endif
      </a>
    </div>

    <form method="GET" class="mb-5 flex flex-col sm:flex-row gap-3 bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">
      @if ($status === 'trashed')
        <input type="hidden" name="status" value="trashed" />
      @endif
      <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama layanan atau kartu..." class="flex-1 rounded-xl border border-slate-300 px-3.5 py-2 text-sm" />
      <select name="category_id" class="rounded-xl border border-slate-300 px-3.5 py-2 text-sm">
        <option value="">Semua Unit / Kategori</option>
        @foreach ($categories as $cat)
          <option value="{{ $cat->id }}" @selected(request('category_id') == $cat->id)>{{ $cat->name }}</option>
        @endforeach
      </select>
      <button type="submit" class="rounded-xl bg-slate-800 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-700">Filter</button>
      @if (request()->hasAny(['q', 'category_id']))
        <a href="{{ route('admin.services.index', $status === 'trashed' ? ['status' => 'trashed'] : []) }}" class="rounded-xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-600 text-center">Reset</a>
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
                @if ($item->trashed())
                  <span class="rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-bold text-red-700">Terhapus</span>
                @elseif ($item->is_active)
                  <span class="rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-bold text-emerald-800">Aktif</span>
                @else
                  <span class="rounded-full bg-slate-200 px-2.5 py-0.5 text-xs font-bold text-slate-600">Nonaktif</span>
                @endif
              </td>
              <td class="px-4 py-3 text-right space-x-2 whitespace-nowrap">
                @if ($item->trashed())
                <form method="POST" action="{{ route('admin.services.restore', $item) }}" class="inline" data-service-name="{{ $item->name }}">
                  @csrf
                  @method('PATCH')
                  <button type="button" onclick="openConfirmModal(this.closest('form'), 'restore')" class="rounded-lg bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700 hover:bg-emerald-100 transition">Pulihkan</button>
                </form>
                @else
                <a href="{{ route('admin.services.edit', $item) }}" class="inline-block rounded-lg bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-800 hover:bg-amber-100 transition">Edit</a>
                <form method="POST" action="{{ route('admin.services.destroy', $item) }}" class="inline" data-service-name="{{ $item->name }}">
                  @csrf
                  @method('DELETE')
                  <button type="button" onclick="openConfirmModal(this.closest('form'), 'delete')" class="rounded-lg bg-red-50 px-3 py-1.5 text-xs font-bold text-red-700 hover:bg-red-100 transition">Hapus</button>
                </form>
              @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="px-4 py-8 text-center text-slate-500">
                {{ $status === 'trashed' ? 'Tidak ada tautan layanan yang terhapus.' : 'Belum ada data tautan layanan.' }}
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
  <!-- Modal Konfirmasi Kustom (Hapus & Pulihkan) -->
  <div id="confirmModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/60 backdrop-blur-xs p-4 transition-opacity">
    <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-2xl border border-slate-100 transform transition-all">
      <div class="flex items-start gap-4">
        <div id="modalIconWrap" class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-red-100 text-red-600">
          <!-- Ikon Hapus (Merah) -->
          <svg id="iconDelete" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
          </svg>
          <!-- Ikon Pulihkan (Hijau) -->
          <svg id="iconRestore" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
          </svg>
        </div>
        <div class="flex-1">
          <h3 id="modalTitle" class="text-base font-extrabold text-slate-900">Konfirmasi</h3>
          <p id="modalDescription" class="mt-1.5 text-sm text-slate-600 leading-relaxed"></p>
        </div>
      </div>

      <div class="mt-6 flex items-center justify-end gap-2.5">
        <button type="button" onclick="closeConfirmModal()" class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-xs font-bold text-slate-700 hover:bg-slate-50 transition">
          Batal
        </button>
        <button type="button" id="modalSubmitBtn" class="rounded-xl px-4 py-2 text-xs font-bold text-white shadow-sm transition">
          Konfirmasi
        </button>
      </div>
    </div>
  </div>

  <script>
    let activeActionForm = null;
    const confirmModal = document.getElementById('confirmModal');
    const modalIconWrap = document.getElementById('modalIconWrap');
    const iconDelete = document.getElementById('iconDelete');
    const iconRestore = document.getElementById('iconRestore');
    const modalTitle = document.getElementById('modalTitle');
    const modalDescription = document.getElementById('modalDescription');
    const modalSubmitBtn = document.getElementById('modalSubmitBtn');

    function openConfirmModal(form, actionType) {
      activeActionForm = form;
      const serviceName = form.dataset.serviceName;

      if (actionType === 'restore') {
        modalIconWrap.className = 'flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600';
        iconDelete.classList.add('hidden');
        iconRestore.classList.remove('hidden');
        modalTitle.textContent = 'Pulihkan Tautan Layanan?';
        modalDescription.innerHTML = `Layanan <span class="font-bold text-slate-900">"${serviceName}"</span> akan dikembalikan ke daftar <span class="font-semibold text-emerald-700">Aktif</span> dan langsung tampil kembali di halaman utama portal.`;
        modalSubmitBtn.className = 'rounded-xl bg-emerald-600 px-4 py-2 text-xs font-bold text-white shadow-sm hover:bg-emerald-500 transition';
        modalSubmitBtn.textContent = 'Ya, Pulihkan Layanan';
      } else {
        modalIconWrap.className = 'flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-red-100 text-red-600';
        iconRestore.classList.add('hidden');
        iconDelete.classList.remove('hidden');
        modalTitle.textContent = 'Hapus Tautan Layanan?';
        modalDescription.innerHTML = `Layanan <span class="font-bold text-slate-900">"${serviceName}"</span> akan dipindahkan ke tab <span class="font-semibold text-red-600">Terhapus</span> dan disembunyikan dari halaman utama portal.`;
        modalSubmitBtn.className = 'rounded-xl bg-red-600 px-4 py-2 text-xs font-bold text-white shadow-sm hover:bg-red-500 transition';
        modalSubmitBtn.textContent = 'Ya, Pindahkan ke Terhapus';
      }

      confirmModal.classList.remove('hidden');
      confirmModal.classList.add('flex');
    }

    function closeConfirmModal() {
      activeActionForm = null;
      confirmModal.classList.add('hidden');
      confirmModal.classList.remove('flex');
    }

    modalSubmitBtn.addEventListener('click', () => {
      if (activeActionForm) {
        activeActionForm.submit();
      }
    });

    confirmModal.addEventListener('click', (e) => {
      if (e.target === confirmModal) closeConfirmModal();
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !confirmModal.classList.contains('hidden')) {
        closeConfirmModal();
      }
    });
  </script>
</body>
</html>