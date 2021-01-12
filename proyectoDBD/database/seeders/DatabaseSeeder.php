<?php

namespace Database\Seeders;

use \App\Models\Cantidad;
use \App\Models\Comprobante;
use \App\Models\Comuna;
use \App\Models\Direccion;
use \App\Models\Feria;
use \App\Models\Metodo_de_pago;
use \App\Models\Permiso;
use \App\Models\Proceso_compra;
use \App\Models\Proceso_despacho;
use \App\Models\Proceso_pago;
use \App\Models\Producto;
use \App\Models\Puesto;
use \App\Models\Puesto_producto;
use \App\Models\Region;
use \App\Models\Rol;
use \App\Models\Transaccion;
use \App\Models\Transaccion_comprobante;
use \App\Models\Transaccion_producto;
use \App\Models\Transaccion_user;
use \App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	User::factory(5)->create();
    	Region::factory(5)->create();
    	Comuna::factory(5)->create();
    	Direccion::factory(5)->create();
    	Feria::factory(5)->create();
    	Comprobante::factory(5)->create();
    	Transaccion::factory(5)->create();
    	Metodo_de_pago::factory(5)->create();
    	Proceso_pago::factory(5)->create();
    	Proceso_despacho::factory(5)->create();
    	Proceso_compra::factory(5)->create();
    	Cantidad::factory(5)->create();
    	Producto::factory(5)->create();
    	Rol::factory(5)->create();
    	Permiso::factory(5)->create();
    	Puesto::factory(5)->create();
    	Transaccion_producto::factory(5)->create();
    	Transaccion_user::factory(5)->create();
    	Transaccion_comprobante::factory(5)->create();
    	Puesto_producto::factory(5)->create();
    	
    }
}
