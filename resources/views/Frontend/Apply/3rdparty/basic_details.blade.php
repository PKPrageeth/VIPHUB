@extends('layout.master')

@section('content')
    <div class="container">
        <div class="card text-light mt-5">
            <div class="card-header">
                <h3>Basic Details</h3>
            </div>
            <div class="card-body">
                <form method="post" class="needs-validation" action="{{url("/thirdparty/basic_details")}}" novalidate>
                    @csrf
                    <input type="hidden" value="{{$premium}}" name="premium">

                    <input type="hidden" value="{{$plan}}" name="plan">
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="validationCustom02">Title</label>
                            <select name="title" class="form-select" id="validationCustom02" required>
                                <option selected disabled hidden>Please Select Title</option>
                                <option>Dr.</option>
                                <option>Hon.</option>
                                <option>Mr.</option>
                                <option>Mrs.</option>
                                <option>Ms.</option>
                            </select>

                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="validationCustom01">Full Name</label>
                            <input type="text" name="Full_Name" value="{{old('Full_Name')}}" class="form-control"
                                   id="validationCustom01" placeholder="Full Name" required>
                            @error('Full_Name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom03">Permanent Address Line1</label>
                            <input placeholder="Permanent Address Line1" value="{{old('Permanent_Address_Line1')}}"
                                   type="text" name="Permanent_Address_Line1" class="form-control"
                                   id="validationCustom03" required>
                            @error('Permanent_Address_Line1')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom04">Permanent Address Line2</label>
                            <input placeholder="Permanent Address Line2" value="{{old('Permanent_Address_Line2')}}"
                                   type="text" name="Permanent_Address_Line2" class="form-control"
                                   id="validationCustom04" required>
                            @error('Permanent_Address_Line2')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom05">Permanent Address Line3</label>
                            <input placeholder="Permanent Address Line3" value="{{old('Permanent_Address_Line3')}}"
                                   type="text" name="Permanent_Address_Line3" class="form-control"
                                   id="validationCustom05" required>
                            @error('Permanent_Address_Line3')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Email</label>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control"
                                   id="validationCustom03" placeholder="Email" required>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">Contact Number</label>
                            <input type="tel" value="{{old('Contact_Number')}}" name="Contact_Number"
                                   class="form-control" id="validationCustom04" placeholder="Contact Number"
                                   pattern="[0-9]{10}" required>
                            @error('Contact_Number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom05">NIC</label>
                            <input type="text" value="{{old('nic')}}" name="nic" class="form-control"
                                   id="validationCustom05" placeholder="NIC" required>
                            @error('nic')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Date Of Birth</label>
                            <input type="Date" value="{{old('dob')}}" name="dob" class="form-control"
                                   id="validationCustom03" required>
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-2 col-6"><a href="{{url('/')}}" class="btn w-100 btn-danger btn-round"
                                                       type="button">Cancel</a></div>
                        <div class="col-md-2 col-6">
                            <button class="btn w-100 btn-warning btn-round" type="submit">Next</button>
                        </div>
                    </div>


                </form>


            </div>
        </div>
    </div>
@endsection
