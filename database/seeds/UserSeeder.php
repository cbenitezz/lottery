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
            "name"        => 'Green Digital',
            "email"       => 'info@armeniadigital.com',
            "password"    => bcrypt('Carlos62$'),


        ])->assignRole('admin');

        Profile::create([

            "name"    => 'Green Digital',
            "user_id" =>  $user->id,
            "identification_card" =>"0"

        ]);

        // Seeder para 10 Usuarios
        // factory(User::class, 10)->create()->each(function ($user) {
        //    $user->assignRole('usuario');
        //});

    }
}
