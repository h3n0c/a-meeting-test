<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(\App\Invoice::class, 50)->create()->each(function ($invoice){
            factory(\App\InvoiceLine::class, rand(1,10))->create([
                'invoice_id' => $invoice->id
            ]);
        });

        Model::reguard();
    }
}
