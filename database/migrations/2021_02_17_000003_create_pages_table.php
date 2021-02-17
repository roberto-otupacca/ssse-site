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
            $table->string('title')->unique();
            $table->longText('text')->nullable();
            $table->boolean('menu_top')->default(0)->nullable();
            $table->boolean('menu_right')->default(0)->nullable();
            $table->integer('display_order');
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
