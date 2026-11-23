<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('id')->get();
        $query = Service::with('category')->orderBy('category_id')->orderBy('sort_order')->orderBy('id');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('card_title', 'like', "%{$q}%")
                    ->orWhere('keywords', 'like', "%{$q}%");
            });
        }

        $services = $query->get();

        return view('admin.services.index', compact('services', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('id')->get();
        $existingCards = Service::select('category_id', 'card_title', 'card_subtitle', 'card_icon', 'card_col_span')
            ->whereNotNull('card_title')
            ->distinct()
            ->get();

        return view('admin.services.form', [
            'service' => new Service(['is_active' => true, 'card_col_span' => 1, 'card_icon' => 'book-open', 'link_type' => 'web']),
            'categories' => $categories,
            'existingCards' => $existingCards,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateService($request);
        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Tautan layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        $categories = Category::orderBy('id')->get();
        $existingCards = Service::select('category_id', 'card_title', 'card_subtitle', 'card_icon', 'card_col_span')
            ->whereNotNull('card_title')
            ->distinct()
            ->get();

        return view('admin.services.form', compact('service', 'categories', 'existingCards'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $this->validateService($request);
        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Tautan layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Tautan layanan berhasil dihapus.');
    }

    private function validateService(Request $request): array
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'card_title' => ['required', 'string', 'max:255'],
            'card_subtitle' => ['nullable', 'string', 'max:500'],
            'card_icon' => ['nullable', 'string', 'max:50'],
            'card_col_span' => ['required', 'integer', 'in:1,2'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:500'],
            'url' => ['required', 'string', 'max:1000'],
            'link_type' => ['required', 'string', 'max:50'],
            'keywords' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $validated['is_student_only'] = $request->boolean('is_student_only');
        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        return $validated;
    }
}