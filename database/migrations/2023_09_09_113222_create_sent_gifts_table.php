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
        Schema::create('sent_gifts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gift_id')->constrained()->cascadeOnDelete();
            $table->foreignId('recipient_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('sender_id')->references('id')->on('users')->cascadeOnDelete();
            $table->text('message')->nullable();
            $table->boolean('is_private');
            $table->unsignedDecimal('price');
            $table->enum('currency', Currencies::values())->default(Currencies::VOTE->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sent_gifts');
    }
};
