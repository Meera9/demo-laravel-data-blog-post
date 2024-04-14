<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    : void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->string('title')->unique();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    : void
    {
        Schema::dropIfExists('categories');
    }
};
