<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileNewsPivotTable extends Migration
{
    public function up()
    {
        Schema::create('file_news', function (Blueprint $table) {
            $table->unsignedBigInteger('file_id');
            $table->foreign('file_id', 'file_id_fk_3218735')->references('id')->on('files')->onDelete('cascade');
            $table->unsignedBigInteger('news_id');
            $table->foreign('news_id', 'news_id_fk_3218735')->references('id')->on('news')->onDelete('cascade');
        });
    }
}
