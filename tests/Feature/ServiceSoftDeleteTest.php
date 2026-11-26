<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceSoftDeleteTest extends TestCase
{
    use RefreshDatabase;

    public function test_soft_deleting_service_hides_it_from_home_and_active_admin_list(): void
    {
        $user = User::factory()->create();
        $category = Category::create([
            'name' => 'Akademik',
            'slug' => 'akademik',
            'description' => 'Layanan akademik',
        ]);

        $service = Service::create([
            'category_id' => $category->id,
            'card_title' => 'Kartu Akademik',
            'card_subtitle' => 'Subjudul',
            'card_icon' => 'book-open',
            'card_col_span' => 1,
            'name' => 'Portal KRS',
            'description' => 'Isi KRS',
            'url' => 'https://example.com/krs',
            'link_type' => 'web',
            'is_active' => true,
            'is_student_only' => false,
            'sort_order' => 1,
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('Portal KRS');

        $this->actingAs($user)
            ->delete(route('admin.services.destroy', $service))
            ->assertRedirect(route('admin.services.index'));

        $this->assertSoftDeleted('services', ['id' => $service->id]);

        $this->get('/')
            ->assertOk()
            ->assertDontSee('Portal KRS');

        $this->actingAs($user)
            ->get(route('admin.services.index'))
            ->assertOk()
            ->assertDontSee('Portal KRS');
    }

    public function test_admin_can_view_trashed_services_and_restore_them(): void
    {
        $user = User::factory()->create();
        $category = Category::create([
            'name' => 'Perpustakaan',
            'slug' => 'perpustakaan',
            'description' => 'Layanan perpustakaan',
        ]);

        $service = Service::create([
            'category_id' => $category->id,
            'card_title' => 'Kartu Perpus',
            'card_subtitle' => 'Subjudul',
            'card_icon' => 'book-open',
            'card_col_span' => 1,
            'name' => 'Katalog Buku',
            'description' => 'Cari buku',
            'url' => 'https://example.com/katalog',
            'link_type' => 'web',
            'is_active' => true,
            'is_student_only' => false,
            'sort_order' => 1,
        ]);

        $service->delete();

        $this->actingAs($user)
            ->get(route('admin.services.index', ['status' => 'trashed']))
            ->assertOk()
            ->assertSee('Katalog Buku')
            ->assertSee('Pulihkan');

        $this->actingAs($user)
            ->patch(route('admin.services.restore', $service))
            ->assertRedirect(route('admin.services.index', ['status' => 'trashed']));

        $this->assertNotSoftDeleted('services', ['id' => $service->id]);

        $this->get('/')
            ->assertOk()
            ->assertSee('Katalog Buku');
    }

    public function test_guest_cannot_restore_trashed_service(): void
    {
        $category = Category::create([
            'name' => 'Laboratorium',
            'slug' => 'laboratorium',
            'description' => 'Layanan lab',
        ]);

        $service = Service::create([
            'category_id' => $category->id,
            'card_title' => 'Kartu Lab',
            'card_subtitle' => 'Subjudul',
            'card_icon' => 'book-open',
            'card_col_span' => 1,
            'name' => 'Jadwal Lab',
            'description' => 'Lihat jadwal',
            'url' => 'https://example.com/lab',
            'link_type' => 'web',
            'is_active' => true,
            'is_student_only' => false,
            'sort_order' => 1,
        ]);

        $service->delete();

        $this->patch(route('admin.services.restore', $service))
            ->assertRedirect(route('login'));

        $this->assertSoftDeleted('services', ['id' => $service->id]);
    }
}
