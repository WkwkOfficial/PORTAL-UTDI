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
  <title>{{ $service->exists ? 'Edit' : 'Tambah' }} Tautan — Admin Portal UTDI</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-50 font-['Plus_Jakarta_Sans'] text-slate-800 py-8 px-4">
  <div class="mx-auto max-w-3xl rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-sm">
    <div class="flex items-center justify-between border-b border-slate-100 pb-4 mb-6">
      <h1 class="text-xl font-extrabold text-slate-900">{{ $service->exists ? 'Edit Tautan Layanan' : 'Tambah Tautan Layanan Baru' }}</h1>
      <a href="{{ route('admin.services.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">&larr; Kembali</a>
    </div>

    @if ($errors->any())
      <div class="mb-5 rounded-xl bg-red-50 border border-red-200 p-3.5 text-xs text-red-700">
        <ul class="list-disc pl-4 space-y-1">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}" class="space-y-5">
      @csrf
      @if ($service->exists) @method('PUT') @endif

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-bold text-slate-700 mb-1">Unit / Kategori Utama *</label>
          <select name="category_id" required class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
            @foreach ($categories as $cat)
              <option value="{{ $cat->id }}" @selected(old('category_id', $service->category_id) == $cat->id)>{{ $cat->name }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-700 mb-1">Judul Kelompok Kartu *</label>
          <input type="text" name="card_title" list="cardTitleList" value="{{ old('card_title', $service->card_title) }}" required
            placeholder="Misal: Jadwal Kuliah & Akreditasi"
            class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm" />
          <datalist id="cardTitleList">
            @foreach ($existingCardTitles as $title)
              <option value="{{ $title }}">
            @endforeach
          </datalist>
        </div>
      </div>

      <div>
        <label class="block text-xs font-bold text-slate-700 mb-1">Subjudul Kartu (Keterangan Singkat Kelompok)</label>
        <input type="text" name="card_subtitle" list="cardSubtitleList" value="{{ old('card_subtitle', $service->card_subtitle) }}"
          placeholder="Misal: Informasi jadwal perkuliahan aktif serta dokumen sertifikat akreditasi"
          class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm" />
        <datalist id="cardSubtitleList">
          @foreach ($existingCardSubtitles as $subtitle)
            <option value="{{ $subtitle }}">
          @endforeach
        </datalist>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div>
          <label class="block text-xs font-bold text-slate-700 mb-1">Ikon Kartu</label>
          <select name="card_icon" class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
            @foreach (['book-open', 'calendar', 'clipboard-check', 'library', 'upload', 'cpu', 'shield-check', 'award'] as $ic)
              <option value="{{ $ic }}" @selected(old('card_icon', $service->card_icon) === $ic)>{{ $ic }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-700 mb-1">Lebar Kartu di Desktop</label>
          <select name="card_col_span" class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
            <option value="1" @selected(old('card_col_span', $service->card_col_span) == 1)>1 Kolom (Standar)</option>
            <option value="2" @selected(old('card_col_span', $service->card_col_span) == 2)>2 Kolom (Lebar Penuh)</option>
          </select>
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-700 mb-1">Urutan Tampil</label>
          <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}"
            class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm" />
        </div>
      </div>

      <hr class="border-slate-100" />

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="sm:col-span-2">
          <label class="block text-xs font-bold text-slate-700 mb-1">Nama Tautan Layanan *</label>
          <input type="text" name="name" value="{{ old('name', $service->name) }}" required
            class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm" />
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-700 mb-1">Jenis Tautan *</label>
          <select name="link_type" class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
            @foreach (['web' => 'Website', 'form' => 'Google Form', 'sheet' => 'Google Sheets', 'drive-folder' => 'Folder Drive', 'drive-file' => 'Dokumen Drive', 'whatsapp' => 'WhatsApp', 'email' => 'Email', 'instagram' => 'Instagram'] as $val => $lbl)
              <option value="{{ $val }}" @selected(old('link_type', $service->link_type) === $val)>{{ $lbl }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div>
        <label class="block text-xs font-bold text-slate-700 mb-1">URL Tujuan *</label>
        <input type="text" name="url" value="{{ old('url', $service->url) }}" required placeholder="https://..."
          class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm" />
      </div>

      <div>
        <label class="block text-xs font-bold text-slate-700 mb-1">Catatan / Keterangan Tautan</label>
        <input type="text" name="description" value="{{ old('description', $service->description) }}"
          class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm" />
      </div>

      <div>
        <label class="block text-xs font-bold text-slate-700 mb-1">Kata Kunci Pencarian (Keywords)</label>
        <input type="text" name="keywords" value="{{ old('keywords', $service->keywords) }}" placeholder="misal: toefl sertifikasi yudisium jadwal"
          class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm" />
      </div>

      <div class="flex flex-wrap gap-6 pt-2">
        <label class="inline-flex items-center gap-2 text-sm font-semibold text-amber-900">
          <input type="checkbox" name="is_student_only" value="1" @checked(old('is_student_only', $service->is_student_only)) class="rounded border-slate-300 text-amber-600" />
          Tandai "Wajib Akun Student"
        </label>

        <label class="inline-flex items-center gap-2 text-sm font-semibold text-slate-700">
          <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $service->is_active ?? true)) class="rounded border-slate-300 text-blue-600" />
          Tampilkan di Portal (Aktif)
        </label>
      </div>

      <div class="pt-4 flex justify-end gap-3">
        <a href="{{ route('admin.services.index') }}" class="rounded-xl border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-700">Batal</a>
        <button type="submit" class="rounded-xl bg-blue-700 px-6 py-2.5 text-sm font-bold text-white shadow hover:bg-blue-600">Simpan Layanan</button>
      </div>
    </form>
  </div>
</body>
</html>