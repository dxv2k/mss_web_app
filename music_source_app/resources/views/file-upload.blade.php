@extends('layouts.app')
@section('content')

<body class="bg-dark">

    <div class="container " style="max-width:500px;">
        <div class="row">
            <div class="card card-bg">
                <!-- Title -->
                <div class="card-header separator-title text-center">Music Separator</div>
                <!-- Upload -->
                <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="chooseFile">
                        <label class="custom-file-label" for="chooseFile">Select file</label>
                    </div>
                    <!-- Stem Radio Button -->
                    <div class="text-center btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                            <input type="radio" value="2" name="stems" id="option1" autocomplete="off" checked>
                            2 stems
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" value="4" name="stems" id="option2" autocomplete="off">
                            4 stems
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" value="5" name="stems" id="option3" autocomplete="off">
                            5 stems
                        </label>
                    </div>
                    <!-- Button -->
                    <button type="submit" name="submit" class="btn btn-danger btn-block mt-4">
                        Separate
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
@endsection