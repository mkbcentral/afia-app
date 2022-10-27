<?php

use App\Models\Abonnement;
use App\Models\Fiche;
use App\Models\User;
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
        Schema::create('patient_abonnes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->enum('gender',['M','F'])->default('M');
            $table->date('date_of_birth')->nullable();
            $table->string('phone')->nullable();
            $table->string('commune')->nullable();
            $table->string('quartier')->nullable();
            $table->string('avenue')->nullable();
            $table->string('numero')->nullable();
            $table->string('type')->nullable();
            $table->foreignIdFor(Fiche::class)->nullable()->constrained();
            $table->foreignIdFor(Abonnement::class)->nullable()->constrained();
            $table->foreignIdFor(User::class)->nullable()->constrained();
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
        Schema::dropIfExists('patient_abonnes');
    }
};
