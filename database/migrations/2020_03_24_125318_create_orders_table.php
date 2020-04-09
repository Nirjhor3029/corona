<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mobile');

            $table->unsignedBigInteger('service_type_id');
            $table->foreign('service_type_id')->references('id')->on('service_types');
            // $table->unsignedBigInteger('area_id');
            // $table->foreign('area_id')->references('id')->on('areas');
            $table->unsignedBigInteger('supllier_id');
            $table->foreign('supllier_id')->references('id')->on('suppliers');
            $table->unsignedBigInteger('orderstatus_id');
            $table->foreign('orderstatus_id')->references('id')->on('orderstatuses');

            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazilla_id')->nullable();
            $table->integer('union_id')->nullable();

            $table->string('remarks')->nullable();
            $table->double('amount')->default(0);

            $table->dateTime('date_time')->nullable();
            $table->softDeletes();

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
        Schema::dropIfExists('orders');
    }
}
