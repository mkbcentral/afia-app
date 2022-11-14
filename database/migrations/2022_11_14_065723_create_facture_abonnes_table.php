<?php

use App\Models\PatientAbonne;
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
        Schema::create('facture_abonnes', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->foreignIdFor(PatientAbonne::class)->constrained();
            $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->boolean('is_printed')->default(false);
            $table->boolean('is_valited')->default(false);
            $table->boolean('is_completed')->default(false);
            $table->boolean('is_bon')->default(false);
            $table->boolean('is_interneted')->default(false);
            $table->boolean('is_livred')->default(false);
            $table->boolean('is_healed')->default(false);
            $table->boolean('is_dead')->default(false);
            $table->string('month')->nullable();
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
        Schema::dropIfExists('facture_abonnes');
    }
};
