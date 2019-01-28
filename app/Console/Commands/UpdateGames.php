<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Game;
use Illuminate\Support\Carbon;

class UpdateGames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'games:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update games list, score, etc';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new \GuzzleHttp\Client();

        for ($i = 1; $i < 19; $i++) {
            $response = $client->request(
                'GET',
                'https://api.globoesporte.globo.com/tabela/e93367fb-44fc-408d-9fc6-55639726e9a0/fase/primeira-fase-catarinense-2019/rodada/' . $i . '/jogos/'
            );

            $games = json_decode((string)$response->getBody());

            foreach ($games as $game) {
                Game::updateOrCreate([
                    'game_id' => $game->id,
                ], [
                    'round_id' => $i,
                    'home_id' => $game->equipes->mandante->id,
                    'guest_id' => $game->equipes->visitante->id,
                    'home_score' => $game->placar_oficial_mandante,
                    'guest_score' => $game->placar_oficial_visitante,
                    'home_score_penalty' => $game->placar_penaltis_mandante,
                    'guest_score_penalty' => $game->placar_penaltis_visitante,
                    'stadium_name' => $game->sede->nome_popular,
                    'match_time' => Carbon::parse($game->data_realizacao)
                ]);
            }
        }
        \Log::debug('All games are now up to date.');
    }
}
