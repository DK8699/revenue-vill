@extends('layouts.home')
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
@section('content')
<div id="" class="row justify-content-center" style="margin-top: 10%;">

    <div class="col-md-10 col-sm-12">
        <div class=" text-center"><i class="fa fa-check-circle fa-4x" style="font-size: 10em;"></i></div>
        @if($type_id==2)
        <div class="col-md-12">
            <h4 class="mt-5 mb-5" style="font-family:verdana; text-align: center;">Foundation Day Request Submitted Successfully</h4>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <a href="{{url('/user/download-document/'.$proposal_id)}}" class="btn btn-primary btn-block" style="border-radius: 0;" target="_blank">Download Receipt</a> <br>
                <a href="{{url('/home')}}" class="btn btn-link text-center ml-4" style="border-radius: 0;">Back To Home Page</a>

            </div>
        </div>
        <!-- <h6 class="h6 heading text-center" style="font-family:verdana;"><small>Your Registration is in progress, Please wait for the Approval</small> </h6> -->

        @elseif($type_id==1)
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h4 class="mt-5 mb-5" style="font-family:verdana; text-align: center;">Name Change Request Submitted Successfully</h4>
            </div>
            <div class="col-md-3">
                <a href="{{url('/user/download-document/'.$proposal_id)}}" class="btn btn-primary btn-block" style="border-radius: 0;" target="_blank">Download Receipt</a> <br>
                <a href="{{url('/home')}}" class="btn btn-link text-center ml-4" style="border-radius: 0;">Back To Home Page</a>
            </div>
        </div>
        @endif
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection