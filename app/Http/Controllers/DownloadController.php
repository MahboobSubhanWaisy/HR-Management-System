<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attachement;
use Illuminate\Support\Facades\Storage;
class DownloadController extends Controller
{
    public function download($id)
    {
        $download = Attachement::find($id); 
        $path = 'Employee_Attachment/'.$download->file_name;
        return response()->download($path, $download->original_filename, ['Content-Type' => $download->mime]);
    }
}
