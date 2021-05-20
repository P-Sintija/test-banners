<?php

namespace App\Services;

use App\DragAndDropImage;
use App\Http\Requests\BannerStorageRequest;
use App\Banner;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class UploadService
{
    const STORAGE = __DIR__ . '/../../storage/app/public/';
    const SIZING = [
        1 => [800, 250],
        2 => [200, 400],
        3 => [250, 200]
    ];
    private string $fileName;
    private TemporaryUploadService $temporaryUploadService;

    public function __construct(TemporaryUploadService $temporaryUploadService)
    {
        $this->temporaryUploadService = $temporaryUploadService;
    }

    public function execute(BannerStorageRequest $request): void
    {
        $this->storeFile($request);
        $this->updateDatabase($request);
        $this->temporaryUploadService->destroy($request['id']);
    }

    private function storeFile(BannerStorageRequest $request): void
    {
        Storage::makeDirectory('/public/' . $request['position']);

        $file = DragAndDropImage::find($request['id']);
        $fileParts = (explode('.', $file->filename));
        $fileExtension = strtolower(end($fileParts));
        $this->fileName = time() . '.' . $fileExtension;

        if (!array_key_exists((int)$request['position'], self::SIZING)) {
            $width = self::SIZING[3][0];
            $height = self::SIZING[3][1];
        } else {
            $width = self::SIZING[(int)$request['position']][0];
            $height = self::SIZING[(int)$request['position']][1];
        }

        $img = Image::make($this->temporaryUploadService->path() . $file->filename);
        $img->resize($width, $height);
        $img->save(self::STORAGE . $request['position'] . '/' . $this->fileName);
    }

    private function updateDatabase(BannerStorageRequest $request): void
    {
        $file = DragAndDropImage::find($request['id']);

        Banner::create([
            'position' => $request['position'],
            'file_name' => $this->fileName,
            'file_path' => $request['position'] . '/' . $this->fileName,
            'original_file_name' => $file->filename,
            'url' => $request['url'],
            'redirect' => $request['checkbox'][0],
        ]);
    }
}