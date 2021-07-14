@extends('layouts.app')
@section('content')


<!-- Ref: https://medium.com/@matthewcoatney/searchable-audio-player-using-laravel-83967c60ea69 -->

<body class="bg-dark">
    <div class="card card-bg mx-auto" style="max-width: 500px;">
        <p class="card-header separator-title">Track list</p>
        @foreach($files as $name => $path)
        <div class="d-flex ml-5" style="align-items: center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#ff8a84" class="bi bi-volume-up-fill" viewBox="0 0 16 16">
                <path d="M11.536 14.01A8.473 8.473 0 0 0 14.026 8a8.473 8.473 0 0 0-2.49-6.01l-.708.707A7.476 7.476 0 0 1 13.025 8c0 2.071-.84 3.946-2.197 5.303l.708.707z" />
                <path d="M10.121 12.596A6.48 6.48 0 0 0 12.025 8a6.48 6.48 0 0 0-1.904-4.596l-.707.707A5.483 5.483 0 0 1 11.025 8a5.483 5.483 0 0 1-1.61 3.89l.706.706z" />
                <path d="M8.707 11.182A4.486 4.486 0 0 0 10.025 8a4.486 4.486 0 0 0-1.318-3.182L8 5.525A3.489 3.489 0 0 1 9.025 8 3.49 3.49 0 0 1 8 10.475l.707.707zM6.717 3.55A.5.5 0 0 1 7 4v8a.5.5 0 0 1-.812.39L3.825 10.5H1.5A.5.5 0 0 1 1 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06z" />
            </svg>
            <p class="track-list-font ml-4">{{$name}}</p>
            <audio controls class="ml-5">
                <source src="{{$path}}" type="audio/wav">
                Your browser does not support the audio element.
            </audio>
            <a href="#" class="download-icon ml-5" value="vocals.wav">
                <i class="fa fa-download"></i>
            </a>
        </div>
        <hr class="mt-1 mb-1">
        @endforeach
    </div>

</body>
@endsection