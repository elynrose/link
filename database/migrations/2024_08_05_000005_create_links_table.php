<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('destination');
            $table->string('title');
            $table->boolean('add_utm')->default(0)->nullable();
            $table->string('type');
            $table->string('custom_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
