@extends('layouts.app')


@section('content')

<body class="bg-dark">
    <div class="container">
        <!-- Left side card  -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card card-bg">
                    <img class="card-img-top" src="" alt="">
                    <div class="card-body">
                        <!-- title -->
                        <center>
                            <h5 class="card-title separator-title">Music Separator</h5>
                        </center>

                        <!-- upload file -->
                        <form>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </form>

                        <script>
                        // Add the following code if you want the name of the file appear on select
                        $(".custom-file-input").on("change", function() {
                            var fileName = $(this).val().split("\\").pop();
                            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                        });
                        </script>

                        <!-- BUTTON  -->
                        <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons"> -->
                        <div class="btn-group-toggle " data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                2 stems: Vocals (singing voice)/ Accompaniment separation
                            </label>
                            <br>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option2" autocomplete="off">
                                4 stems: Vocals / Drums / Bass / Other separation
                            </label>
                            <br>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option3" autocomplete="off">
                                5 stems: Vocals / Drums / Bass / Piano / Other separation
                            </label>
                        </div>
                        <!-- <p class="card-text">
                            Some quick example text to build on
                            the card title and make up the bulk
                            of the card's content.
                        </p> -->
                        <!-- Button  -->
                        <!-- <a href="#" class="btn btn-outline-primary btn-sm"> -->
                        <br> <br>
                        <center>
                            <a href="#" class="btn btn-danger btn-lg">
                                Separate!
                            </a>
                        </center>
                    </div>
                </div>
            </div>
            <!-- Right side card  -->
            <div class="col-lg-6 mb-4">
                <div class="card card-bg">
                    <img class="card-img-top" src="" alt="">

                    <div class="card-body">
                        <h5 class="card-title separator-title">Playback</h5>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option1" autocomplete="off" checked> Active
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option2" autocomplete="off"> Radio
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option3" autocomplete="off"> Radio
                            </label>
                        </div>
                        <br>
                        <!-- <p class="card-text">
                            Some quick example text to build on the
                            card title and make up the bulk of the
                            card's content.
                        </p> -->
                        <!-- Button  -->
                        <!-- <a href="#" class="btn btn-outline-primary btn-sm"> -->
                        <a href="#" class="btn btn-danger">
                            Card link
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


</body>

@endsection