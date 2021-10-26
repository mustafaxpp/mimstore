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
            $table->string('name');
            $table->string('details');
            $table->string('mobile');
            $table->string('address');
            $table->string('shippind_price');
            $table->string('phone')->nullable();
            $table->decimal("order_price")->nullable();
            $table->enum("status",["pendding" , "canceled" , "accepted","delivered"])->default("pendding");
            $table->foreignId("created_by")->nullable()->constrained("users");
            $table->foreignId("last_updated_by")->nullable()->constrained("users");
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
