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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->double('lat');
            $table->double('long');
            $table->date('initial_date');
            $table->date('expirationdate')->nullable();
            $table->boolean('expire')->default(false);
            $table->integer('user_id');
            $table->timestamps();
        });

        // Set expirationdate column value based on initial_date + 1 year
        \Illuminate\Support\Facades\DB::statement('UPDATE customers SET expirationdate = DATE_ADD(initial_date, INTERVAL 1 YEAR)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
