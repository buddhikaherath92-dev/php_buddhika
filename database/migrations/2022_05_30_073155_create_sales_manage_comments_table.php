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
        Schema::create('sales_manager_comments', function (Blueprint $table) {
            $table->id();
            $table->longText('comment');
            $table->foreignId('commentor_id')->constrained('users');
            $table->foreignId('sales_representative_id')->constrained('sales_representatives');
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
        Schema::dropIfExists('sales_manager_comments');
    }
};
