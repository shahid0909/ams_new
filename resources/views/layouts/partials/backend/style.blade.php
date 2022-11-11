<link rel="stylesheet" href="{{ asset('backend/vendors/feather/feather.css') }}">
<link rel="stylesheet" href="{{ asset('backend/vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('backend/vendors/css/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('backend/vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/js/select.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">

<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('backend/css/vertical-layout-light/style.css') }}">
<!-- endinject -->
<link rel="shortcut icon" href="{{ asset('backend/images/favicon.png') }}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
{{--<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/select2/select2.min.css') }}">--}}
<style>
    /*.modal {*/
    /*    position: fixed;*/
    /*    top: 0;*/
    /*    left: 20%;*/
    /*    z-index: 1050;*/
    /*    display: none;*/
    /*    width: 60%;*/
    /*    height: 100%;*/
    /*    overflow: hidden;*/
    /*    outline: 0;*/
    /*}*/
    div#DataTables_Table_0_length {
        float: left;
    }
    .select2-container--default .select2-selection--single {
        height: 2rem;
        padding: 8px;
    }
    input {
        height: 2.3rem!important;
    }
    select.custom-select.custom-select-sm.form-control.form-control-sm {
        height: 2rem;
        border-radius: 1rem!important;
    }
    .dataTables_filter input.form-control.form-control-sm {
        height: 2rem!important;
        border-radius: 1rem!important;
    }
    .table th, .jsgrid .jsgrid-table th, .table td, .jsgrid .jsgrid-table td {
        padding: 12px;
    }
</style>
