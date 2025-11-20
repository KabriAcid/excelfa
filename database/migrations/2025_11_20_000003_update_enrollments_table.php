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
        Schema::table('enrollments', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('nickname')->nullable();
            $table->integer('age')->nullable();
            $table->integer('dob_day')->nullable();
            $table->integer('dob_month')->nullable();
            $table->integer('dob_year')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('complexion')->nullable();
            $table->string('lga')->nullable();
            $table->string('state_of_origin')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('religion')->nullable();
            $table->string('tribe')->nullable();
            $table->string('jersey_preference')->nullable();
            $table->string('role_model')->nullable();
            $table->string('favourite_league')->nullable();
            $table->string('favourite_team')->nullable();
            $table->string('favourite_food')->nullable();
            $table->string('hobby')->nullable();
            $table->boolean('agreed_to_terms')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropColumn([
                'first_name', 'middle_name', 'surname', 'nickname', 'age',
                'dob_day', 'dob_month', 'dob_year', 'height', 'weight',
                'complexion', 'lga', 'state_of_origin', 'country', 'region',
                'religion', 'tribe', 'jersey_preference', 'role_model',
                'favourite_league', 'favourite_team', 'favourite_food', 'hobby',
                'agreed_to_terms'
            ]);
        });
    }
};