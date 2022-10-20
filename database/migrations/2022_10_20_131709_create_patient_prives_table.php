<?php

use App\Models\Fiche;
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
        Schema::create('patient_prives', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->enum('gender',['M','F'])->default('M');
            $table->date('date_of_birth')->nullable();
            $table->string('phone')->nullable();
            $table->string('commune')->nullable();
            $table->string('quartier')->nullable();
            $table->string('numero')->nullable();
            $table->boolean('is_prodeo')->default(false);
            $table->foreignIdFor(Fiche::class)->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_prives');
    }
};
