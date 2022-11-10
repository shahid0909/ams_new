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

            <h4 class="card-title border-bottom">Employee Information</h4>
            <div class="card-body ">

                <form method="post" enctype="multipart/form-data" action="{{route('lemployee.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label>Employee Name<span class="text-danger">*</span></label>
                            <input type="text" name="emp_name" class="form-control" id="emp_name">
                        </div>
                        <div class="col-md-4">
                            <label>Designation<span class="text-danger">*</span></label>
                            <select name="designation" class="form-control" required id="designation">
                                <option value="">---Choose---</option>
                                @foreach($designation as $list)
                                    <option value="{{$list->id}}">{{$list->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Email</label>
                            <input type="email" name="emp_mail" class="form-control" id="emp_mail">
                        </div>
                        <div class="col-md-4">
                            <label>Contact No.<span class="text-danger">*</span></label>
                            <input type="number" name="contactNo" required class="form-control" id="contactNo">
                        </div>
                        <div class="col-md-4">
                            <label>Photo</label>
                            <input type="file" name="photo" class="form-control" id="photo">
                        </div>
                        <div class="col-md-4">
                            <label>Address</label>
                            <textarea type="text" name="address" class="form-control" id="address"></textarea>
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

            <h4 class="card-title ">Employee Information List</h4>


            <table class="table table-hover datatable">
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Address</th>
                    <th>Photo</th>
                </tr>

            </table>


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
                buttons: [

                    {
                        extend: 'excelHtml5',
                        title: 'Department Data',
                        text: '<i class="fa-solid fa-file-excel"></i> Excel',
                        className: "btn btn-primary btn-sm btn-rounded",
                        exportOptions: {
                            columns: ':visible'
                        },
                    },

                    {
                        extend: 'print',
                        title: 'Department Data',
                        alignment: "center",
                        header: true,
                        text: '<i class="fa-solid fa-print"></i> Print',
                        className: "btn btn-success btn-sm btn-rounded",
                        exportOptions: {
                            columns: ':visible',
                            alignment: "center",
                        },
                      
                    },
                    {
                        extend: 'colvis',
                        className: "btn btn-info btn-sm btn-rounded",
                    }
                ],
                ajax: {
                    url: "{{ route('lemployee.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "depertment_name"},
                    {"data": "depertment_location"},
                    {"data": "phone"},
                    {"data": "depertment_image"},
                    // {"data": "status"},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                language: {
                    paginate: {
                        next: '<i class="fa-solid fa-chevron-right"></i>',
                        previous: '<i class="fa-solid fa-chevron-left"></i>'
                    }
                }
            });
        });
        $("#report_id").change(function () {
            let report_id = $("#report_id option:selected").val();
            alert(report_id, "Handler for .change() called.");
        });
    </script>
@endsection
