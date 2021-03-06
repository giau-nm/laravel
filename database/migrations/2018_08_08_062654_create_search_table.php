<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('searchs')) {
            Schema::create('searchs', function (Blueprint $table) {
                $table->increments('id');
                $table->string('user_id', 250);
                $table->string('search_str');
                $table->string('ip', 50);
                $table->string('user_agent', 250);
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('searchs');
    }
}
