<?php
// database/migrations/YYYY_MM_DD_create_bids_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidsTable extends Migration
{
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained(); // Foreign key to jobs table
            $table->foreignId('freelancer_id')->constrained('freelancers'); 
            $table->text('proposal');
            $table->string('portfolio')->nullable();
            $table->string('status')->default('active'); 
            // Add more bid fields as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bids');
    }
}

