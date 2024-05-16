<?php

use App\Enums\ProjectTypeEnum;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price_per_meter')->nullable();
            $table->unsignedInteger('area')->nullable();
            $table->boolean('is_favourite')->default(false);
            $table->unsignedInteger('type')->default(ProjectTypeEnum::COTTAGE->value);

            $table->foreignId('architect_id')
                ->index('architect_index')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('region_id')
                ->index('region_index')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
