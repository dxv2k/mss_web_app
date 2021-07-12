@extends('layouts.app')
@section('content')

<body class="bg-dark">

    <div class="container " style="max-width:500px;">
        <div class="row">
            <div class="card card-bg">
                <!-- Title -->
                <div class="card-header separator-title text-center">Music Separator</div>
                <!-- Upload -->
                <audio controls> 
                <!-- <source src="./music.mp3" type="audio/mp3">  -->
                <source src="C:\Users\razor\Documents\github\mss_web_app\music_source_app\music.mp3" type="audio/mpeg"> 
                </audio>  
            </div>
        </div>
    </div>

</body>
@endsection