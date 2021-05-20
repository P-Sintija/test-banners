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
        $banners = Banner::all();
        if (count($banners) == 0) {
            return $bannerData;
        } else {
            $positions = [];
            foreach ($banners->all() as $banner) {
                if (!in_array($banner->position, $positions)) {
                    $positions[] = $banner->position;
                }
            }

            foreach ($positions as $position) {
                if ($position === self::SLIDER_POSITION) {
                    $bannerData[$position] = array_filter($banners->all(), function ($banner) use ($position) {
                        return $banner->position === $position;
                    });
                } else {
                    $bannerData[$position] = array_filter($banners->all(), function ($banner) use ($position) {
                        return $banner->position === $position;
                    });
                    $bannerData[$position] = $bannerData[$position][array_rand($bannerData[$position])];
                }
            }
            return $bannerData;
        }
    }
}