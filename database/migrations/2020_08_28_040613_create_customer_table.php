<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customerInfo', function (Blueprint $table) {
            $table-> increments('id');
            $table-> string('customerName');
            $table-> string('address');
            $table-> string('organization');
            $table-> string('email');
            $table-> string('mobile');
            $table-> string('image');
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
        Schema::dropIfExists('customerInfo');
    }
}
