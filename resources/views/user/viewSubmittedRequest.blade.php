@extends('layouts.home')
@section('content')
<style>
    .btn-group>.btn-group:not(:last-child)>.btn,
    .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {

        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        background-color: black;
        margin-left: 5px;
        margin-bottom: 5px;

    }

    .btn-group>.btn-group:not(:first-child)>.btn,
    .btn-group>.btn:not(:first-child) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        background-color: black;
        margin-left: 5px;
        margin-bottom: 5px;
    }
</style>
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">

<div style="margin-bottom: 10%;">
    <table class="table table-sm" id="myTable">
        <thead class="thead" style="background-color: #073950 !important; color: white;">
            <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">Receipt No.</th>
                <th scope="col">Date of Submission</th>
                <th scope="col">Revenue Village</th>
                <th scope="col">Proposed Foundation Day</th>
                <th scope="col">Proposed Village Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    </table>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!--
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

<script>
    $('#myTable').DataTable({
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
            "url": "{{ route('requestsData')}}",
            "data": function(d) {
                // d.dis_id = $('#district').val();
                // d.block_id = $('#block').val();
                // d.panchayat_id = $('#panchyat').val();

            }
        },
        "columns": [
            // {
            //     data: 'DT_Row_Index',
            //     name: 'DT_Row_Index'
            // },
            {
                "data": "receipt_no"
            },
            {
                "data": "created_at",
                "render": function(data, type, row, meta) 
                {
                    var created_at = row.created_at.split(' ');
                    created_at = created_at[0].split('-');
                    data = created_at[2] + '-' + created_at[1]+ '-' + created_at[0];
                    return data;
                }
            },
            {
                "data": "village_name"
            },
            {
                "data": "establish_date",
                "render": function(data, type, row, meta) {
                    if (row.establish_date == null) {
                        if (row.year != null) {
                            data = row.day + '-' + row.month + '-' + row.year;
                        }
                        else if (row.day == null && row.month == null && row.year == null)
                        {
                            data = ' '
                        }
                        else {
                            $month = ['', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
                            data = row.day + ', ' + $month[row.month];
                        }
                    }
                    return data;
                }

            },
            {
                "data": "proposed_name"
            },

            {
                "data": "id",
                "render": function(data, type, row, meta) {
                    if (type === 'display') {
                        data = '<a class="btn btn-primary btn-sm" href="/user-ackHistory/' + row.id + '" target="_blank">Download</a>';
                    }
                    return data;
                }
            },

        ],



    });
</script>
@endsection