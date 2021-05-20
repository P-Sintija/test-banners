<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerStorageRequest;
use App\Services\BannerService;
use App\Services\TemporaryUploadService;
use App\Services\UploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class UploadController extends Controller
{
    private TemporaryUploadService $temporaryUploadService;
    private BannerService $bannerService;
    private UploadService $uploadServices;

    public function __construct(
        TemporaryUploadService $temporaryUploadService,
        BannerService $bannerService,
        UploadService $uploadServices
    )
    {
        $this->temporaryUploadService = $temporaryUploadService;
        $this->bannerService = $bannerService;
        $this->uploadServices = $uploadServices;
    }

    public function show(): View
    {
        $temporaryFiles = $this->temporaryUploadService->handle();
        $positions = $this->bannerService->positionCount();
        return view('upload', [
            'temporaryFiles' => $temporaryFiles,
            'positions' => $positions
        ]);
    }

    public function store(BannerStorageRequest $request): RedirectResponse
    {
        $this->uploadServices->execute($request);
        return redirect()->route('upload');
    }
}
