@extends('layouts.backEndDefault')
@section('title')
    Register Request Create
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
        .form-control{
            height: 2.3rem;
        }
    </style>
@endsection
@section('content')
    @include('layouts.partials.backend.flashMessage')


    <div class="card">

        <div class="card-body">
            <div class="d-flex justify-content-between border-bottom">
                <h4 class="card-title ">New Register Create</h4>
                <a href="{{route('request-new-user.index')}}">
                    <button type="button" class="btn btn-rounded btn-inverse-dark btn-sm " >
                        <i class="fas fa-minus"></i> <b>Back</b>
                    </button>
                </a>
            </div>
<form method="post" action="{{route('request-new-user.store')}}">
    @csrf
            <div class="row mt-4">
                <input type="hidden" name="tracking_no" value="{{$tracking_no}}">
                <input type="hidden" name="mission_id" value="{{Auth::user()->mission_id}}">
                <div class="col-md-4">
                    <label>Tracking Type<span class="text-danger">*</span></label>
                   <select  class="form-control" name="tracking_type" required id="tracking_type">
                       <option value="">---Select One---</option>
                       @foreach($tracking_type as $list)
                           <option value="{{$list->id}}">{{$list->tracking_type}}</option>
                       @endforeach
                   </select>
                </div>
                <div class="col-md-4">
                    <label>Passport No<span class="text-danger">*</span></label>
                    <input type="text" name="passport_no" id="passport_no" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <label>Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <label>Email<span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <label>Contact No<span class="text-danger">*</span></label>
                    <input type="number" name="contact_no" id="contact_no" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <label>Date of Birth<span class="text-danger">*</span></label>
                    <input type="text" name="dob" id="dob" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <label>Consular Fee<span class="text-danger">*</span></label>
                    <input type="number" name="consulate_fee" id="consulate_fee" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <label>Address</label>
                    <textarea class="form-control" name="address" id="address"></textarea>
                </div>
            </div>
            <div class=" d-flex justify-content-end mt-4">
                <button type="reset" class="btn btn-danger text-light main-bg btn-sm"
                >Cancel
                </button>
                @if(isset($data->id))
                    <button type="submit" class="btn text-light btn-dark btn-sm"
                            style="margin-right: 2px">
                        Update
                    </button>
                @else
                    <button type="submit" class="btn text-light btn-dark btn-sm"
                            style="margin-right: 2px">
                        Submit
                    </button>
                @endif
            </div>
</form>
        </div>
    </div>
    <br>

@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#dob").datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true,
                autoSize: true,
                // minDate: "0d",
                // yearRange: "-60:-10"

            });

        });
    </script>
@endsection
