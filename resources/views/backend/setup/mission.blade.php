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
                    <h4 class="card-title border-bottom">Mission Entry</h4>
                    <form method="post"

                          @if(isset($data->id)?$data->id :'')
                          action="{{ route('mission.update', $data->id )}}">
                        <input name="_method" type="hidden" value="PUT">
                        @else
                            action="{{ route('mission.store') }}">
                        @endif

                        @csrf
                        <div class="row border-right">
                            <div class="col-md-12 ">
                                <label>Country<span class="text-danger">*</span></label>
                                <select name="country_id" id="country_id" required class="form-control select2"  >
                                    <option value="">---Select Country---</option>
                                        @foreach($country as $list)
                                            <option value="{{$list->id}}" {{isset($data->country_id) && $data->country_id == $list->id ? 'selected': ''}}>{{$list->country}}</option>
                                        @endforeach

                                </select>
                            </div>
                            <div class="col-md-12  ">
                                <label>Mission<span class="text-danger">*</span></label>
                                <input type="text" name="mission" required
                                       id="mission" class="form-control"
                                       value="{{isset($data->mission)?$data->mission:''}}">
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
                                                       value="Y"   @if(isset($data->status))
                                                    @if($data->status == 'Y'){{"checked"}} @endif
                                                    @endif>
                                                {{--                                            @if(($data['financialYear']->active_yn=='Y') or  old('active_yn')=='Y') {{"checked"}} @endif>--}}
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
                                                       value="N"   @if(isset($data->status))
                                                    @if($data->status == 'N'){{"checked"}} @endif
                                                    @endif>
                                                {{--                                            @if($data['financialYear']->active_yn=='N' or old('active_yn')=='N') {{"checked"}} @endif>--}}
                                                <label
                                                    class="custom-control-label"
                                                    for="active_n">DISABLE</label>
                                            </div>
                                        </fieldset>
                                    </li>
                                </ul>
                            </div>

                            <div class=" d-flex justify-content-end mt-4 ml-4">
                                <button type="reset" class="btn btn-danger text-light main-bg btn-sm"
                                >Cancel
                                </button>
                                @if(isset($data->id))
                                    <button type="submit" class="btn text-light btn-dark btn-sm" style="margin-right: 2px">
                                        Update
                                    </button>
                                @else
                                    <button type="submit" class="btn text-light btn-dark btn-sm" style="margin-right: 2px">
                                        Submit
                                    </button>
                                @endif

                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-md-8">
                    <h4 class="card-title border-bottom">Mission List</h4>
                    <table class="table table-bordered  datatable">
                        <thead>

                        <tr>
                            <th>Sl.</th>
                            <th>Country</th>
                            <th>Mission</th>
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


@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'lBfrtip<"actions">',

                ajax: {
                    url: "{{ route('mission.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},

                    {"data": "country"},
                    {"data": "mission"},
                    {"data": "status"},

                    {data: 'action', name: 'action', orderable: false, searchable: false}
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
