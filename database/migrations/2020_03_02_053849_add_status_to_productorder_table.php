<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToProductorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productorder', function (Blueprint $table) {
            $table->tinyInteger('status')
            ->default(0)
            ->comment('0=inactive|1=active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productorder', function (Blueprint $table) {
            //
        });
    }
}
