<?php

namespace App\Services;

use App\Banner;

class CountViewsService
{
    public function execute(): void
    {
        $url = \Request::url();
        $banner = Banner::where('url', $url)->first();
        if ($banner != null) {
            $banner->views = $banner->views + 1;
            $banner->update(['views' => $banner->view]);
        }
    }
}