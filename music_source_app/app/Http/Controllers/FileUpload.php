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
    public function performSeparation($filePath, $destination, $stems_option ){ 
        // Prepare args  
        $command = "conda activate audio && python C:/Users/razor/Documents/github/mss_web_app/music_source_app/st.py";  
        $args = ""; // stems + audio_src + dest 

        // Call python script 
        shell_exec($command.$args); 

        // return direct to playback page  
        // TODO: return list of audio to playback 
        return redirect('/playback');  
    }
    public function fileUpload(Request $req)
    {
        $req->validate([
            // Allow size <= 50MB 
            'file' => 'required|mimes:mp3,wav,flac,aac,3gp|max:51200'
        ]);

       // TODO: check file name match with file_path/file_name
        $fileModel = new File();
        if ($req->file()) {
            // $fileName = time() . '_' . $req->file->getClientOriginalName();
            $fileName = $req->file->getClientOriginalName();
            // $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->stems = $req->stems; // number only  
            // $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->name = $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->user_id = $req->user()->id; 
            $fileModel->save();

            $args = " -ns ".$fileModel->stems." -uid ".$fileModel->user_id." -f "."/public".$fileModel->file_path; 
            $path = "conda activate audio && python C:/Users/razor/Documents/github/mss_web_app/music_source_app/separator.py  -ns $fileModel->stems -uid $fileModel->user_id -f /public/$fileModel->file_path";  
            // dd($path.$args); 
            // shell_exec($path.$args."2>&1"); 
            dd(shell_exec($path."2>&1")); 

            // Working, able to perform separate 
            // dd(shell_exec("conda activate audio && python C:/Users/razor/Documents/github/mss_web_app/music_source_app/st.py 2stems C:/Users/razor/Documents/github/mss_web_app/music_source_app/trungtam.mp3 ./ 2>&1"));  
            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName);
        }
    }
}
