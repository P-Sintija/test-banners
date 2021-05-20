<?php

namespace App\Http\Controllers;


use App\Services\BannerService;
use Illuminate\View\View;


class HomeController extends Controller
{
    private BannerService $bannerService;

    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function index(): View
    {
        $positionNumber = $this->bannerService->positionCount();
        $banners = $this->bannerService->handle();

        return view('home', [
            'positionNumber' => $positionNumber,
            'banners' => $banners
        ]);
    }
}
