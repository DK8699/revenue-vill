@extends('layouts.home')
@section('content')

<style>
    .card {
    -webkit-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-moz-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-ms-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-o-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-webkit-transition:all 250ms ease-in-out 0s;
-moz-transition:all 250ms ease-in-out 0s;
-ms-transition:all 250ms ease-in-out 0s;
-o-transition:all 250ms ease-in-out 0s;
transition:all 250ms ease-in-out 0s;
}

</style>

<div class="row" style="padding-top: 80px; padding-bottom: 100px;">
    <div class="col-lg-2"></div>
    <div class="col-lg-4">
        <a href="{{url('/proposal/form/2')}}" class="btn" role="button" style="color: black;">
            <div class="card mt-4 p-5" style="width: 80%; height: 100%;">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <img class="mr-2" src="{{asset('images/icons/icon-new-09.png')}}" alt="Calendar">
                    <p style="margin-bottom: 0rem; font-weight: 700; font-size:x-large; color:#b90224">
                        Selection of Village <br>Foundation Day
                    </p>
                </div>
            </div>
        </a>
    </div>
    <div class=" col-lg-4">
        <a href="{{url('/proposal/form/1')}}" class="btn" role="button" style="color: black;">
            <div class="card mt-4 p-5" style="width: 80%; height: 100%;">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <img class="mr-2" src="{{asset('images/icons/icon-new-10.png')}}" alt="Village">
                    <p style="margin-bottom: 0rem; font-weight: 700; font-size:x-large; color:#b90224">
                        Revenue Village <br>Name Change
                    </p>
                </div>
            </div>
        </a>
    </div>
    <div class=" col-lg-2">
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

@endsection