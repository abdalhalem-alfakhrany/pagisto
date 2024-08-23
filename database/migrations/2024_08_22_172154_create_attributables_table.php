<?php

use App\Models\Attribute;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attributables', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('attributables_id');
            $table->string('attributables_type');

            $table->foreignIdFor(Attribute::class);
            $table->string('value');

            $table->unique(['attributables_id', 'attributables_type', 'attribute_id'], 'attributes_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributables');
    }
};
