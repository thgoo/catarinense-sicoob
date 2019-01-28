<?php

use Illuminate\Database\Seeder;

class RoundsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 18; $i++) {
            DB::table('rounds')->insert([
                [
                    'number' => $i + 1,
                    'name' => 'Rodada ' . ($i + 1),
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]
            ]);
        }
    }
}
