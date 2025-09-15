<?php

use App\Enums\LendStatusEnum;
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
        Schema::create('lends', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('person_id');
            $table->dateTime('loan_date');
            $table->dateTime('expected_return_date');
            $table->dateTime('returne_date')->nullable();
            $table->enum('status', LendStatusEnum::getValues());
            $table->text('description');
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('person_id')->references('id')->on('persons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lends');
    }
};
