<?php

use App\Models\ComponentData;
use App\Models\ComponentType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('componentable_id')->nullable();
            $table->string('componentable_type')->nullable();

            $table->foreignIdFor(ComponentType::class);
            $table->foreignIdFor(ComponentData::class)->cascadeOnDelete()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};
