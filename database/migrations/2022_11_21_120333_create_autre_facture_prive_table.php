<?php

use App\Models\Autre;
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
        Schema::create('autre_facture_prive', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Autre::class)->constrained();
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
        Schema::dropIfExists('autre_facture_prive');
    }
};
