<?php


namespace App\Http\Controllers;

use App\Services\TemporaryUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DragAndDropController extends Controller
{
    private TemporaryUploadService $temporaryUploadService;

    public function __construct(TemporaryUploadService $temporaryUploadService)
    {
        $this->temporaryUploadService = $temporaryUploadService;
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'file' => 'required|mimes:jpg,png,gif'
        ]);
        $this->temporaryUploadService->execute($request);
        return redirect()->route('upload');
    }
}
