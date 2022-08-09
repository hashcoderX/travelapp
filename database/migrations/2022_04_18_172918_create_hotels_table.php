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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->integer("state_id");
            $table->string("hotelname",255);
            $table->text("description");
            $table->string("telephone_number",12);
            $table->text("address");
            $table->text("img_one_url");
            $table->text("img_two_url");
            $table->text("img_three_url");
            $table->text("img_four_url");
            $table->text("img_cover_url");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};
