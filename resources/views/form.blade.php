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
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Select Category</label>
                    <span class="text-danger">*</span>
                    <select id="" class="form-control category">
                        <option selected disabled>Choose...</option>
                        @foreach($proposerCategory as $cat)
                        <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="" id="category_label">Full Name</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Identity</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Upload Identity</label>
                    <span class="text-danger">*</span>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Select District</label>
                    <span class="text-danger">*</span>
                    <select id="" class="form-control district">
                        <option selected>Choose...</option>
                        @foreach($districts as $dis)
                        <option value="{{$dis-> id}}">{{$dis-> district_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Select Revenue Circle</label>
                    <span class="text-danger">*</span>
                    <select id="" class="form-control revenueCircle">
                        <option selected disabled>Choose...</option>
                        @foreach($revenueCircle as $circle)
                        <option value="{{$circle->id}}">{{$circle-> circle_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Select Village</label>
                    <span class="text-danger">*</span>
                    <select id="" class="form-control revenueVillages">
                        <option selected disabled>Choose...</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Select Block Name</label>
                    <span class="text-danger">*</span>
                    <select id="" class="form-control block">
                        <option selected>Choose...</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Select Grampanchayat</label>
                    <span class="text-danger">*</span>
                    <select id="" class="form-control gp">
                        <option selected>Choose...</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Already Proposed Name(Suggestions)</label>
                    <span class="text-danger">*</span>
                    <select id="" class="form-control proposedVill">
                        <option selected>Choose...</option>
                        <option value="0">Others</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Enter your new proposed name</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Village establishment date</label>
                    <input type="date" class="form-control" id="" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="">Description/Remarks</label>
                <textarea class="form-control" name="" id="" cols="30" rows="3" style="resize: none;"></textarea>
            </div>
            <div class="form-group">
                <div class="table-responsive">
                    <label for="">Add supporting documents</label>
                    <span class="text-danger">*</span>
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <td><input type="file" name="" class="form-control-file" id=""></td>
                            <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>
                        </tr>
                    </table>
                </div>
            </div>
            <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="file" name="name[]" class="form-control-file" id=""></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">-</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
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
        $('.district').change(function() {
            $(".block").find('option').not(':first').remove();
            var id = $('.district').val()

            $.ajax({
                url: "{{ route('getBlocksName') }}",
                type: "get",
                data: {
                    'id': id
                },
                dataType: 'json',
                beforeSend: function() {},
                success: function(data) {

                    console.log(data[0]);
                    $.each(data[1], function(i, item) {
                        $('.block').append($('<option>', {
                            value: item.id,
                            text: item.block_name
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
    });

    $(document).ready(function() {
        $('.block').change(function() {
            $(".gp").find('option').not(':first').remove();
            var id = $('.block').val()

            $.ajax({
                url: "{{ route('getGpName') }}",
                type: "get",
                data: {
                    'id': id
                },
                dataType: 'json',
                beforeSend: function() {},
                success: function(data) {

                    console.log(data);
                    $.each(data, function(i, item) {
                        $('.gp').append($('<option>', {
                            value: item.id,
                            text: item.gp_name
                        }));
                    });
                },
                error: function() {
                    return true;
                }
            })
        });
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
</script>

</html>