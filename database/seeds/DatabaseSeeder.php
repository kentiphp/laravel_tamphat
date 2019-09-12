<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(CreateSupplierTableSeeder::class);
        $this->call(CreateCommodityTableSeeder::class);
        $this->call(CreaeteCustomerTableSeeder::class);
    }
}
