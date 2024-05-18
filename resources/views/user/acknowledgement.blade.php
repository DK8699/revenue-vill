@extends('layouts.home')
@section('content')
<style>
    table,
    td,
    tr {
        border: solid white;
    }
</style>
<div class="village-form mt-5 mb-5">
    <div class="container">
        <div class="row" id="certificate">
            <div class="col-md-12">
                <p class="text-center">
                    <img src="{{asset('images/icons/Logoupdate-01-08.png')}}" alt="Logo" style="width: 250px;">
                    <br>
                </p>
                <p style="position: absolute; right: 102px; top: 66px;">
                    <button class="btn btn-success" style="width: 96px;" onclick="printCertificate()">Print</button>
                </p>
                @foreach($purposes as $val)
                @if($val->proposed_status==1)
                <p class="mt-3 mb-3 text-center">
                    ACKNOWLEDGEMENT RECEIPT OF VILLAGE NAME REQUEST
                </p>
                @else
                <p class="mt-3 mb-3 text-center">
                    ACKNOWLEDGEMENT RECEIPT OF FOUNDATION DAY REQUEST
                </p>
                @endif
                @endforeach

                <table class="table table-borderless">
                    <tbody>
                        @foreach($purposes as $val)
                        <tr>
                            <p class="ml-2" style="font-weight: 700">
                                <span> Receipt No. : {{$val->receipt_no}} </span>
                            </p>
                        </tr>

                        <tr>
                            <td>
                                <span style="font-weight: 700"> Category: <br /> </span>
                                <span> {{$val->category_name}}
                                </span>
                            </td>

                            <td>
                                <span style="font-weight: 700">
                                    Applicant Name: <br />
                                </span>
                                <span> {{$val->proposer_name}}
                                </span>
                            </td>

                            <td>
                                <span style="font-weight: 700"> ID No.: <br /> </span>
                                @if($val->identity_number == NULL)
                                <span>
                                    NA
                                </span>
                                @else
                                <span>
                                    {{$val->identity_number}}
                                </span>
                                @endif
                            </td>
                            <td>
                                <span style="font-weight: 700">
                                    District Name: <br />
                                </span>
                                <span> {{$val->district_name}} </span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="font-weight: 700">
                                    Revenue Circle: <br />
                                </span>
                                <span> {{$val->circle_name}}
                                </span>
                            </td>
                            <td>
                                <span style="font-weight: 700">
                                    Revenue Village: <br />
                                </span>
                                <span> {{$val->village_name}} </span>
                            </td>
                            <td>
                                <span style="font-weight: 700"> Block Name: <br /> </span>
                                <span> {{$val->block_name}} </span>
                            </td>
                            <td>
                                <span style="font-weight: 700"> GP Name: <br /> </span>
                                <span> {{$val->gp_name}} </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <table class="table" style="border: 1px solid white;">
                    <tbody>
                        @foreach($purposes as $val)
                        <tr>
                            <td>
                                @if($val->proposed_status==1)
                                <span style="font-weight: 700">
                                    Proposed Village Foundation Name: <br />
                                </span>
                                <span> {{$val->proposed_name}} </span>
                                @else
                                @if($val->establish_date != NULL)
                                <span style="font-weight: 700;">
                                    Proposed Village Foundation Day : <br>
                                </span>
                                <span>
                                    {{\Carbon\Carbon::parse($val->establish_date)->format('d-m-Y')}}
                                </span>
                                @else
                                @php
                                $month = \Carbon\Carbon::parse('2022-'.$val->month.'-01')->format('F');
                                @endphp
                                <span style="font-weight: 700;">
                                    Proposed Village Foundation Day : <br>
                                </span>
                                <span>
                                    Day: {{$val->day}} Month:{{$month}}
                                </span>
                                @endif
                            </td>
                            @endif

                        </tr>

                        <tr>
                            <td>
                                <span style="font-weight: 700">
                                    Reason for the proposed Foundation day : <br />
                                </span>
                                <p style="width: 100%;">
                                    <span>
                                        {{$val->description}}
                                    </span>
                                </p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function printCertificate() {
            const printContents = document.getElementById('certificate').innerHTML;
            const originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    @endsection