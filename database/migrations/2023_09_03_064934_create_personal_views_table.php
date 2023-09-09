<?php

use App\Enums\ImportantQualities;
use App\Enums\PersonalPriorities;
use App\Enums\PersonalViews;
use App\Enums\PoliticalViews;
use App\Enums\Religions;
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
        Schema::create('personal_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('political_views', PoliticalViews::values())->default(PoliticalViews::NONE->value);
            $table->enum('religion', Religions::values())->default(Religions::NONE->value);
            $table->enum('personal_priority', PersonalPriorities::values())->default(PersonalPriorities::NONE->value);
            $table->enum('important_in_others', ImportantQualities::values())->default(ImportantQualities::NONE->value);
            $table->enum('smoking', PersonalViews::values())->default(PersonalViews::NONE->value);
            $table->enum('alcohol', PersonalViews::values())->default(PersonalViews::NONE->value);
            $table->string('inspired_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personl_views');
    }
};
