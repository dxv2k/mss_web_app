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
                <source src="music/music.mp3" type="audio/mp3"> 
                </audio>  

                @foreach
                <!-- Scan through files & add src to each audio tag -->
                @endforeach
            </div>
        </div>
    </div>

</body>
@endsection