<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\User;
use phpDocumentor\Reflection\PseudoTypes\False_;

use function GuzzleHttp\Psr7\str;

// // Call python script
// use Symfony\Component\Process\Process;
// use Symfony\Component\Process\Exception\ProcessFailedException;

// TODO: Update FileUpload to FileUploadController
class FileUpload extends Controller
{
    public function __construct(){ 
        set_time_limit(300); 
    }
    
    public function createForm()
    {
        return view('file-upload');
    }

    public function performSeparation($filePath, $destination, $stems_option ){ 
        // convert all args to string dtype  
        $stems_option = $stems_option."stems";  
        $destination = strval($destination); 
        $filePath = strval($filePath); 

        // Prepare args  
        $args = "$stems_option .$filePath .$destination"; 

        // Call python script 
        $command = "conda activate audio && python C:/Users/razor/Documents/github/mss_web_app/music_source_app/st.py ";  
        $args = $command.$args; // merge command & args together  
        shell_exec($args); 
    }

    public function scanDir($path, 
                           $applyPrefix = True){ 
        /* 
            Scan given directory & return every files in directory   
            with full file path 
            E.g: $path/$item_name  
        */   
        // scan all files in given directory & remove '.','..'
        $files = scandir($path); 
        $files = array_diff($files,array('.','..')); 

        // add prefix of given path
        if($applyPrefix){ 
            $prefixed_array = substr_replace($files, $path.'/', 0, 0);
            return $prefixed_array; 
        } 
        return $files; 
    }

    public function fileUpload(Request $req)
    {
        /*
            Handling upload -> send uploaded to database  
                            -> call python script 
                            -> return separated files_path to playback view  
        */
        // Check validate 
        $req->validate([
            // Allow size <= 50MB 
            'file' => 'required|mimes:mp3,wav,flac,aac,3gp|max:51200'
        ]);

        // Push uploaded files into database 
        $fileModel = new File();
        if ($req->file()) {
            $fileName = $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->stems = $req->stems; // number only  
            $fileModel->name = $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->user_id = $req->user()->id; 
            $fileModel->save();

            // // Perform separation 
            // // file_path, destination, stems
            // $destination = $fileModel->user_id.'/'.$fileModel->name; // create folder with user_id  
            // $this->performSeparation($fileModel->file_path, // file_path
            //                                 $destination, //destination 
            //                                 $fileModel->stems); // stems options (2/4/5stems) 

            // // scan where separted files are
            // $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileModel->name);
            // $separated_files = $this->scanDir('.'.$destination.'/'.$withoutExt);                                             
            // $files = $this->scanDir('.'.$destination.'/'.$withoutExt,
            //                         applyPrefix:False); 

            $files = [
                2 => "accompaniment.wav",
                3 => "bass.wav",
                4 => "drums.wav",
                5 => "other.wav",
                6 => "piano.wav",
                7 => "vocals.wav"
            ];  
            $separated_files = [
                2 => ".1/music.mp3/music/accompaniment.wav", 
                3 => ".1/music.mp3/music/bass.wav", 
                4 => ".1/music.mp3/music/drums.wav",
                5 => ".1/music.mp3/music/other.wav",
                6 => ".1/music.mp3/music/piano.wav",
                7 => ".1/music.mp3/music/vocals.wav"
            ]; 
            $files = preg_replace('/\\.[^.\\s]{3,4}$/', '', $files);
            $files = array_combine($files, $separated_files); 
            // dd($files); 
            return view('/playback',compact("files"));  

            // return back()
            //     ->with('success', 'File has been uploaded.')
            //     ->with('file', $fileName);
        }
    }
}
