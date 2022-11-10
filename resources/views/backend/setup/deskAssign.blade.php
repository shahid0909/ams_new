@extends('layouts.backEndDefault')
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
    @include('layouts.partials.backend.flashMessage')


    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="card-title border-bottom">Desk Assign
                        @if(Auth::user()->role != 1) for {{$user[0]->zone}} @endif
                    </h4>

                    <form method="post"
                          @if(isset($data->id)?$data->id :'')
                          action="{{ route('schedule.update', $data->id )}}">
                        <input name="_method" type="hidden" value="PUT">
                        @else
                            action="{{ route('schedule.store') }}">
                        @endif
                        @csrf
                        <div class="row border-right">

                            @if(Auth::user()->role == 1)
                                <div class="col-md-12">
                                    <label>Mission<span class="text-danger">*</span></label>
                                    <select name="mission_id" id="mission_id" required class="form-control">
                                        <option value="">---Select Mission---</option>
                                        @foreach($mission as $list)
                                            <option
                                                value="{{$list->id}}" >{{$list->mission}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label>Country<span class="text-danger">*</span></label>
                                    <select name="country_id" id="country_id" required class="form-control">
                                        <option value="">---Select Country---</option>

                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label>Zone<span class="text-danger">*</span></label>
                                    <select name="zone_id" id="zone_id" required class="form-control">

                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label>Desk Officer<span class="text-danger">*</span></label>
                                    <select name="dOfficer" id="dOfficer" required class="form-control">

                                    </select>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <label class="">Desk Officer<span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" required
                                            name="dOfficer" id="dOfficer">
                                        <option value="">---Select One---</option>
                                        @foreach($user as $list)
                                            <option value="{{$list->id}}">{{$list->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
{{--                                <input type="hidden" name="zoneId" value="{{$zone->id}}">--}}
                                @endif
                            <div class="col-md-12">
                                <label class="">Appoinment Type<span class="text-danger">*</span></label>
                                <select type="text" class="form-control" required
                                       name="app_type" id="app_type">
                                    <option value="">---Select One---</option>
                                    @foreach($appoimentType as $list)
                                        <option value="{{$list->id}}">{{$list->appoinment_type}}</option>
                                    @endforeach
                                </select>

                            </div>





                            <div class="col-md-12">
                                <label>Status</label>
                                <ul class="list-unstyled mb-0">
                                    <li class="d-inline-block mr-2 ">
                                        <fieldset>
                                            <div
                                                class="custom-control custom-radio">
                                                <input type="radio"
                                                       class="custom-control-input"
                                                       name="active_yn"
                                                       id="active_y" checked
                                                       value="Y" @if(isset($data->status))
                                                    @if($data->status == 'Y')
                                                        {{"checked"}}

                                                        @endif
                                                    @endif >
                                                {{--                                                @if(($data->status=='Y') or  old('active_yn')=='Y') {{"checked"}} @endif>--}}
                                                <label
                                                    class="custom-control-label"
                                                    for="active_y">ENABLE</label>
                                            </div>
                                        </fieldset>
                                    </li>
                                    <li class="d-inline-block mr-2 ">
                                        <fieldset>
                                            <div
                                                class="custom-control custom-radio">
                                                <input type="radio"
                                                       class="custom-control-input"
                                                       name="active_yn"
                                                       id="active_n"
                                                       value="N"
                                                @if(isset($data->status))
                                                    @if($data->status == 'N'){{"checked"}} @endif
                                                    @endif
                                                >

                                                {{--                                                @if($data->status=='N' or old('active_yn')=='N') {{"checked"}} @endif>--}}
                                                <label
                                                    class="custom-control-label"
                                                    for="active_n">DISABLE</label>
                                            </div>
                                        </fieldset>
                                    </li>
                                </ul>
                            </div>

                            <div class=" d-flex justify-content-end mt-4">
                                <button type="reset" class="btn btn-danger text-light main-bg btn-sm"
                                >Cancel
                                </button>
                                @if(isset($data->id))
                                    <button type="submit" class="btn text-light btn-dark btn-sm"
                                            style="margin-right: 2px">
                                        Update
                                    </button>
                                @else
                                    <button type="submit" class="btn text-light btn-dark btn-sm"
                                            style="margin-right: 2px">
                                        Submit
                                    </button>
                                @endif
                            </div>

                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <h4 class="card-title border-bottom">Desk Assign </h4>
                    <table class="table table-bordered  datatable">
                        <thead>

                        <tr>
                            <th>Sl.</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <br>

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
                url: "{{route('zone.get-country')}}",
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
                url: "{{route('zone.get-zone')}}",
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
        $('#zone_id').on('change', function () {
            var zone_id = this.value;

            $("#dOfficer").html('');
            $.ajax({
                url: "{{route('zone.get-user')}}",
                type: "POST",
                data: {
                    zone_id: zone_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $("#dOfficer").empty();
                    $('#dOfficer').html('<option value="">-- Select Zone --</option>');
                    $.each(result, function (key, value) {
                        $("#dOfficer").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });

                }
            });
        });

        // $("#app_date").datepicker();
        $(function () {
            $("#app_date").datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true,
                autoSize: true,
                minDate: "0d",
                // yearRange: "-60:-10"

            });

        });


    </script>
@endsection
