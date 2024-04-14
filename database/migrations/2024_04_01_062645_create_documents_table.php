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
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId("author_id")->constrained('users');
            $table->string("title");
            $table->string('name')->nullable();
            $table->string('disk')->nullable();
            $table->string('path')->nullable();
            $table->string('filename')->nullable();
            $table->string('mimetype')->nullable();
            $table->string('size')->nullable();
            $table->string('header')->nullable();
            $table->string('dummy_name')->nullable();
            $table->string('extension')->nullable();
            $table->string('system_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    : void
    {
        Schema::dropIfExists('documents');
    }
};
