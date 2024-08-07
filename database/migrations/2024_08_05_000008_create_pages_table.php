<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page_title');
            $table->string('keywords')->nullable();
            $table->string('description');
            $table->longText('body')->nullable();
            $table->string('footer')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
