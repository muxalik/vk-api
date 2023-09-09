<?php

use App\Enums\Currencies;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sticker_packs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('image_id')->references('id')->on('files')->cascadeOnDelete();
            $table->unsignedDecimal('price');
            $table->enum('currency', Currencies::values())->default(Currencies::Vote->value);
            $table->json('condition')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sticker_packs');
    }
};
