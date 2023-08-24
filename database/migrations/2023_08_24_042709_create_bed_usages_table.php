<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bed_usages', function (Blueprint $table) {
            $table->id('bed_usage_id');
            $table->unsignedBigInteger('bed_id');
            $table->foreign('bed_id')->references('bed_id')->on('beds')->onUpdate('cascade')->onDelete('cascade');
            $table->datetime('start_time');
            $table->datetime('finish_time');
            $table->integer('service_time');
            $table->string('additional_information');
            $table->unsignedBigInteger('uploaded_by');
            $table->foreign('uploaded_by')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bed_usages');
    }
};
