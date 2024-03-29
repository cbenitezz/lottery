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
        $roleUsuario    = Role::create(['name' => 'cajero']);
        /** El rol admin y usuario no se pueden eliminar o modificar para garantizar la creación de nuevos usuarios
         * y administración de la plataforma
         */
        $roleDigitador  = Role::create(['name' => 'cliente']);
        $roleSistemas   = Role::create(['name' => 'vendedor']);

        /* Permisos Lottery*/
        $permission = Permission::create(['name'=>'lottery.index'])
                    ->syncRoles([$roleAdmin,$roleUsuario]);

        $permission = Permission::create(['name'=>'lottery.boleteria',])
                    ->syncRoles([$roleAdmin,$roleUsuario]);

        $permission = Permission::create(['name'=>'ticket.asignar'])
                    ->syncRoles([$roleAdmin,$roleUsuario]);

        $permission = Permission::create(['name'=>'lottery.create'])
                    ->syncRoles([$roleAdmin]);

        $permission = Permission::create(['name'=>'user.index',])
                    ->syncRoles([$roleAdmin]);

        $permission = Permission::create(['name'=>'user.create'])
                    ->syncRoles([$roleAdmin]);

        $permission = Permission::create(['name'=>'customer.index'])
                    ->syncRoles([$roleAdmin,$roleSistemas,$roleUsuario]);

        $permission = Permission::create(['name'=>'customer.store'])
                    ->syncRoles([$roleAdmin,$roleSistemas,$roleUsuario]);

        $permission = Permission::create(['name'=>'customer.update'])
                    ->syncRoles([$roleAdmin,$roleSistemas,$roleUsuario]);

        $permission = Permission::create(['name'=>'customer.edit'])
                    ->syncRoles([$roleAdmin,$roleSistemas,$roleUsuario]);

        $permission = Permission::create(['name'=>'payment.index'])
                    ->syncRoles([$roleAdmin,$roleUsuario]);
    }
}
