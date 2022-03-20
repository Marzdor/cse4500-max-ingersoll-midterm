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
        Schema::create('inventories', function (Blueprint $table) {
            $table->uuid('id')->index();
            $table->string('name', 128);
            $table->enum('category', ['Desktop', 'Phone', 'Laptop']);
            $table->foreignUuid('purchase_uuid')->default('')->references('id')->on('purchases')->onDelete('cascade');
            $table->foreignUuid('manufacture_uuid')->default('')->references('id')->on('manufactures')->onDelete('cascade');
            $table->foreignUuid('user_uuid')->default('')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('inventories');
    }
};
