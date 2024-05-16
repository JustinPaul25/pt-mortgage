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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('deal_id')->nullable();
            $table->string('deal_name')->nullable();
            $table->decimal('deal_value',15,3)->nullable();
            $table->string('lender')->nullable();
            $table->string('deal_owner')->nullable();
            $table->string('labels')->nullable();
            $table->dateTime('date_new_lead')->nullable();
            $table->string('first_home_buyer')->nullable();
            $table->string('referrer')->nullable();
            $table->string('owner_status')->nullable();
            $table->string('out_status')->nullable();
            $table->date('date_submitted')->nullable();
            $table->date('date_conditional')->nullable();
            $table->date('date_formal')->nullable();
            $table->date('date_settled')->nullable();
            $table->date('date_paid')->nullable();
            $table->date('date_lost')->nullable();
            $table->string('current_stage')->nullable();
            $table->string('employment_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
