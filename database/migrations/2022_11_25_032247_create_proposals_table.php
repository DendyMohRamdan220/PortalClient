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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('proposal_name');
            $table->enum('leads_name', ['Annisa Zachry Fauziah', 'John Doe', 'Dendy Moh Ramdan']);
            $table->date ('valid_till');
            $table->enum('currency', ['USD ($)', 'IDR (Rp)', 'GBP (£)', 'EUR (€)']);
            $table->enum('select_product', ['Jasa', 'Elektronik']);
            $table->double('quantity');
            $table->double('unit_price');
            $table->double('amount');
            $table->double('total');

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
        Schema::dropIfExists('proposals');
    }
};