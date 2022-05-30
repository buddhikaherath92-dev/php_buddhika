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
        Schema::create('sales_representatives', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('telephone', 11);
            $table->date('joined_at');
            $table->foreignId('sales_route_id')->constrained('sales_routes');
            $table->foreignId('sales_manager_id')->constrained('users');
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
        Schema::dropIfExists('sales_representatives');
    }
};
