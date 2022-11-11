@extends('layouts.backEndDefault')

@section('title')

@endsection

@section('css')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'>
    <link rel="stylesheet" href="{{ asset('backend/css/user_profile.css') }}">
@endsection

@section('content')
    <div class="background"></div>
    <div class="profile-card">
        <div class="cover"></div>
        <div class="profile">
{{--            <div class="pic"></div>--}}
            <div class="above-fold">
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
                <div class="name">
                    {{ $user->name }}
                </div>
                <div class="role">
                    {{ $user->email }}
                </div>
                <div class="location">
                    <i class="fas fa-map-marker-alt"></i>Gouda, the Netherlands
                </div>
                <div class="row">
                    <button class="btn btn-sm btn-outline-success mr-4" id="edit" data-bs-toggle="modal" data-bs-target="#edit_profile">
                        <i class="fas fa-edit"></i> Update Password
                    </button>
                    {{--                    <button class="btn btn-sm btn-outline-success">--}}
                    {{--                        <i class="fas fa-paper-plane"></i> Message To User--}}
                    {{--                    </button>--}}
                </div>
                <div id="expand-button">
                    <i class="fas fa-arrow-down"></i>
                </div>
            </div>


            </div>
        </div>
    </div>
    {{--    <div class="col-md-6 grid-margin stretch-card">--}}
    {{--        <div class="card">--}}
    {{--            <div class="card-body">--}}
    {{--                <h4 class="card-title">User Profile</h4>--}}

    {{--                <form class="forms-sample">--}}
    {{--                    <div class="form-group">--}}
    {{--                        <label for="exampleInputUsername1">Username</label>--}}
    {{--                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username">--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group">--}}
    {{--                        <label for="exampleInputEmail1">Email address</label>--}}
    {{--                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group">--}}
    {{--                        <label for="exampleInputPassword1">Password</label>--}}
    {{--                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group">--}}
    {{--                        <label for="exampleInputConfirmPassword1">Confirm Password</label>--}}
    {{--                        <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">--}}
    {{--                    </div>--}}
    {{--                    <div class="form-check form-check-flat form-check-primary">--}}
    {{--                        <label class="form-check-label">--}}
    {{--                            <input type="checkbox" class="form-check-input">--}}
    {{--                            Remember me--}}
    {{--                        </label>--}}
    {{--                    </div>--}}
    {{--                    <button type="submit" class="btn btn-primary mr-2">Submit</button>--}}
    {{--                    <button class="btn btn-light">Cancel</button>--}}
    {{--                </form>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <!-- Modal -->
    <div class="modal fade" id="edit_profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <form class="form" method="post" action="{{ route('user.change_password') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update User Password</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="name">Username</label>--}}
                        {{--                            <input type="text" id="name" class="form-control" readonly placeholder="Username" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}
                        {{--                            @error('name')--}}
                        {{--                                <span class="invalid-feedback" role="alert">--}}
                        {{--                                    <strong>{{ $message }}</strong>--}}
                        {{--                                </span>--}}
                        {{--                            @enderror--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="email">Email address</label>--}}
                        {{--                            <input type="email" class="form-control" readonly @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
                        {{--                            @error('email')--}}
                        {{--                                <span class="invalid-feedback" role="alert">--}}
                        {{--                                    <strong>{{ $message }}</strong>--}}
                        {{--                                </span>--}}
                        {{--                            @enderror--}}
                        {{--                        </div>--}}
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input id="current_password" type="password" class="form-control" @error('new_password') is-invalid @enderror" placeholder="Current Password" name="current_password" autocomplete="current-password">
                            @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password">Password</label>
                            <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" autocomplete="new_password" placeholder="New Password">
                            @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>
                        {{--                        <button type="submit" class="btn btn-primary mr-2">Submit</button>--}}
                        {{--                        <button class="btn btn-light">Cancel</button>--}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-outline-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#expand-button').click(function() {
            $('.profile-card').toggleClass('expand');
        })
        {{--$(document).on('click', '#edit', function () {--}}
        {{--    let form = $('.modal').find('.form');--}}
        {{--    $.ajax({--}}
        {{--        url: "{{ route('user.profile-edit') }}",--}}
        {{--        type: "POST",--}}
        {{--        data : {"_token":"{{ csrf_token() }}"},--}}
        {{--        dataType: "json",--}}
        {{--        success: function (res) {--}}
        {{--            console.log(res.user.email)--}}
        {{--            $('input#name').val(res.user.name);--}}
        {{--            $('input#email').val(res.user.email);--}}
        {{--        }--}}
        {{--    });--}}
        {{--})--}}
    </script>
@endsection
