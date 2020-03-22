<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
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

        DB::table('settings')->insert([
            [
                'name'  =>  'nome',
                'description' => 'Título do site',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'descricao',
                'description' => 'Breve descrição do site',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'telefone_1',
                'description' => 'Telefone principal',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'telefone_2',
                'description' => 'Telefone secundário',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'whatsapp',
                'description' => 'Whatsapp',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'email',
                'description' => 'E-mail',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'cep',
                'description' => 'CEP de origem para entregas',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
    }
}
