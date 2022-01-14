<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_urls', function (Blueprint $table) {
            $table->id();
            $table->integer("no")->unique();
            $table->integer("news_no")->unique();
            $table->integer("resource_platform");
            $table->longText("url")->unique();
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
        Schema::dropIfExists('resource_urls');
    }
}
