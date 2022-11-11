@extends('layouts.backEndDefault')
@section('title')
    User Create
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

            <h4 class="card-title border-bottom">USER PROFILE</h4>
            <div class="card-body ">

                <form class="form" method="post" action="{{ route('user.change_password') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-4">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                  value="{{$loggedUser->name}}" readonly autocomplete="off">
                        </div>

                        <div class="col-md-4">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                   readonly id="email"autocomplete="off" value="{{$loggedUser->email}}">
                        </div>


                        <div class="col-md-4">
                            <label>Contact No.</label>
                            <input type="number" name="contactNo" readonly class="form-control"
                                   id="contactNo"value="{{$loggedUser->contact_no}}">
                        </div>

                            <div class="col-md-4">
                                <label>Country</label>
                                   <input type="text" class="form-control" readonly value="{{$loggedUser->country}}">
                            </div>
                            <div class="col-md-4">
                                <label>Mission</label>

                                <input type="text" readonly class="form-control" value="{{$loggedUser->mission}}">
                            </div>




                        <div class="col-md-4">
                            <label>Role</label>
                            <input name="role" id="country_id" readonly class="form-control" value="{{$loggedUser->role}}">

                        </div>
                        <div class="col-md-4">
                            <label>Password<span class="text-danger">*</span></label>
                            <input id="password" type="password"
                                   class="form-control" name="password" required
                                   placeholder="Password" autocomplete="new-password" autocomplete="off">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                          </span>
                            @enderror
                        </div>

                    </div>
                    <div class=" d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-danger text-light main-bg" style="margin-right: 2px">Update
                        </button>


                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection
