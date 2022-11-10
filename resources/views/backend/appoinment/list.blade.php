@extends('layouts.backEndDefault')
@section('title')
@endsection
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title border-bottom">Appoinment List</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Appoinment No</th>
                        <th>Purpose</th>
                        <th>Country</th>
                        <th>Time</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Dave</td>
                        <td>53275535</td>
                        <td>20 May 2017</td>
                        <td><label class="badge badge-warning">In progress</label></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
