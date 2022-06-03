<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('donation_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->boolean('special')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
