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
        Schema::create('musians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('profile_picture')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('instrument');
            $table->text('biography')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musians');
    }
};
