<?php

namespace App\Services;

use App\Banner;

class BannerService
{
    const POSITIONS = 5;
    const SLIDER_POSITION = 1;

    public function positionCount(): array
    {
        $positions = [];
        for ($i = 1; $i <= self::POSITIONS; $i++) {
            $positions[] = $i;
        }
        return $positions;
    }

    public function handle(): array
    {
        $bannerData = [];
        if(count(Banner::all()) == 0 ) {
            return $bannerData;
        }
        foreach ($this->positionCount() as $position) {
            if ($position === self::SLIDER_POSITION) {
                $bannerData[$position] = Banner::where('position', $position)->get();
            } else {
                $bannerData[$position] = Banner::where('position', $position)->get()
                    ->all()[array_rand(Banner::where('position', $position)->get()->all()
                )];
            }
        }
        return $bannerData;
    }
}