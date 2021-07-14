<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\User;

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

    public function scanDir($path){ 
        /* 
            Scan given directory & return every files in directory   
            with full file path 
            E.g: $path/$item_name  
        */   
        // scan all files in given directory & remove '.','..'
        $files = scandir($path); 
        $files = array_diff($files,array('.','..')); 

        // add prefix of given path
        $prefixed_array = substr_replace($files, $path.'/', 0, 0);

        return $prefixed_array; 
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


            // Perform separation 
            // file_path, destination, stems
            $destination = $fileModel->user_id.'/'.$fileModel->name; // create folder with user_id  
            $this->performSeparation($fileModel->file_path, // file_path
                                            $destination, //destination 
                                            $fileModel->stems); // stems options (2/4/5stems) 

            // scan where separted files are
            $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileModel->name);
            $separated_files = $this->scanDir('.'.$destination.'/'.$withoutExt);                                             
            // dd($separated_files); 

            // return redirect('/playback');  
            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName);
        }
    }
}
