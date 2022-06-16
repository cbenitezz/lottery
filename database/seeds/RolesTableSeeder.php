<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Roles del Sistema*/
        $roleAdmin      = Role::create(['name' => 'admin']);
        $roleUsuario    = Role::create(['name' => 'usuario']);
        /** El rol admin y usuario no se pueden eliminar o modificar para garantizar la creación de nuevos usuarios
         * y administración de la plataforma
         */
        $roleDigitador  = Role::create(['name' => 'cliente']);
        $roleSistemas   = Role::create(['name' => 'vendedor']);
    }
}
