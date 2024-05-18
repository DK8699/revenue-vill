@extends('layouts.adminHome')
@section('content')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style>
    .order-card {
        color: #fff;
    }

    .bg-c-blue {
        background: linear-gradient(45deg, #4099ff, #73b4ff);
    }

    .bg-c-green {
        background: linear-gradient(45deg, #2ed8b6, #59e0c5);
    }

    .bg-c-yellow {
        background: linear-gradient(45deg, #FFB64D, #ffcb80);
    }

    .bg-c-pink {
        background: linear-gradient(45deg, #FF5370, #ff869a);
    }


    .card {
        border-radius: 0px;
        -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
        box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
        border: none;
        margin-bottom: 30px;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .card .card-block {
        padding: 25px;
    }

    .order-card i {
        font-size: 26px;
    }

    /* .f-left {
        float: left;
    }

    .f-right {
        float: right;
    } */
</style>
<div class="row">


    <div class="col-md-4 col-xl-4">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total Districts<span class="f-right counter">{{$countDistrict}}</span></h6>
                <div class="row">
                    <div class="col">
                        <h6 style="text-align: left;">Foundation Day
                            Request Received</h6>
                        <h6 class="counter mt-4"><b>{{$proposeFoundationDayDistrictCount}}</b></h6>
                    </div>

                    <!-- <p class="m-b-0">Total Requests |<span class="f-right counter">{{$proposal}}</span></p> -->
                    <div class="col">
                        <h6 style="text-align: left;">Village Name Change
                            Request Received</h6>
                        <h6 class="counter ">{{$proposeNameDistrictCount}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xl-4">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total Revenue Cirlces<span class="f-right counter">{{$countCircle}}</span></h6>
                <div class="row">
                    <div class="col">
                        <h6 style="text-align: left;">Foundation Day
                            Request Received</h6>
                        <h6 class="counter mt-4">{{$proposeFoundationDayRevenueCirCount}}</h6>
                    </div>

                    <!-- <p class="m-b-0">Total Requests |<span class="f-right counter">{{$proposal}}</span></p> -->
                    <div class="col">
                        <h6 style="text-align: left;">Village Name Change
                            Request Received</h6>
                        <h6 class="counter ">{{$proposeNameRevenueCirCount}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xl-4">
        <div class="card bg-c-yellow order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total Revenue Villages<span class="f-right counter">{{$countVillage}}</span></h6>
                <div class="row">
                    <div class="col">
                        <h6 style="text-align: left;">Foundation Day
                            Request Received</h6>
                        <h6 class="counter mt-4">{{$proposeFoundationDayRevenueVillCount}}</h6>
                    </div>

                    <!-- <p class="m-b-0">Total Requests |<span class="f-right counter">{{$proposal}}</span></p> -->
                    <div class="col">
                        <h6 style="text-align: left;">Village Name Change
                            Request Received</h6>
                        <h6 class="counter ">{{$proposeNameRevenueVillCount}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<!-- <div class="row">
    <div class="col-lg-4 mb-4">
        <div class="card p-2" style="border-radius: 0; background-color: #2396d3; color: white">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('images/user-report.svg')}}" alt="" style="filter: brightness(0) invert(1); width: 100%;">
                </div>
                <div class="col-md-8">
                    <div class="card-title pt-4">
                        <h5><a href="#" style="text-decoration: none; color: white;">Total Request</a></h5>
                    </div>
                    <div class="card-text">
                        <span style="font-size: 28px;">
                            <p>
                                <span class="counter" style="display: inline-block; width: 32%"></span>
                            </p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-md-8 col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm" id="DataTable1">
                    <thead class="thead" style="background-color: #073950 !important; color: white;">
                        <tr>
                            <th scope="col">District Name</th>
                            <th scope="col">Total Requests</th>
                            <th scope="col">Change Request</th>
                            <!-- <th scope="col">Village Name Request</th> -->
                            <!-- <th scope="col">Proposed Village Name</th>
                    <th scope="col">Action</th> -->
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="card">
            <div class="card-body">
                <canvas id="myPieChart" width="100" height="100"></canvas>
            </div>
        </div>
    </div>
</div>





<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
<!-- <script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('users-list') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                }
            ]
        });
    });
</script> -->


<script>
    $('#DataTable1').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "scrollX": true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "order": [
            [0, "desc"]
        ],
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        dom: 'Blfrtip',
        "language": {
            "processing": 'Loading data...'
        },

        "ajax": {
            "url": "{{ route('adminDatatable')}}",
            "data": function(d) {
                // d.dis_id = $('#district').val();
                // d.block_id = $('#block').val();
                // d.panchayat_id = $('#panchyat').val();

            }
        },
        "columns": [

            {
                "data": "district_name"
            },
            {
                "data": "no_of_request"
            },
            {
                "data": "nameRequest"
            },
            // {
            //     "data": "dayRequest"
            // },

        ],

    });
</script>

<script>
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
</script>

<script>
    const ctx = document.getElementById('myPieChart').getContext('2d');
    const myPieChart = new Chart(ctx, {
        type: 'doughnut', // doughnut
        data: {
            labels: [
                'Gaon Sabha',
                'Organization',
                'Society'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: ['{{$countGaon}}', '{{$countOrganization}}', '{{$countSociety}}'],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4,
            }],
        }
    });
</script>

@endsection