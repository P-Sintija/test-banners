<?php

namespace App\Http\Controllers;


use App\Services\ClicksService;
use Illuminate\Http\Request;

class CountClicksController extends Controller
{
    private ClicksService $clicksService;

    public function __construct(ClicksService $clicksService)
    {
        $this->clicksService = $clicksService;
    }

    public function store(Request $request): void
    {
        $this->clicksService->execute($request['id']);
    }
}
