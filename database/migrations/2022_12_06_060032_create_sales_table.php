<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(){
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->dateTime("sale_date");
            $table->decimal("tax");
            $table->decimal("total");
            $table->enum("status",["VALID","CANCELED"])->default("VALID");

            // Llaves foraneas
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('sales');
    }
};
