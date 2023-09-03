<?php

use App\Enums\ImportantQuality;
use App\Enums\PersonalPriority;
use App\Enums\PersonalView;
use App\Enums\PoliticalView;
use App\Enums\ReligionType;
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
        Schema::create('personl_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('political_views', PoliticalView::values())->default(PoliticalView::NONE->value);
            $table->enum('religion', ReligionType::values())->default(ReligionType::NONE->value);
            $table->enum('personal_priority', PersonalPriority::values())->default(PersonalPriority::NONE->value);
            $table->enum('important_in_others', ImportantQuality::values())->default(ImportantQuality::NONE->value);
            $table->enum('smoking', PersonalView::values())->default(PersonalView::NONE->value);
            $table->enum('alcohol', PersonalView::values())->default(PersonalView::NONE->value);
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
