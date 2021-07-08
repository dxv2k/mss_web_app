<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\User;


// // Call python script
// use Symfony\Component\Process\Process;
// use Symfony\Component\Process\Exception\ProcessFailedException;


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
        // dd(auth()->user()->files());  
        // dd(auth()->user()->files());  
        // $user_id = auth()->user()->files(); 
        // dd($user_id); 
        // dd($req->user()->username); 
        $fileModel = new File();
        // dd($req->stems); 
        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->stems = $req->stems; 
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->user_id = $req->user()->id; 
            // Testing here 

            // 
            $fileModel->save();

            // dd(shell_exec("conda activate audio")); 
            // dd(shell_exec("python C:/Users/razor/Documents/github/mss_web_app/hello.py 2>&1"));
            // dd(shell_exec("conda activate audio && python C:/Users/razor/Documents/github/mss_web_app/hello.py 2>&1"));
            shell_exec("conda activate audio && python C:/Users/razor/Documents/github/mss_web_app/hello.py 2>&1");
            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName);
        }
    }
}
