<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilePagePivotTable extends Migration
{
    public function up()
    {
        Schema::create('file_page', function (Blueprint $table) {
            $table->unsignedBigInteger('file_id');
            $table->foreign('file_id', 'file_id_fk_3213074')->references('id')->on('files')->onDelete('cascade');
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id', 'page_id_fk_3213074')->references('id')->on('pages')->onDelete('cascade');
        });
    }
}
