<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>(Local) Revenue Villages</title>
</head>

<body>
    
    <div class="container mt-5">
        <div class="alert alert-info" role="alert" style="text-align: center;">
            <h4>AMAR GAON AMAR GAURAV</h4>
        </div>
        <div class="form-row pt-5" style="padding-left: 150px;">
            <div class="form-group col-md-6">
                <a href="{{url('/proposal/form/2')}}" class="btn" role="button">
                    <div class="card bg-light mb-3" style="max-width: 18rem;">
                        <div class="card-header">Selection of Village Foundation day</div>
                        <div class="card-body">
                            <!-- <h5 class="card-title">Light card title</h5> -->
                            <img src="{{asset('images/date.png')}}" alt="" style="width: 40%;">
                        </div>
                    </div>
                </a>
            </div>
            <div class="form-group col-md-6">
                <a href="{{url('/proposal/form/1')}}" class="btn" role="button">
                    <div class="card bg-light mb-3" style="max-width: 18rem;">
                        <div class="card-header">Revenue Village name change</div>
                        <div class="card-body">
                            <!-- <h5 class="card-title">Light card title</h5> -->
                            <img src="{{asset('images/vill.png')}}" alt="" style="width: 50%;">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</html>