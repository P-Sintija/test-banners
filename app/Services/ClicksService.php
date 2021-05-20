<?php

namespace App\Services;

use App\Banner;

class ClicksService
{
    public function execute(int $id): void
    {
        $banner = Banner::find($id);
        $banner->clicks = $banner->clicks + 1;
        Banner::where('id', $id)->update(['clicks' => $banner->clicks]);
    }
}