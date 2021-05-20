<?php

namespace App\Services;

use App\Banner;

class StatisticsService
{
    public function handleClicks(): array
    {
        $data = [];
        if (count(Banner::all()) == 0) {
            return $data;
        } else {
            $data = Banner::orderBy('clicks', 'desc')->get()->all();
            return $data;
        }

    }

    public function handleViews(): array
    {
        $data = [];
        if (count(Banner::all()) == 0) {
            return $data;
        } else {
            $data = Banner::orderBy('views', 'desc')->get()->all();
            return $data;
        }

    }
}