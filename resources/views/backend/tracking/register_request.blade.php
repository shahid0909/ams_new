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
            <div class="d-flex justify-content-between border-bottom">
                <h4 class="card-title ">New Register List</h4>
                <a href="{{route('request-new-user.create')}}">
                    <button type="button" class="btn btn-rounded btn-inverse-dark btn-sm " >
                        <i class="fas fa-plus"></i> <b>Create</b>
                    </button>
                </a>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">

                    <table class="table table-bordered  datatable">
                        <thead>

                        <tr>
                            <th width="2%">Sl.</th>
                            <th>Type</th>
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
                    url: "{{ route('tracking-type.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "tracking_type"},
                    {"data": "active_yn"},
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
