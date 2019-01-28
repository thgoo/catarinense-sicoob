<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            [
                'id' => 288,
                'short_name' => 'CRI',
                'name' => 'Criciúma',
                'image' => 'https://s.glbimg.com/es/sde/f/equipes/2018/03/11/criciuma.svg',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ], [
                'id' => 314,
                'short_name' => 'AVA',
                'name' => 'Avaí',
                'image' => 'https://s.glbimg.com/es/sde/f/organizacoes/2018/09/04/avai-futebol-clube.svg',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ], [
                'id' => 315,
                'short_name' => 'CHA',
                'name' => 'Chapecoense',
                'image' => 'https://s.glbimg.com/es/sde/f/equipes/2018/03/12/chapecoense.svg',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ], [
                'id' => 316,
                'short_name' => 'FIG',
                'name' => 'Figueirense',
                'image' => 'https://s.glbimg.com/es/sde/f/equipes/2018/03/11/figueirense.svg',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ], [
                'id' => 317,
                'short_name' => 'JEC',
                'name' => 'Joinville',
                'image' => 'https://s.glbimg.com/es/sde/f/equipes/2015/07/20/Joinville65.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ], [
                'id' => 1297,
                'short_name' => 'BRU',
                'name' => 'Brusque',
                'image' => 'https://s.glbimg.com/es/sde/f/organizacoes/2017/03/28/Brusque-65.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ], [
                'id' => 2586,
                'short_name' => 'MET',
                'name' => 'Metropolitano',
                'image' => 'https://s.glbimg.com/es/sde/f/organizacoes/2015/02/12/metropolitano-novo65.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ], [
                'id' => 2660,
                'short_name' => 'MCD',
                'name' => 'Marcílio Dias',
                'image' => 'https://s.glbimg.com/es/sde/f/equipes/2018/09/23/wEjhAmH7XcBgm7kB5KSF.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ], [
                'id' => 3032,
                'short_name' => 'HER',
                'name' => 'Hercílio Luz',
                'image' => 'https://s.glbimg.com/es/sde/f/organizacoes/2018/03/05/Hercilio_Luz-65.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ], [
                'id' => 3481,
                'short_name' => 'TUB',
                'name' => 'Tubarão',
                'image' => 'https://s.glbimg.com/es/sde/f/equipes/2016/09/09/tubarao65.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
