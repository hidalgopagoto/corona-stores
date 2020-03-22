<?php

use Illuminate\Database\Seeder;

class ShippingsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $now = (new \DateTime())->format('Y-m-d H:i:s');
        DB::table('shippings')->insert([
            [
                'name'  => 'Correios',
                'description' => 'Entrega via Correios',
                'enabled' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name'  => 'Entrega local',
                'description' => 'Entrega via Motoboy, Loggi, Uber, etc (restrito a algumas regiões)',
                'enabled' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
    }
}
