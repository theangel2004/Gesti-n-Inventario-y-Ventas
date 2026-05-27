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
    Schema::create('productos', function (Blueprint $table) {
        $table->id();
        $table->string('codigo_barras')->unique();
        $table->string('nombre');
        $table->text('descripcion')->nullable();
        $table->decimal('precio_venta', 10, 2);
        $table->integer('stock_actual');
        $table->integer('stock_minimo');
        $table->string('unidad_medida'); // Caja, Unidad, Bulto
        $table->foreignId('proveedor_id')->constrained('proveedores')->onDelete('cascade');
        // Llave foránea hacia categorías
        $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
