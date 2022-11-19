<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = Customer::create([
            'seller_id'           => '1',
            'identification_card' => '1',
            "name"                => 'Cliente-Admin',
            'last_name'           => 'Estrategias Michu',
            "email"               => 'info@lottery.co',
            'address'             => 'Tebaida',
            'sector'              => 'Quindio',
            'phone'               => '300 0000000',
            'status'              => '1',


        ]);

    }
}
