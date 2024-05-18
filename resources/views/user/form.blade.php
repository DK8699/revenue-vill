@extends('layouts.home')
@section('content')

<style>
    .form-group .table-bordered td, .table-bordered th {
        border: 1px solid #ffffff;
    }
    
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }
</style>

<div class="container mt-5 mb-5" style="padding-bottom: 100px;">
    @if($id==1)
    <div>
        <h4 class="text-center" style="font-weight: 700;">VILLAGE NAME CHANGE REQUEST</h4>
    </div>
    @elseif($id==2)
    <div>
        <h4 class="text-center" style="font-weight: 700;">SELECTION OF VILLAGE FOUNDATION DAY</h4>
    </div>
    @endif
    <form class="mt-5" action="{{url('/proposal/sendData')}}" id="revenue-village-form" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="">District</label>
                <span class="text-danger">*</span>
                <select id="" class="form-control district" name="district_id">
                    <!-- <option value="" selected>Choose...</option> -->
                    @foreach($district as $dis)
                    <option value="{{$dis->id}}">{{$dis-> district_name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('district_id'))
                <span class="text-danger">{{$errors->first('district_id')}}</span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="">Select Revenue Circle</label>
                <span class="text-danger">*</span>
                <select id="" class="form-control revenueCircle" name="revenue_circle_id">
                    <option selected disabled>Choose...</option>
                </select>
                @if ($errors->has('revenue_circle_id'))
                <span class="text-danger">{{$errors->first('revenue_circle_id')}}</span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="">Select Village</label>
                <span class="text-danger">*</span>
                <select id="" class="form-control revenueVillages " name="revenue_village_id">
                    <option selected disabled>Choose...</option>
                </select>
                @if ($errors->has('revenue_village_id'))
                <span class="text-danger">{{$errors->first('revenue_village_id')}}</span>
                @endif
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Block</label>
                <span class="text-danger">*</span>
                <select id="" class="form-control block" name="block_id">
                </select>
                @if ($errors->has('block_id'))
                <span class="text-danger">{{$errors->first('block_id')}}</span>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label for="">Gram Panchayat</label>
                <span class="text-danger">*</span>
                <select id="" class="form-control gp" name="gram_panchayat_id">
                </select>
                @if ($errors->has('gram_panchayat_id'))
                <span class="text-danger">{{$errors->first('gram_panchayat_id')}}</span>
                @endif
            </div>
        </div>
        <!-- <div class="form-group col-md-4">
                    <label for="">Already Proposed Name(Suggestions)</label>
                    <span class="text-danger">*</span>
                    <select id="" class="form-control proposedVill">
                        <option selected>Choose...</option>
                        <option value="0">Others</option>
                    </select>
                </div> -->
        @if($id==1)
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Enter new proposed Village Name</label>
                <span class="text-danger">*</span>
                <input type="text" class="form-control" readonly value="1" name="proposed_status" hidden>
                <input type="text" class="form-control" value="{{ old('proposed_name') }}" name="proposed_name">
                @if ($errors->has('proposed_name'))
                <span class="text-danger">{{$errors->first('proposed_name')}}</span>
                @endif
            </div>
        </div>
        @elseif($id==2)


        <div class="row">
            <div class="form-group col-md-3">
                <input type="text" class="form-control" readonly value="2" name="proposed_status" hidden>

                <label for="">Day</label>
                <span class="text-danger">*</span>
                <select id="" class="form-control " name="day">
                    <option selected disabled>Choose...</option>
                    @for($i=1;$i<=31;$i++) <option value="{{$i}}">{{$i}}</option>
                        @endfor

                </select>
                @if ($errors->has('day'))
                <span class="text-danger">{{$errors->first('day')}}</span>
                @endif
            </div>
            @php
            $year = \Carbon\Carbon::now()->year;
            @endphp
            <div class="form-group col-md-3">
                <label for="">Month</label>
                <span class="text-danger">*</span>
                <select id="" class="form-control " name="month">
                    <option selected disabled>Choose...</option>
                    @for($i=1;$i<=12;$i++) <option value="{{$i}}">{{\Carbon\Carbon::parse($year."-".$i."-01")->format('F')}}</option>
                        @endfor

                </select>
                @if ($errors->has('month'))
                <span class="text-danger">{{$errors->first('month')}}</span>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label for="">Year</label>
                <span class="text text-danger">(Please provide compelete year e.g. 1947)</span>
                <input type="number" class="form-control" value="{{ old('year') }}" name="year" placeholder="YYYY" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "4">

            </div>
        </div>

        @endif


        <input type="hidden" name="type_id" value="{{$id}}">

        <div class="form-group">
            @if($id==1)
            <label for="">Justification for the Proposed Village Name</label>
            <span class="text-danger">*</span>
            <textarea class="form-control" name="description" value="{{ old('description') }}" id="" cols="30" rows="3" style="resize: none;"></textarea>
            @if ($errors->has('description'))
            <span class="text-danger">{{$errors->first('description')}}</span>
            @endif
            @elseif($id==2)
            <label for="">Justification for the Proposed Foundation Day</label>
            <span class="text-danger">*</span>
            <textarea class="form-control" name="description" value="{{ old('description') }}" id="" cols="30" rows="3" style="resize: none;"></textarea>
            @if ($errors->has('description'))
            <span class="text-danger">{{$errors->first('description')}}</span>
            @endif
            @endif
            <!-- <label for="">Reason for the new proposed village name</label>
                <span class="text-danger">*</span>
                <textarea class="form-control" name="" id="" cols="30" rows="3" style="resize: none;"></textarea> -->
        </div>
        <div class="form-group">
            <div class="table-responsive">
                <label for="">Add resolution documents</label>
                <span class="text-danger">*</span><br>
                <label for="" class="text text-danger">*Disclaimer (Files should be in jpg,jpeg and pdf format and file size cannot exceed 2Mb and maximum 5 number of files can be uploaded)
                </label>
                <!--<table class="table table-bordered" id="dynamic_field">-->
                <!--    <tr>-->
                <!--        <td><input type="file" name="proposal_document[]" class="form-control-file" id="" accept="image/jpeg,application/pdf"></td>-->
                <!--        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>-->
                <!--    </tr>-->
                <!--    @if ($errors->has('proposal_document.0'))-->
                <!--    <span class="text-danger">{{$errors->first('proposal_document.0')}}</span>-->
                <!--    @endif-->
                <!--</table>-->
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td><input type="file" name="proposal_document[]" class="form-control-file" id="" accept="image/jpeg,application/pdf"></td>
                        <td style="border: none; text-align:center;"><button type="button" name="add" id="add" class="btn btn-primary" style="width: 100%; text-align: center !important;">+ Add More</button></td>
                    </tr>
                    @if ($errors->has('proposal_document.0'))
                    <span class="text-danger">{{$errors->first('proposal_document.0')}}</span>
                    @endif
                </table>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Select Applicant Category</label>
                <span class="text-danger">*</span>
                <select id="" class="form-control category" name="proposer_category_id">
                    <option selected disabled>Choose...</option>
                    @foreach($proposerCategory as $cat)
                    <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('proposer_category_id'))
                <span class="text-danger">{{$errors->first('proposer_category_id')}}</span>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label for="" id="category_label">Applicant Name</label>
                <span class="text-danger">*</span>
                <input type="text" class="form-control" id="" name="proposer_name" value="{{ old('proposer_name') }}">
                @if ($errors->has('proposer_name'))
                <span class="text-danger">{{$errors->first('proposer_name')}}</span>
                @endif
            </div>
        </div>
        <div class="form-row" id="document_id" style="display: none;">
            <div class="form-group col-md-6">
                <label for="" class="mt-5">Id Number</label>
                <span class="text-danger">*</span>
                <input type="text" class="form-control" name="identity_number" value="{{ old('identity_number') }}" id="" placeholder="Enter Adhaar no/Registration no/PAN no">
                @if ($errors->has('identity_number'))
                <span class="text-danger">{{$errors->first('identity_number')}}</span>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label for="">Upload Identity</label>
                <span class="text-danger">*</span>
                <label for="" class="text text-danger">*Disclaimer (Files should be in jpg,jpeg and pdf format and file size cannot exceed 2Mb)
                </label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" accept="image/jpeg,application/pdf" name="identity_document">
                @if ($errors->has('identity_document'))
                <span class="text-danger">{{$errors->first('identity_document')}}</span>
                @endif
            </div>
        </div>
        <!--<button class="btn btn-primary" type="button" id="action-btn">SUBMIT</button>-->
        <p class="text-center mt-3">
            <button class="btn btn-primary" type="button" id="action-btn" style="width: 20%; text-align: center !important; ">SUBMIT</button>
        </p>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {

            // $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="file" name="proposal_document[]" class="form-control-file" id="" accept="image/jpeg,application/pdf"></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Remove</button></td></tr>');
            $('#dynamic_field').append('<tr class="mb-3" id="row' + i + '"><td><input type="file" name="proposal_document[]" class="form-control-file" accept="image/jpeg,application/pdf" id=""></td><td style="border: none; text-align:center;"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove" style="width: 100%; text-align: center !important;">- Delete</button></td></tr>');
            if (i == 4) {
                $(this).attr('disabled', 'disabled');
            }
            i++;

        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            i--;
            $('#add').removeAttr('disabled');
        });
        // $('#submit').click(function() {
        //     $.ajax({
        //         url: "name.php",
        //         method: "POST",
        //         data: $('#add_name').serialize(),
        //         success: function(data) {
        //             alert(data);
        //             $('#add_name')[0].reset();
        //         }
        //     });
        // });
    });
</script>

<script>
    $(document).ready(function() {
        $('.revenueCircle').change(function() {
            $(".revenueVillages").find('option').not(':first').remove();
            var id = $('.revenueCircle').val()

            $.ajax({
                url: "{{ route('getVillageName') }}",
                type: "get",
                data: {
                    'id': id
                },
                dataType: 'json',
                beforeSend: function() {},
                success: function(data) {

                    console.log(data);
                    $.each(data, function(i, item) {
                        $('.revenueVillages').append($('<option>', {
                            value: item.id,
                            text: item.village_name
                        }));
                    });
                },
                error: function() {
                    return true;
                }
            })
        });
    });


    $(document).ready(function() {
        $('.revenueVillages').change(function() {
            $(".proposedVill").find('option').not(':last').remove();
            var id = $('.revenueVillages').val()

            $.ajax({
                url: "{{ route('getSuggestedVillages') }}",
                type: "get",
                data: {
                    'id': id
                },
                dataType: 'json',
                beforeSend: function() {},
                success: function(data) {
                    console.log(data);
                    $.each(data, function(i, item) {
                        $('.proposedVill').append($('<option>', {
                            value: item.id,
                            text: item.proposed_name
                        }));
                    });
                },
                error: function() {
                    return true;
                }
            })
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(".block").find('option').not(':first').remove();
        var id = $('.district').val()

        $.ajax({
            url: "{{ route('getBlocksName') }}",
            type: "get",
            data: {
                'id': id,
                'gp_id': '{{Auth::user()->gram_panchayat_id}}'

            },
            dataType: 'json',
            beforeSend: function() {},
            success: function(data) {

                console.log(data[0]);
                $.each(data[1], function(i, item) {
                    $('.block').append($('<option>', {
                        value: item.id,
                        text: item.block_name,
                        selected: true

                    }));
                });
                $.each(data[0], function(i, item) {
                    $('.revenueCircle').append($('<option>', {
                        value: item.id,
                        text: item.circle_name
                    }));
                });
            },
            error: function() {
                return true;
            }
        })

    });

    $(document).ready(function() {
        $(".gp").find('option').not(':first').remove();

        $.ajax({
            url: "{{ route('getGpName') }}",
            type: "get",
            data: {
                'id': '{{Auth::user()->gram_panchayat_id}}'
            },
            dataType: 'json',
            beforeSend: function() {},
            success: function(data) {

                console.log(data);
                $.each(data, function(i, item) {
                    $('.gp').append($('<option>', {
                        value: item.id,
                        text: item.gp_name,
                        selected: true
                    }));
                });
            },
            error: function() {
                return true;
            }
        })

    });

    $(document).on('change', '.category', function() {
        $.ajax({
            url: "{{ route('getCategoryLabel') }}",
            type: "get",
            data: {
                'id': $(this).val()
            },
            dataType: 'json',
            beforeSend: function() {},
            success: function(data) {

                console.log(data);
                $.each(data, function(i, item) {
                    $('#category_label').text(item.category_label);
                });
            },
            error: function() {
                return true;
            }
        });
    });
    $(document).on('change', '.category', function() {
        var cat_id = $(this).val();
        if (cat_id == 3) {
            $('#document_id').slideUp();
        } else {
            $('#document_id').slideDown();

        }
    })


    $(document).on('click', '#action-btn', function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "That you want to submit revenue village data",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#revenue-village-form').submit();
            }
        })
    })
</script>

@endsection