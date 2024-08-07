<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPagesTable extends Migration
{
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->unsignedBigInteger('link_id')->nullable();
            $table->foreign('link_id', 'link_fk_10001646')->references('id')->on('links');
            $table->unsignedBigInteger('template_id')->nullable();
            $table->foreign('template_id', 'template_fk_10002006')->references('id')->on('templates');
        });
    }
}
