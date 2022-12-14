<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(){
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->integer("quantity");
            $table->decimal("price");
            $table->decimal("discount");

            // Llaves foraneas
            $table->unsignedBigInteger('sale_id');
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('sale_details');
    }
};
