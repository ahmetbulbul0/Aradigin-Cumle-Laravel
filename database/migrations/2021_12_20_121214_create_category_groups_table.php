<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_groups', function (Blueprint $table) {
            $table->id();
            $table->integer("no");
            $table->integer("main");
            $table->integer("sub1")->nullable();
            $table->integer("sub2")->nullable();
            $table->integer("sub3")->nullable();
            $table->integer("sub4")->nullable();
            $table->integer("sub5")->nullable();
            $table->integer("link_url");
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
        Schema::dropIfExists('category_groups');
    }
}
