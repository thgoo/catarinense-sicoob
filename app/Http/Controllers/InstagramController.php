<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use InstagramAPI\Instagram;
use App\InstagramImage;

class InstagramController extends Controller
{
    public function randomImages()
    {
        $images = InstagramImage::limit(10)->inRandomOrder()->get();

        return response()->json([
            'success' => true,
            'images' => $images,
        ]);
    }
}
