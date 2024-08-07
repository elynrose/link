<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrCodesTable extends Migration
{
    public function up()
    {
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('color')->nullable();
            $table->integer('size')->nullable();
            $table->string('bg_color')->nullable();
            $table->string('style')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
