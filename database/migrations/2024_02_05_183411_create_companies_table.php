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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('unique_reference')->unique()->nullable();
            $table->string('name')->nullable();
            $table->text('domain')->nullable();
            $table->date('year_founded')->nullable();
            $table->string('industry')->nullable();
            $table->string('size_range')->nullable();
            $table->string('locality')->nullable();
            $table->string('country')->nullable();
            $table->text('linkedin_url')->nullable();
            $table->text('current_employee_estimate')->nullable();
            $table->text('total_employee_estimate')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('unique_reference');
            $table->index('name');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
