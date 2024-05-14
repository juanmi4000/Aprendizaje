<?php
/* Aquí creamos las tablas de la base de datos */
/* php artisan migrate => Nos ejecuta todas las migraciones de la carpeta de base de datos */
/* php artisan make:controller nombre-controlador => Crea un controlador para la tabla del nombre dicho */
/* php artisan migrate:status  */

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
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
