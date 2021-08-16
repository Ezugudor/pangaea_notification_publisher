<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->unique();
            $table->unsignedBigInteger('topic_id');
            $table->unsignedBigInteger('subscriber_id');
            $table->timestamps();
            $table->softDeletes();



            // indexing
            $table->index(['topic_id', 'subscriber_id']);

            // relations
            $table->foreign('topic_id')
                ->references('id')
                ->on('topics')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('subscriber_id')
                ->references('id')
                ->on('subscribers')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
