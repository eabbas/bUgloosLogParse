<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loninfo', function (Blueprint $table) {
            $table->increments('id');
            $table->string("service_name")->index();
            $table->string("status_code")->index();
            $table->string("route_name");
            $table->string("method_type");
            $table->string("loged_date")->index();
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
        Schema::dropIfExists('loninfo');
    }
};
