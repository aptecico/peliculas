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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
        $table->integer('duracion')->comment('Duration in minutes');
        $table->foreignId('genero_id')->constrained('generos')->onUpdate('cascade')->onDelete('restrict');
        $table->foreignId('clasificacion_id')->constrained('clasificaciones')->onUpdate('cascade')->onDelete('restrict');
        $table->year('anio');
        $table->string('ruta',200)->nullable();
        $table->string('youtube_enlace',200)->nullable();
        $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
