<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryGroupUrls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_group_urls', function (Blueprint $table) {
            $table->id();
            $table->integer("no")->unique();
            $table->integer("group_no")->unique();
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
        Schema::dropIfExists('category_group_urls');
    }
}
