<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcePlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_platforms', function (Blueprint $table) {
            $table->id();
            $table->integer("no")->unique();
            $table->string("name")->unique();
            $table->string("main_url")->unique();
            $table->string("link_url")->unique();
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
        Schema::dropIfExists('resources');
    }
}
