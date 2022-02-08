<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perusahaan_id');
            $table->foreignId('perihal_id');
            $table->foreignId('user_id');
            $table->string('subjek', 128);
            $table->string('slug', 128)->unique();
            $table->text('body');
            $table->string('image')->nullable();
            $table->string('status', 8)->default('Pending');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('perusahaan_id')->references('id')->on('perusahaans')->onDelete('cascade');
            $table->foreign('perihal_id')->references('id')->on('perihals')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
}
