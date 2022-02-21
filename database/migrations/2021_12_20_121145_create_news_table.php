<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->integer("no");
            $table->longText("content");
            $table->integer("author");
            $table->integer("category");
            $table->integer("resource_platform");
            $table->integer("resource_url");
            $table->integer("publish_date");
            $table->integer("write_time");
            $table->integer("listing");
            $table->integer("reading");
            $table->longText("link_url");
            $table->boolean("is_deleted")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
