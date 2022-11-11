@extends('layouts.backEndDefault')
@section('title')
@endsection
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title border-bottom">Reports</h4>
            <form>
            <div class="row">
                <div class="col-md-4">
                    <label>Report Name</label>
                    <select class="form-control" id="report_id" >
                        <option value="">---Choose---</option>
                        <option value="1">Total Appointment</option>
                        <option value="2">Total Served</option>
                        <option value="3">Not Served</option>
                        <option value="4">Type Wise Report</option>
                    </select>
                </div>
                <div class="col-md-4 mt-auto">
                    <select class="form-control" name="report_type" id="report_type">
                        <option value="pdf">Pdf</option>
                        <option value="excel">Excel</option>
                    </select>
                </div>
                <div class="col-md-4 mt-auto">
                    <button type="submit" class="btn btn-dark">Generate Report</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $( "#report_id" ).change(function() {
            let report_id = $("#report_id option:selected").val();
            alert(report_id, "Handler for .change() called." );
        });
    </script>
@endsection
