<?php

namespace App\Http\Controllers;

use App\Services\TemporaryUploadService;
use Illuminate\Http\RedirectResponse;


class DeleteController extends Controller
{
    private TemporaryUploadService $temporaryUploadService;

    public function __construct(TemporaryUploadService $temporaryUploadService)
    {
        $this->temporaryUploadService = $temporaryUploadService;
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->temporaryUploadService->destroy($id);
        return redirect()->route('upload');
    }
}
