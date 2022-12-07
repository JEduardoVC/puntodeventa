<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(){
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->dateTime("purchase_date");
            $table->decimal("tax");
            $table->decimal("total");
            $table->enum("status",["VALID","CANCELED"])->default("VALID");
            $table->string("picture")->nullable();

            // Llaves foraneas
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('provider_id');
            $table->foreign('provider_id')->references('id')->on('providers');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('purchases');
    }
};
