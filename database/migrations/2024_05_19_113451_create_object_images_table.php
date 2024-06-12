<?php

use App\Enums\ObjectEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('object_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('object_id');
            $table->tinyInteger('type')->default(ObjectEnum::PROJECT->value);
            $table->string('url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('object_images');
    }
};