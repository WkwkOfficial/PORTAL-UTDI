<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('link_type')->default('web')->after('url'); // web, form, doc, whatsapp, email, instagram
            $table->text('keywords')->nullable()->after('description');
            $table->boolean('is_student_only')->default(false)->after('is_active');
            $table->integer('sort_order')->default(0)->after('is_student_only');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['link_type', 'keywords', 'is_student_only', 'sort_order']);
        });
    }
};