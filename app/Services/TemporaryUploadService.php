<?php

namespace App\Services;

use App\DragAndDropImage;
use Illuminate\Http\Request;


class TemporaryUploadService
{
    const STORAGE = __DIR__ . '/../../storage/';
    const DIRECTORY = 'app/public/temp/';

    public function execute(Request $request): void
    {

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move(self::STORAGE . self::DIRECTORY, $fileName);

        $fileUpload = new DragAndDropImage();
        $fileUpload->filename = $fileName;
        $fileUpload->save();
    }

    public function handle(): array
    {
        $temporaryFiles = [];
        $temporaryFiles = DragAndDropImage::all()->all();
        return $temporaryFiles;
    }

    public function destroy(int $id): void
    {
        $temporaryFile = DragAndDropImage::find($id);
        unlink(storage_path(self::DIRECTORY . $temporaryFile->filename));
        $temporaryFile->delete();
    }

    public function path(): string
    {
        return self::STORAGE . self::DIRECTORY;
    }
}