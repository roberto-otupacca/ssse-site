<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkPagePivotTable extends Migration
{
    public function up()
    {
        Schema::create('link_page', function (Blueprint $table) {
            $table->unsignedBigInteger('link_id');
            $table->foreign('link_id', 'link_id_fk_3213075')->references('id')->on('links')->onDelete('cascade');
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id', 'page_id_fk_3213075')->references('id')->on('pages')->onDelete('cascade');
        });
    }
}
