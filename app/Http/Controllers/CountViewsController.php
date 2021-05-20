<?php

namespace App\Http\Controllers;

use App\Services\CountViewsService;
use Illuminate\Http\RedirectResponse;

class CountViewsController extends Controller
{
    private CountViewsService $countViewsService;

    public function __construct(CountViewsService $countViewsService)
    {
        $this->countViewsService = $countViewsService;
        $this->countViewsService->execute();
    }

    public function index(int $id): RedirectResponse
    {
        return redirect()->route('home');
    }
}
