@extends('layouts.backEndDefault')
@section('title')
    Tracking Type Entry
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
                    <h4 class="card-title border-bottom">Status Entry</h4>
                    <form method="post"

                          @if(isset($data->id)?$data->id :'')
                          action="{{ route('tracking-status.update', $data->id )}}">
                        <input name="_method" type="hidden" value="PUT">
                        @else
                            action="{{route('tracking-status.store')}}">
                        @endif

                        @csrf
                        <div class="row border-right">

                            <div class="col-md-10  ">
                                <label>Status<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="tr_status" autocomplete="off"
                                       id="tr_status" value="{{isset($data->tracking_status)?$data->tracking_status:''}}">
                            </div>

                            <div class="row">
                                <div class=" d-flex justify-content-end mt-4 ml-4">
                                    <button type="reset" class="btn btn-danger text-light main-bg btn-sm"
                                    >Cancel</button>
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

                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <h4 class="card-title border-bottom">Type List</h4>
                    <table class="table table-bordered  datatable">
                        <thead>

                        <tr>
                            <th width="2%">Sl.</th>
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
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'lBfrtip<"actions">',

                ajax: {
                    url: "{{ route('tracking-status.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "tracking_status"},
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
