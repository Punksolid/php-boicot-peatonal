<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class TemporaryFilesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file.*' => 'file',
            'uuid' => 'required',
        ]);
        $uuid = $request->get('uuid');
        $files = $request->file('file');
        $temporaryFiles = collect($files)->map(fn($file) => $file->storeAs( 'temporary/'. $uuid, $file->getClientOriginalName()));

        return response()->json([
            'temporaryFiles' => $temporaryFiles,
        ]);
    }

    public function destroy(Request $request)
    {
        $filename = $request->get('filename');
        $uuid = $request->get('uuid');
        Storage::disk('temporary')->delete( $uuid . $filename);

    }
}
