<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->float('transaction_value');
            $table->unsignedBigInteger('credit_card_id');
            $table->foreign('credit_card_id')
                ->references('id')
                ->on('credit_cards')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('user_from_id');
            $table->foreign('user_from_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('user_to_id');
            $table->foreign('user_to_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
