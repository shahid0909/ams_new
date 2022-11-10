@extends('layouts.backEndDefault')
@section('title')
    AMS Admin
@endsection
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome to {{$user->name}}</h3>
                       </div>

            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12 grid-margin transparent">
            @if($user->role == 1)
            <div class="row">
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Total User</p>
                            <p class="fs-30 mb-2">{{$totaluser->users}}</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Total Appoinmants</p>
                            <p class="fs-30 mb-2">0</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Total Mission</p>
                            <p class="fs-30 mb-2">{{$mission->mission}}</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Total Country</p>
                            <p class="fs-30 mb-2">{{$country->country}}</p>

                        </div>
                    </div>
                </div>


            </div>
            @else
                <div class="row">
                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Total User</p>
                                <p class="fs-30 mb-2">{{$totaluser->users}}</p>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
@section('js')
@endsection
