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
                            <h2>Tracking</h2>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">

                                    <div class="col-md-8">
                                        <label>Tracking No<span class="text-danger">*</span></label>
                                        <input type="text" name="tracking_no" class="form-control" required id="tracking_no"
                                               placeholder="Please Input Your Tracking No">
                                    </div>

                                 <div class="col-md-4 mt-4">
                                     <button type="submit" class="btn text-light btn-success">Search
                                     </button>
                                 </div>
                                </div>
                                <br>
                                <br>
                                <br>

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
