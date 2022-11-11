@extends('layouts.frontEndDefault')
@section('title')
@endsection
@section('css')
    <style>
        :root {
            --main-bg: #e91e63;
        }

        .main-bg {
            background: linear-gradient(to left, #480048, #C04848) !important;
        }

        input:focus, button:focus {
            border: 1px solid var(--main-bg) !important;
            box-shadow: none !important;
        }

        .form-check-input:checked {
            background-color: var(--main-bg) !important;
            border-color: var(--main-bg) !important;
        }

        .card, .btn, input {
            border-radius: 0 !important;
        }

        .require {
            /*color: red;*/
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="card main-bg">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="card shadow">
                        <div class="card-title  border-bottom">
                            <h2>Mission Appoinmeent</h2>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="country" class="require">Country<span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" name="country_id" id="country_id" required>
                                            <option value="">---Choose---</option>
                                            @foreach($country as $list)
                                                <option value="{{$list->id}}">{{$list->country}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="country" class="require">Mission<span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" name="mission_id" id="mission_id" required>
                                            <option value="">---Choose---</option>

                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>PURPOSE OF APPOINMENT<span class="text-danger">*</span></label>
                                        <select type="text" name="typeapp" required class="form-control" id="typeapp">
                                            <option value="">---Choose---</option>
                                            @foreach($apptype as $list)
                                                <option value="{{$list->id}}">{{$list->appoinment_type}} </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-6 constype" style="display: none">
                                        <label>CONSULATE TYPE<span class="text-danger">*</span></label>
                                        <select type="text" name="consulate_type"  class="form-control" id="consulate_type">
                                            <option value="">---Choose---</option>
                                            @foreach($consulateType as $list)
                                                <option value="{{$list->id}}">{{$list->sub_consular}} </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="require">DATE<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" required
                                               name="app_date" id="app_date">

                                    </div>


                                    <div class="col-md-6">
                                        <label class="require"> FROM TIME<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" required
                                               name="from_time" id="from_time">

                                    </div>
                                    <div class="col-md-6">
                                        <label class="require">TO TIME<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" required
                                               name="to_time" id="to_time">
                                    </div>


                                    <div class="col-md-6">
                                        <label>FIRST NAME<span class="text-danger">*</span></label>
                                        <input type="text" name="fname" class="form-control" required id="fname"
                                               placeholder="Please Input First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>LAST NAME<span class="text-danger">*</span></label>
                                        <input type="text" name="lname" class="form-control" required id="lname"
                                               placeholder="Please Input Last Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>MOBILE NO.<span class="text-danger">*</span></label>
                                        <input type="number" required name="mobile" class="form-control"
                                               id="mobile" placeholder="Please Input Mobile No">
                                    </div>
                                    <div class="col-md-6">
                                        <label>EMAIL<span class="text-danger">*</span></label>
                                        <input type="email" required name="email" class="form-control" id="email"
                                               placeholder="Please Input Email Address">
                                    </div>

                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address" id="address"></textarea>
                                    </div>
                                    <div class=" d-flex justify-content-end mt-4">
                                        <button type="reset" class="btn btn-danger text-light main-bg"
                                                style="margin-right: 2px">Canecl
                                        </button>
                                        <button type="submit" class="btn text-light btn-success">Book Appoinment
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.8.6/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $('#typeapp').on('change', function () {
            var typeapp = this.value;
            if(typeapp ==  3){

                $('.constype').css('display','block');
            } else{
                $('.constype').css('display','none');
            }
        });
        $('#country_id').on('change', function () {
            var country_id = this.value;

            $("#mission_id").html('');
            $.ajax({
                url: "{{route('frontend.get-mission')}}",
                type: "POST",
                data: {
                    country_id: country_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $("#mission_id").empty();
                    $('#mission_id').html('<option value="">-- Select Country --</option>');
                    $.each(result, function (key, value) {
                        $("#mission_id").append('<option value="' + value
                            .id + '">' + value.mission + '</option>');
                    });

                }
            });
        });


        (function () {
            $("#app_date").datepicker();
            $("#from_date").timepicker();
            'use strict'

        })();

    </script>
@endsection
