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
        Schema::create('soudans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->date('soudan_date');
            $table->string('y_name');
            $table->string('y_address');
            $table->string('field');
            $table->text('summary');
            $table->text('question');
            $table->string('jiken_name')->nullable();
            $table->string('jiken_type')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('agent_address')->nullable();
            $table->text('memo')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('soudans');
    }
};
