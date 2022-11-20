<?php

use App\Models\ExamenLabo;
use App\Models\FacturePrive;
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
        Schema::create('examen_labo_facture_prive', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ExamenLabo::class)->constrained();
            $table->foreignIdFor(FacturePrive::class)->constrained();
            $table->integer('qty')->default(1);
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
        Schema::dropIfExists('examen_labo_facture_prive');
    }
};
