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
            "identification_card" =>"1"

        ]);

        /* ----------------  Cajero por defecto -----------*/
        $user = User::create([
            "name"        => 'Cajero',
            "email"       => 'cajero@estrategiasmichu.com',
            "password"    => bcrypt('Password$2022'),

        ])->assignRole('cajero');

        Profile::create([

            "name"    => 'Cajero',
            "user_id" =>  $user->id,
            "identification_card" =>"2"

        ]);
        /* -----*/




        /* ----------------  Cajero 1 -----------*/
        $user = User::create([
            "name"        => 'Diana',
            "email"       => 'diana@estrategiasmichu.com',
            "password"    => bcrypt('Password$2022'),

        ])->assignRole('cajero');

        Profile::create([

            "name"    => 'Diana',
            "user_id" =>  $user->id,
            "identification_card" =>"3"

        ]);
        /* ----*/


        /* ----------------  Cajero 2 -----------*/
        $user = User::create([
            "name"        => 'Erika',
            "email"       => 'erika@estrategiasmichu.com',
            "password"    => bcrypt('Password$2022'),

        ])->assignRole('cajero');

        Profile::create([

            "name"    => 'Erika',
            "user_id" =>  $user->id,
            "identification_card" =>"4"

        ]);
        /* ----*/

        /* ----------------  Cajero 3 -----------*/
        $user = User::create([
            "name"        => 'Gerencia',
            "email"       => 'gerencia@estrategiasmichu.com',
            "password"    => bcrypt('Password$2022'),

        ])->assignRole('cajero');

        Profile::create([

            "name"    => 'Gerencia',
            "user_id" =>  $user->id,
            "identification_card" =>"5"

        ]);
        /* ----*/

        /* ----------------  Cajero 4 -----------*/
        $user = User::create([
            "name"        => 'Kenny',
            "email"       => 'kenny@estrategiasmichu.com',
            "password"    => bcrypt('Password$2022'),

        ])->assignRole('cajero');

        Profile::create([

            "name"    => 'Kenny',
            "user_id" =>  $user->id,
            "identification_card" =>"6"

        ]);
        /* ----*/

        /* ----------------  Cajero 5 -----------*/
        $user = User::create([
            "name"        => 'Maria José',
            "email"       => 'mariajose@estrategiasmichu.com',
            "password"    => bcrypt('Password$2022'),

        ])->assignRole('cajero');

        Profile::create([

            "name"    => 'Maria José',
            "user_id" =>  $user->id,
            "identification_card" =>"7"

        ]);
        /* ----*/

        /* ----------------  Cajero 6 -----------*/
        $user = User::create([
            "name"        => 'Richard',
            "email"       => 'richard@estrategiasmichu.com',
            "password"    => bcrypt('Password$2022'),

        ])->assignRole('cajero');

        Profile::create([

            "name"    => 'Richard',
            "user_id" =>  $user->id,
            "identification_card" =>"8"

        ]);
        /* ----*/

        /* ----------------  Cajero 7 -----------*/
        $user = User::create([
            "name"        => 'Rosalba',
            "email"       => 'rosalba@estrategiasmichu.com',
            "password"    => bcrypt('Password$2022'),

        ])->assignRole('cajero');

        Profile::create([

            "name"    => 'Rosalba',
            "user_id" =>  $user->id,
            "identification_card" =>"9"

        ]);
        /* ----*/

        // Seeder para 10 Usuarios
        // factory(User::class, 10)->create()->each(function ($user) {
        //    $user->assignRole('usuario');
        //});

    }
}
