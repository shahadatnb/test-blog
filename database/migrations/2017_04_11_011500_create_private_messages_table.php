<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_id')->unsignsd();
            $table->integer('receiver_id')->unsignsd();
            $table->string('subject');
            $table->text('message');
            $table->boolean('read');
            $table->timestamps();

            $table->index('sender_id');
            $table->index('receiver_id');
            $table->index('sender_id','read');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('private_messages');
    }
}
