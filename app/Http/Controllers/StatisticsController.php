<?php

namespace App\Http\Controllers;


use App\Services\StatisticsService;
use Illuminate\View\View;

class StatisticsController extends Controller
{
    private StatisticsService $statisticsService;

    public function __construct(StatisticsService $statisticsService)
    {
        $this->statisticsService = $statisticsService;
    }

    public function indexClicks(): View
    {
        $data = $this->statisticsService->handleClicks();
        return View('statistics', [
            'parameter' => 'clicks',
            'data' => $data
        ]);
    }

    public function indexViews(): View
    {
        $data = $this->statisticsService->handleViews();
        return View('statistics', [
            'parameter' => 'views',
            'data' => $data
        ]);
    }
}
