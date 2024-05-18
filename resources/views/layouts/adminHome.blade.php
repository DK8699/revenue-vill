<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="{{asset('css/das.css')}}">
    <style>
        .navbar .btn.focus,
        .btn:focus {
            box-shadow: none !important;
        }

        .navbar .btn {
            text-align: left !important;
        }

        .nav-link.active {
            width: 100%;
        }
    </style>

    <title>AGAG</title>
</head>

<body>
    <!-- <div class="d-flex" id="wrapper"> -->
    <!-- Sidebar -->

    <!-- </div> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{url('/home')}}" style="width: 60%;">
                <img src="{{asset('images/icons/LogoUpdate-09.svg')}}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item dropdown">
                        <div class="row">
                            <div class="col-sm-6 align-self-center" style="padding: 0;">
                                <img class="profile float-right" src="{{asset('images/icons/profile.svg')}}" alt="Profile Pic" style="width: 18%; margin-left: 120px;">
                            </div>
                            <div class="col-sm-6" style="padding: 0;">
                                <a type="button" class="nav-link dropdown-toggle btn btn-sm text-dark shadow-none" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false" style="border-radius: 0; text-transform: uppercase; /*width: 0px;*/">
                                    <span id="nameSpan" style="font-weight: 700; font-size: 13px;">
                                        Welcome,<br>
                                    </span>
                                    <span style="font-weight: 700; font-size: 13px;">
                                        {{ Auth::user()->name }}
                                    </span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li>
                                        <!-- <a class="dropdown-item" href="{{ url('/user-requestView')}}">View Submitted Request</a> -->
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-sm-12">
                <div class="nav flex-column nav-pills mt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                    <a class="nav-link" id="v-pills-option1-tab" data-toggle="pill" href="#v-pills-option1" role="tab" aria-controls="v-pills-option1" aria-selected="false">option1</a>
                    <a class="nav-link" id="v-pills-option2-tab" data-toggle="pill" href="#v-pills-option2" role="tab" aria-controls="v-pills-option2" aria-selected="false">option2</a>
                    <a class="nav-link" id="v-pills-option3-tab" data-toggle="pill" href="#v-pills-option3" role="tab" aria-controls="v-pills-option3" aria-selected="false">option3</a>
                </div>
            </div>

            <div class="col-lg-10 col-sm-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active mt-3" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        @yield('content')
                    </div>
                    <div class="tab-pane fade" id="v-pills-option1" role="tabpanel" aria-labelledby="v-pills-profile-tab">B</div>
                    <div class="tab-pane fade" id="v-pills-option2" role="tabpanel" aria-labelledby="v-pills-messages-tab">C</div>
                    <div class="tab-pane fade" id="v-pills-option3" role="tabpanel" aria-labelledby="v-pills-settings-tab">D</div>
                </div>

            </div>
        </div>
    </div>



    <!-- <footer class="fixed-bottom" style="height: 7%; background-color: rgba(233, 233, 233)">
        <p class="text-center pt-3 pb-3">
            © Copyright 2021. Designed, Developed and Maintained by Gratia Technology.
        </p>
    </footer> -->

</body>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

<script src="{{asset('js/bootstrap.min.js')}}"></script>


</html>