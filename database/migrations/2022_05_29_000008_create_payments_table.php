<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount', 15, 2);
            $table->string('purpose')->nullable();
            $table->string('donor')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('payment_method')->nullable();
            $table->boolean('show_my_name')->default(0)->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
