<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('pname');
            $table->integer('price');
            $table->string('bandwith')->nullable();
            $table->string('ytbandwith')->nullable();
            $table->string('ftp')->nullable();
            $table->tinyInteger('status')
                    ->default(1)
                    ->comment('0=inactive|1=active');
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
        Schema::dropIfExists('packages');
    }
}
