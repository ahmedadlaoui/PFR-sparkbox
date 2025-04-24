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
        Schema::create('startups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->text('details');
            $table->enum('category', [
                'Technology & Innovation',
                'Health & Wellness',
                'Sustainability & GreenTech',
                'Education & Learning',
                'Finance & Fintech',
                'Lifestyle & Consumer Goods',
            ]);
            $table->string('website');
            $table->string('logo');
            $table->string('cover');
            $table->integer('funding_goal');
            $table->float('valuation');
            $table->float('monthly_revenue');
            $table->integer('gross_margin');
            $table->integer('burn_rate');
            $table->integer('runway');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
