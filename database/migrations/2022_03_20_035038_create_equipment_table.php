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
        Schema::create('equipment', function (Blueprint $table) {
            $table->uuid('id')->index();
            $table->string('name', 128);
            $table->enum('category', ['Desktop', 'Phone', 'Laptop', 'Tablet']);
            $table->json('specifications');
            $table->json('notes');
            $table->foreignUuid('purchase_uuid')->default('')->references('id')->on('purchases')->onDelete('cascade');
            $table->foreignUuid('manufacturer_uuid')->default('')->references('id')->on('manufacturers')->onDelete('cascade');
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
        Schema::dropIfExists('equipment');
    }
};