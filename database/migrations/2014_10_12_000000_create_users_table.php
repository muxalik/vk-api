<?php

use App\Enums\Devices;
use App\Enums\Genders;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('avatar_id')->nullable()->references('id')->on('files')->nullOnDelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender', Genders::values())->default(Genders::NONE->value);
            $table->string('nickname')->unique();
            $table->string('status')->nullable();
            $table->boolean('is_online');
            $table->enum('device', Devices::values());
            $table->timestamp('last_online_at')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('city_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('home_id')->nullable()->references('id')->on('places')->nullOnDelete();
            $table->string('alt_phone')->nullable();
            $table->string('skype')->nullable();
            $table->string('website')->nullable();
            $table->string('notification_email')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
