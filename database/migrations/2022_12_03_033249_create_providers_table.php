<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(){
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("email");
            $table->string("ruc_name");
            $table->string("address")->nullable();
            $table->string("phone");
            $table->string("timestamps");
        });
    }
    public function down(){
        Schema::dropIfExists('providers');
    }
};
