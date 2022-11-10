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
                            <h2>Mission</h2>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="country" class="require">MISSION<span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" name="mission_id" id="mission_id" required>
                                            <option value="">---Choose---</option>
                                            @foreach($mission as $list)
                                                <option value="{{$list->id}}">{{$list->mission}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="country" class="require">COUNTRY<span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" name="country_id" id="country_id" required>
                                            <option value="">---Choose---</option>

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="country" class="require">ZONE<span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" name="zone_id" id="zone_id" required>
                                            <option value="">---Choose---</option>

                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                       <a href="#"> <button class="btn btn-primary">Next</button></a>
                                    </div>
{{--                                    <div class="col-md-6">--}}
{{--                                        <label>PURPOSE OF APPOINMENT<span class="text-danger">*</span></label>--}}
{{--                                        <select type="text" name="typeapp" required class="form-control" id="typeapp">--}}
{{--                                            <option value="">---Choose---</option>--}}
{{--                                            @foreach($apptype as $list)--}}
{{--                                                <option value="{{$list->id}}">{{$list->appoinment_type}} </option>--}}
{{--                                            @endforeach--}}

{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <label class="require">DATE<span class="text-danger">*</span></label>--}}
{{--                                        <input type="text" class="form-control" required--}}
{{--                                               name="app_date" id="app_date">--}}

{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <label class="require">TIME ZONE<span class="text-danger">*</span></label>--}}
{{--                                        <input type="text" class="form-control" required--}}
{{--                                               name="time_zone" id="time_zone">--}}

{{--                                    </div>--}}

{{--                                    <div class="col-md-6">--}}
{{--                                        <label class="require"> FROM TIME<span class="text-danger">*</span></label>--}}
{{--                                        <input type="text" class="form-control" required--}}
{{--                                               name="from_time" id="from_time">--}}

{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <label class="require">TO TIME<span class="text-danger">*</span></label>--}}
{{--                                        <input type="text" class="form-control" required--}}
{{--                                               name="to_time" id="to_time">--}}
{{--                                    </div>--}}


{{--                                    <div class="col-md-6">--}}
{{--                                        <label>FIRST NAME<span class="text-danger">*</span></label>--}}
{{--                                        <input type="text" name="fname" class="form-control" required id="fname"--}}
{{--                                               placeholder="Please Input First Name">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <label>LAST NAME<span class="text-danger">*</span></label>--}}
{{--                                        <input type="text" name="lname" class="form-control" required id="lname"--}}
{{--                                               placeholder="Please Input Last Name">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <label>MOBILE NO.<span class="text-danger">*</span></label>--}}
{{--                                        <input type="number" required name="mobile" class="form-control"--}}
{{--                                               id="mobile" placeholder="Please Input Mobile No">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <label>EMAIL<span class="text-danger">*</span></label>--}}
{{--                                        <input type="email" required name="email" class="form-control" id="email"--}}
{{--                                               placeholder="Please Input Email Address">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-12">--}}
{{--                                        <label>Address</label>--}}
{{--                                        <textarea class="form-control" name="address" id="address"></textarea>--}}
{{--                                    </div>--}}
{{--                                    <div class=" d-flex justify-content-end mt-4">--}}
{{--                                        <button type="reset" class="btn btn-danger text-light main-bg"--}}
{{--                                                style="margin-right: 2px">Canecl--}}
{{--                                        </button>--}}
{{--                                        <button type="submit" class="btn text-light btn-success">Book Appoinment--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


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
        $('#mission_id').on('change', function () {
            var mission_id = this.value;

            $("#country_id").html('');
            $.ajax({
                url: "{{route('frontend.get-country')}}",
                type: "POST",
                data: {
                    mission_id: mission_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $("#country_id").empty();
                    $('#country_id').html('<option value="">-- Select Country --</option>');
                    $.each(result, function (key, value) {
                        $("#country_id").append('<option value="' + value
                            .id + '">' + value.country + '</option>');
                    });

                }
            });
        });
        $('#country_id').on('change', function () {
            var country_id = this.value;

            $("#zone_id").html('');
            $.ajax({
                url: "{{route('frontend.get-zone')}}",
                type: "POST",
                data: {
                    country_id: country_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $("#zone_id").empty();
                    $('#zone_id').html('<option value="">-- Select Zone --</option>');
                    $.each(result, function (key, value) {
                        $("#zone_id").append('<option value="' + value
                            .id + '">' + value.zone + '</option>');
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
