<?php

namespace App\Http\Controllers;

use App\Imports\CompaniesImport;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
            'chunk' => 'required|integer',
            'totalChunks' => 'required|integer',
        ]);

        $file = $request->file('file');

        Excel::import(new CompaniesImport, $file);

        return response()->json(['message' => 'Chunk uploaded successfully']);
    }
}
