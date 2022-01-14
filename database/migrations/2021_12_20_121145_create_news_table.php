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
            $table->integer("no")->unique();
            $table->longText("content")->unique();
            $table->integer("author");
            $table->integer("category");
            $table->integer("resource_platform");
            $table->integer("resource_url")->unique();
            $table->integer("publish_date");
            $table->integer("write_time")->default(time()); // XRAY_TEST
            $table->integer("listing")->default(0); // XRAY_TEST
            $table->integer("reading")->default(0); // XRAY_TEST
            $table->longText("link_url")->unique();
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
