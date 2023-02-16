<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $temporaryFiles = collect($files)->map(fn($file) => $file->store( 'temporary/'. $uuid));

        return response()->json([
            'temporaryFiles' => $temporaryFiles,
        ]);
    }

    public function destroy(Request $request)
    {
        $filename = $request->get('filename');
        $uuid = $request->get('uuid');
        if (Storage::delete('temporary/' . $uuid . '/' . $filename)){
            return response()->json([
                'message' => 'File deleted successfully',
            ]);
        } else {
            return response()->json([
                'message' => 'File not found',
            ], 404);
        };
    }
}
