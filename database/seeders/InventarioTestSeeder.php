<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarioTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Insertar Categorías de prueba tal cual tu migración
        DB::table('categorias')->insert([
            ['nombre' => 'Limpieza', 'descripcion' => 'Productos de aseo y desinfección', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Bebidas', 'descripcion' => 'Refrescos, licores y aguas', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Alimentos', 'descripcion' => 'Abarrotes y productos secos', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 2. Insertar Proveedores de prueba tal cual tu migración
        DB::table('proveedores')->insert([
            ['nombre' => 'Distribuidora Colombiana S.A.', 'contacto_nombre' => 'Carlos Mendoza', 'telefono' => '3001234567', 'email' => 'ventas@districol.com', 'direccion' => 'Calle 45 #22-10', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Proveedor Global Ltda', 'contacto_nombre' => 'María Duarte', 'telefono' => '3159876543', 'email' => 'contacto@global.com', 'direccion' => 'Carrera 10 #5-40', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}