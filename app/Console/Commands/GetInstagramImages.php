<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use InstagramAPI\Instagram;
use InstagramAPI\Signatures;
use App\InstagramImage;

class GetInstagramImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instagram:get-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get new instagram images with hashtag #catarinensesicoob and update old images data.';

    protected $ig;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->ig = new Instagram(false, false, [
            'storage' => 'mysql',
            'dbhost' => '127.0.0.1',
            'dbname' => 'catarinense_sicoob',
            'dbusername' => 'root',
            'dbpassword' => 'secret',
        ]);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Logging in...');
        try {
            $this->ig->login(env('INSTAGRAM_USER'), env('INSTAGRAM_PASSWORD'));
            $this->info('Logged in.');
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            die();
        }

        $this->line('Looking for images...');
        $rank_token = Signatures::generateUUID();

        $max_id = null;
        $new = 0;
        $total = 0;
        $updated = 0;
        do {
            $response = $this->ig->hashtag->getFeed('catarinensesicoob', $rank_token, $max_id);

            foreach ($response->getItems() as $item) {
                if ($item->getMediaType() === 1) {
                    $total++;
                    $instagram_image = InstagramImage::updateOrCreate([
                        'ig_id' => $item->getId(),
                        'ig_code' => $item->getCode(),
                    ], [
                        'ig_username' => $item->getUser()->getUsername(),
                        'ig_user_image_url' => $item->getUser()->getProfilePicUrl(),
                        'ig_like_count' => $item->getLikeCount(),
                        'ig_image_url' => $item->getImageVersions2()->getCandidates()[0]->getUrl(),
                    ]);
                    if ($instagram_image->wasRecentlyCreated) {
                        $new++;
                    } elseif ($instagram_image->wasChanged()) {
                        $updated++;
                    }
                }
            }
            break;

            $max_id = $response->getNextMaxId();

            if ($max_id !== null) {
                echo "Sleeping for 5s...\n";
                sleep(5);
            }
        } while ($max_id !== null); // Must use "!==" for comparison instead of "!=".
        $this->info($total . ' images found.');
        $this->info($updated . ' images updated.');
        $this->info($new . ' new images added.');
    }
}
