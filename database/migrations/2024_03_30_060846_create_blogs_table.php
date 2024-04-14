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
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->string("title");
            $table->string("slug");
            $table->longText("description")->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    : void
    {
        Schema::dropIfExists('blogs');
    }
};
