<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;


// Call python script
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class FileUpload extends Controller
{
    public function createForm()
    {
        return view('file-upload');
    }

    public function fileUpload(Request $req)
    {
        // Debug 
        // dd($req->all());

        $req->validate([
            // 'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
            'file' => 'required|mimes:jpg,txt,mp3,wav,flac,aac,3gp|max:51200'
        ]);

        $fileModel = new File();

        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            // dd(shell_exec("conda activate audio")); 
            // dd(shell_exec("python C:/Users/razor/Documents/github/mss_web_app/hello.py 2>&1"));
            dd(shell_exec("conda activate audio && python C:/Users/razor/Documents/github/mss_web_app/hello.py 2>&1"));
            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName);
        }
    }
}
