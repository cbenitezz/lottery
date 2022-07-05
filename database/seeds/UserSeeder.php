<?php
use App\Profile;
use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "name"        => 'Administrador',
            "email"       => 'info@lottery.co',
            "password"    => bcrypt('Carlos62$'),


        ])->assignRole('admin');

        Profile::create([

            "name"    => 'Administrador',
            "user_id" =>  $user->id,
            "identification_card" =>"0"

        ]);

        // Seeder para 10 Usuarios
        // factory(User::class, 10)->create()->each(function ($user) {
        //    $user->assignRole('usuario');
        //});

    }
}
