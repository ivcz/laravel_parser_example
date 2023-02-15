<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogposts_stored', function (Blueprint $table) {
            $table->id();
            $table->longText('text');
            $table->string('title');
            $table->integer('post_id');
            $table->timestamp('post_date');
            $table->timestamp('last_parse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogposts_stored');
    }
};
