<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id')->get();
        $services = Service::with('category')
            ->currentlyVisible()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $announcements = Announcement::where('is_active', true)
            ->latest('published_at')
            ->get();

        // Bentuk struktur CATEGORIES untuk frontend
        $categoriesPayload = collect([
            [
                'id' => 'Semua',
                'label' => 'Semua',
                'description' => 'Seluruh layanan akademik, perpustakaan, dan laboratorium',
            ],
        ])->merge(
            $categories->map(fn ($cat) => [
                'id' => $cat->name,
                'label' => $cat->name,
                'description' => $cat->description,
            ])
        )->values();

        // Kelompokkan services berdasarkan card_title agar kartu persis seperti desain asli
        $groupedCards = $services->groupBy(function ($item) {
            return $item->category->name . '||' . ($item->card_title ?: $item->name);
        })->map(function ($items) {
            $first = $items->first();
            $requiresStudent = $items->contains(fn ($s) => (bool) $s->is_student_only);

            $typeLabelMap = [
                'form' => 'Google Form',
                'sheet' => 'Google Sheets',
                'drive-folder' => 'Folder Drive',
                'drive-file' => 'Dokumen Drive',
                'web' => 'Website',
                'whatsapp' => 'WhatsApp',
                'email' => 'Email',
                'instagram' => 'Instagram',
            ];

            return [
                'id' => Str::slug(($first->category->slug ?? 'unit') . '-' . ($first->card_title ?: $first->name)),
                'category' => $first->category->name,
                'title' => $first->card_title ?: $first->name,
                'subtitle' => $first->card_subtitle ?: $first->description,
                'icon' => $first->card_icon ?: 'book-open',
                'colSpan' => (int) ($first->card_col_span ?: 1),
                'requiresStudentAccount' => $requiresStudent,
                'warningBadge' => $requiresStudent ? 'Wajib Akun Student' : null,
                'warningDetail' => $requiresStudent
                    ? 'Gunakan akun student untuk mengakses! Pastikan Anda sudah login Google menggunakan akun email resmi mahasiswa UTDI agar formulir dapat dibuka.'
                    : null,
                'links' => $items->map(function ($s) use ($typeLabelMap) {
                    $type = $s->link_type ?: 'web';
                    return [
                        'title' => $s->name,
                        'url' => $s->url,
                        'type' => $type,
                        'typeLabel' => $typeLabelMap[$type] ?? 'Tautan',
                        'note' => $s->description,
                        'keywords' => $s->keywords ?? '',
                    ];
                })->values(),
            ];
        })->values();

        return view('home', [
            'categoriesPayload' => $categoriesPayload,
            'serviceCardsPayload' => $groupedCards,
            'announcements' => $announcements,
        ]);
    }
}