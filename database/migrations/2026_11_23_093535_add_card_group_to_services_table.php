<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('card_title')->nullable()->after('category_id');
            $table->string('card_subtitle')->nullable()->after('card_title');
            $table->string('card_icon')->default('book-open')->after('card_subtitle');
            $table->tinyInteger('card_col_span')->default(1)->after('card_icon');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['card_title', 'card_subtitle', 'card_icon', 'card_col_span']);
        });
    }
};