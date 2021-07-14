@extends('layouts.app')
@section('content')


<!-- Ref: https://medium.com/@matthewcoatney/searchable-audio-player-using-laravel-83967c60ea69 -->
<body class="bg-dark">

    <div class="container " style="max-width:500px;">
        <div class="row">
            <div class="card card-bg">
                <!-- Title -->
                <div class="card-header separator-title text-center">Playback</div>
                <!-- Upload -->
                @foreach($files as $name => $path)
                    <td>{{$name}}</td>
                    <audio controls> 
                    <source src="{{$path}}" type="audio/mp3"> 
                    </audio>  
                @endforeach

           </div>
        </div>
    </div>

</body>
@endsection