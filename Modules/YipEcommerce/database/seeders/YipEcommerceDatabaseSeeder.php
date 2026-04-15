<?php

namespace Modules\YipEcommerce\Database\Seeders;

use Illuminate\Database\Seeder;

class YipEcommerceDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $this->call(ProductSeeder::class);
    }
}
