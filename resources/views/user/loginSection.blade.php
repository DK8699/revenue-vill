<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGAG</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>
    <div class="heroBg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex align-items-center justify-content-center">
                    <div style="margin-top: 100px; margin-bottom: 50px;">
                        <p class="text-center">
                            <img class="logo" src="{{asset('images/icons/Logo.png')}}" alt="Logo" style="width: 80%;">
                        </p>
                        <p class="mt-5 d-flex align-items-center justify-content-center">
                            <button type="button" class="btn btn-dark shadow-none" data-toggle="modal" data-target="#loginModalCenter" style="width: 22%; ">Login</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="loginModalCenter" tabindex="-1" role="dialog" aria-labelledby="loginModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-5">
                <div class="modal-header" style="border-bottom: none;">
                    <!-- <h5 class="modal-title" id="loginModalLongTitle">Modal title</h5> -->
                    <img src="{{asset('images/icons/Logo.png')}}" alt="Logo" style="width: 100%;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 50px;">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <h5 class="modal-title text-center mb-3" id="loginModalLongTitle">Login</h5>

                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group row justify-content-center">

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control" name="email" value="" placeholder="Enter Email Id" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Enter Password" required autocomplete="current-password">
                            </div>
                        </div>
                </div>
                <div class="modal-footer d-flex align-items-center justify-content-center" style="border-top: none;">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary" style="width: 22%;">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>