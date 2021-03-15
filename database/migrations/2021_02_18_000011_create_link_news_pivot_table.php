<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkNewsPivotTable extends Migration
{
    public function up()
    {
        Schema::create('link_news', function (Blueprint $table) {
            $table->unsignedBigInteger('link_id');
            $table->foreign('link_id', 'link_id_fk_3218736')->references('id')->on('links')->onDelete('cascade');
            $table->unsignedBigInteger('news_id');
            $table->foreign('news_id', 'news_id_fk_3218736')->references('id')->on('news')->onDelete('cascade');
        });
    }
}
