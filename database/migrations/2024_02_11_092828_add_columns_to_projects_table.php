<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('job_id')->constrained(); // Assuming a foreign key relationship with jobs table
            $table->foreignId('freelancer_id')->constrained(); // Assuming a foreign key relationship with freelancers table
            $table->text('bid_proposal');
            $table->text('freelancer_portfolio');
            $table->string('project_owner');
            $table->decimal('budget', 10, 2);
            $table->string('timeline');
            $table->string('status')->default('in-progress'); // or any default status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['job_id']);
            $table->dropForeign(['freelancer_id']);
            $table->dropColumn([
                'job_id',
                'freelancer_id',
                'bid_proposal',
                'freelancer_portfolio',
                'project_owner',
                'budget',
                'timeline',
                'status',
            ]);
        });
    }
};
