@extends('layouts.app')
@section('content')


<!-- Ref: https://medium.com/@matthewcoatney/searchable-audio-player-using-laravel-83967c60ea69 -->
<body class="bg-dark">

    <div class="container " style="max-width:500px;">
        <div class="row">
            <div class="card card-bg">
                <!-- Title -->
                <div class="card-header separator-title text-center">Music Separator</div>
                <!-- Upload -->

                <audio controls> 
                <source src=".1/music.mp3/music/piano.wav" type="audio/mp3"> 
                <!-- <source src=".1music.mp3/music/accompaniment.wav" type="audio/mp3">  -->
                </audio>  


           </div>
        </div>
    </div>

</body>
@endsection