<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('short_description');
            $table->longText('description');
            $table->decimal('value', 15, 2);
            $table->decimal('paid', 15, 2)->nullable();
            $table->decimal('remain', 15, 2)->nullable();
            $table->integer('donors')->nullable();
            $table->string('youtube')->nullable();
            $table->string('reference');
            $table->string('beneficiary');
            $table->boolean('hide')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
