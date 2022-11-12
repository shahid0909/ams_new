@extends('layouts.backEndDefault')
@section('title')
@endsection
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title border-bottom">Reports</h4>
            <form id="report">
                @csrf
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
                            <option value="pdf" selected>Pdf</option>
                            <option value="excel">Excel</option>
                        </select>
                    </div>
                    <div class="col-md-4 mt-auto">
                        <button type="submit" id="submit" class="btn btn-dark">Generate Report</button>
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
            // alert(report_id, "Handler for .change() called." );
        });
        $(document).ready(function () {

            $(document).on('submit', '#report', function(){
                let report_id = $('#report_id').val();
                let data = '';
                if (report_id === '1'){
                    $.ajax({
                        type: 'get',
                        url: '{{ route('appoinment.report_generate') }}',
                        data: data,
                        success: function(response){
                            console.log(response);
                        },
                        error: function(blob){
                            console.log(blob);
                        }
                    });
                }else {
                    alert('No Report Available For This!!');
                }
            });

            let myNewURL = refineURL();

//here you pass the new URL extension you want to appear after the domains '/'. Note that the previous identifiers or "query string" will be replaced.
            window.history.pushState("object or string", "Title", "/" + myNewURL );

            function refineURL()
            {
                //get full URL
                let currURL= window.location.href; //get current address

                //Get the URL between what's after '/' and befor '?'
                //1- get URL after'/'
                let afterDomain= currURL.substring(currURL.lastIndexOf('/') + 1);
                //2- get the part before '?'
                let beforeQueryString= afterDomain.split("?")[0];

                return beforeQueryString;
            }
        })
    </script>
@endsection
