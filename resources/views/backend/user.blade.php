@extends('layouts.backEndDefault')
@section('title')
    User Create
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

            <h4 class="card-title border-bottom">USER CREATE</h4>
            <div class="card-body ">

                <form method="post" enctype="multipart/form-data" action="{{route('user.create')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label>Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" autocomplete="off">
                        </div>

                        <div class="col-md-4">
                            <label>Email<span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" required id="email"autocomplete="off">
                        </div>
                        <div class="col-md-4">
                            <label>Password<span class="text-danger">*</span></label>
                            <input id="password" type="password"
                                   class="form-control" name="password" required
                                   placeholder="Password" autocomplete="new-password" autocomplete="off">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                          </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label>Contact No.<span class="text-danger">*</span></label>
                            <input type="number" name="contactNo" required class="form-control" id="contactNo">
                        </div>
                        @if(Auth::user()->role == 1)

                            <div class="col-md-4">
                                <label>Country<span class="text-danger">*</span></label>
                                <select name="country_id" id="country_id" required class="form-control">
                                    <option value="">---Select Country---</option>
                                    @foreach($country as $list)
                                        <option
                                            value="{{$list->id}}" >{{$list->country}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Mission<span class="text-danger">*</span></label>
                                <select name="mission_id" id="mission_id" required class="form-control">
                                    <option value="">---Select Mission</option>
                                </select>
                            </div>
                        @else
                            <div class="col-md-4">
                                <label>Country<span class="text-danger">*</span></label>
                                <input type="hidden" name="country_id" id="country_id" value="{{$missionlogged->country_id}}">
                                <input type="text" class="form-control" readonly value="{{$missionlogged->country}}">
                            </div>
                            <div class="col-md-4">
                                <label>Mission<span class="text-danger">*</span></label>
                                <input type="hidden" name="mission_id" id="mission_id" value="{{$missionlogged->mission_id}}"
                                       class="form-control">
                                <input type="text" readonly class="form-control" value="{{$missionlogged->mission}}">
                            </div>



                        @endif
                        <div class="col-md-4">
                            <label>Role<span class="text-danger">*</span></label>
                            <select name="role" id="country_id" required class="form-control">
                                @if(Auth::user()->role == 1)
                                <option value="">---Select Role---</option>
                                @endif
                                @foreach($role as $list)
                                    <option value="{{$list->id}}">{{$list->role}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class=" d-flex justify-content-end mt-4">
                        <button type="submit" class="btn text-light btn-dark" style="margin-right: 2px">Submit
                        </button>
                        <button type="reset" class="btn btn-danger text-light main-bg"
                        >Cancel
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">

            <h4 class="card-title ">User List</h4>

            <table class="table table-striped table-hover datatable">
                <tr>
                    <thead>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Role</th>
                    <th>Country</th>
                    <th>Mission</th>
                    <th>Status</th>
                    </thead>

                </tr>

                <tbody>
                </tbody>

            </table>


        </div>
    </div>
@endsection
@section('js')
    <script>

        $('#country_id').on('change', function () {
            var country_id = this.value;

            $("#mission_id").html('');
            $.ajax({
                url: "{{route('user.get-mission-ajax')}}",
                type: "POST",
                data: {
                    country_id: country_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $("#mission_id").empty();
                    $('#mission_id').html('<option value="">-- Select Mission --</option>');
                    $.each(result, function (key, value) {
                        $("#mission_id").append('<option value="' + value
                            .id + '">' + value.mission + '</option>');
                    });

                }
            });
        });
        $(document).ready(function () {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'lBfrtip<"actions">',

                ajax: {
                    url: "{{ route('user.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "name"},
                    {"data": "email"},
                    {"data": "contact_no"},
                    {"data": "role"},
                    {"data": "country"},
                    {"data": "mission"},
                    {"data": "active_yn"},

                ],
                language: {
                    paginate: {

                        next: '<i class="ti-angle-double-right"></i>',
                        previous: '<i class="ti-angle-double-left"></i>'


                    }
                }
            });
        });
    </script>
@endsection
