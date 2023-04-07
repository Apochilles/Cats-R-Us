<?php

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
        echo "it does something";
        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->string('description');
            $table->string('breed');
            $table->unsignedSmallInteger('fee');
            $table->enum('temperament', ['shy', 'average', 'confident']);
            $table->enum('size', ['small', 'medium', 'large']);
            $table->enum('fur', ['short', 'long']);
            $table->enum('desexed', ['yes', 'no']);
            $table->enum('vaccinated', ['yes', 'no']);
            $table->enum('wormed', ['yes', 'no']);
            $table->enum('fiv', ['positive', 'negative']);
            $table->enum('gender', ['male', 'female']);
            $table->enum('status', ['available', 'adopted']);
            $table->string('adopted_by')->nullable();
            $table->date('age');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cats');
    }
};
