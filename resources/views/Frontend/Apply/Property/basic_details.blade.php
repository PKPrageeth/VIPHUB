@extends('layout.master')

@section('content')
<div class="container">
    <div class="card text-light mt-5">
        <div class="card-header">
            <h3>Basic Details</h3>
        </div>
        <div class="card-body">
            <form method="post" class="needs-validation" action="{{url("/Gedara/basic_details")}}" novalidate>
                @csrf
                <input type="hidden" value="{{$premium}}" name="premium">
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom02">Title</label>
                        <select name="title" class="form-select" id="validationCustom02" required>
                            <option selected disabled hidden>Please Select Title</option>
                            <option {{ old('title')=='Dr.'?'selected':'' }}>Dr.</option>
                            <option {{ old('title')=='Hon.'?'selected':'' }}>Hon.</option>
                            <option {{ old('title')=='Mr.'?'selected':'' }}>Mr.</option>
                            <option {{ old('title')=='Mrs.'?'selected':'' }}>Mrs.</option>
                            <option {{ old('title')=='Ms.'?'selected':'' }}>Ms.</option>
                        </select>

                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-10 mb-3">
                        <label for="validationCustom01">Full Name</label>
                        <input value="{{ old('fname')}}" type="text" name="fname" class="form-control" id="validationCustom01" placeholder="Full Name" required>
                        @error('fname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Email</label>
                        <input value="{{ old('email')}}" type="email" name="email" class="form-control" id="validationCustom03" placeholder="Email" required>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Contact Number</label>
                        <input value="{{ old('mobile')}}" type="tel" name="mobile" class="form-control" id="validationCustom04" placeholder="Contact Number" pattern="[0-9]{10}" required>
                        @error('mobile')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">NIC</label>
                        <input value="{{ old('nic')}}" type="text" name="nic" class="form-control" id="validationCustom05" placeholder="NIC" required>
                        @error('nic')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom05">Name of Mortgagee</label>
                        <input value="{{ old('mortgagee')}}" type="text" name="mortgagee" class="form-control" id="validationCustom05" placeholder="Name of Mortgagee">
                        @error('mortgagee')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Date Of Birth</label>
                        <input value="{{ old('dob')}}" type="Date" name="dob" class="form-control" id="validationCustom03"  required>
                        @error('dob')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom04">Permanent Address</label>
                        <textarea name="address" class="form-control" id="validationCustom04" placeholder="Permanent Address"  required>{{ old('address')}}</textarea>

                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-2 col-6"><a href="{{url('/')}}" class="btn w-100 btn-danger btn-round" type="button">Cancel</a></div>
                    <div class="col-md-2 col-6"><button class="btn w-100 btn-warning btn-round" type="submit">Next</button></div>
                </div>


            </form>


        </div>
    </div>
</div>
@endsection
