<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtues', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('knight_virtue', function (Blueprint $table) {
            $table->id();
            $table->foreignId('knight_id')->constrained('knights')->onDelete('cascade');
            $table->foreignId('virtue_id')->constrained('virtues')->onDelete('cascade');
            $table->unique(['knight_id', 'virtue_id']);
            $table->unsignedTinyInteger('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('virtues');
        Schema::dropIfExists('knight_virtue');
        Schema::enableForeignKeyConstraints();
    }
};
