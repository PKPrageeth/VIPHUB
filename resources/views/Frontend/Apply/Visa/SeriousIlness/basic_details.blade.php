@extends('layout.master')

@section('content')
    <div class="container">
        <div class="card text-light mt-5">
            <div class="card-header">
                <h3>Basic Details</h3>
            </div>
            <div class="card-body">
                @if(\Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>NIC already exsist</strong>

                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                            crossorigin="anonymous"></script>
                    <script>
                        $(".alert").fadeTo(2000, 500).slideUp(500, function () {
                            $(".alert").slideUp(500);
                        });
                    </script>
                @endif
                <form method="post" class="needs-validation" action="{{url("/visa/basic_details")}}" novalidate>
                    @csrf
                    <input type="hidden" value="{{$premium}}" name="premium">
                    <input type="hidden" value="{{$plan}}" name="plan">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="apply">You apply this policy for</label>
                            <select name="apply" class="form-select" id="apply" required>
                                <option selected disabled hidden>Please Select</option>
                                <option {{ old('apply')=='Yourself'?'selected':'' }}>Yourself</option>
                                <option {{ old('apply')=='Child'?'selected':'' }}>Child</option>
                                <option {{ old('apply')=='Spouse'?'selected':'' }}>Spouse</option>
                                <option {{ old('apply')=='Parent'?'selected':'' }}>Parent</option>

                            </select>

                            @error('apply')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
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
                            <label for="validationCustom01">Full Name of the Insured</label>
                            <input type="text" name="Full_Name" value="{{old('Full_Name')}}" class="form-control"
                                   id="validationCustom01"
                                   placeholder="Full Name" required>
                            @error('Full_Name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Email</label>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control"
                                   id="validationCustom03"
                                   placeholder="Email" required>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">Contact Number</label>
                            <input type="tel" name="Contact_Number" value="{{old('Contact_Number')}}"
                                   class="form-control"
                                   id="validationCustom04"
                                   placeholder="Contact Numbe" pattern="[0-9]{10}" required>
                            @error('Contact_Number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label id="niclable" for="nic">NIC</label>
                            <input type="text" name="nic" class="form-control" value="{{old('nic')}}" id="nic"
                                   placeholder="NIC" required>
                            @error('nic')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row Child">


                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Date Of Birth</label>
                            <input type="Date" name="dob" class="form-control" value="{{old('dob')}}"
                                   id="validationCustom03" required>
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Address of the Insured</label>
                            <textarea name="Permanent_Address" class="form-control" id="validationCustom04"
                                      placeholder="Permanent Address" required>{{old('Permanent_Address')}}</textarea>
                            @error('Permanent_Address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="row Child">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom03">Beneficiary Name</label>
                            <input type="text" name="beneficiary_name" value="{{old('beneficiary_name')}}" class="form-control bb"
                                   id="validationCustom03"
                                   placeholder="Beneficiary Name" required>
                            @error('beneficiary_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom04">Beneficiary Contact No</label>
                            <input type="text" name="Beneficiary_Contact_Number" value="{{old('Beneficiary_Contact_Number')}}"
                                   class="form-control bb"
                                   id="validationCustom04"
                                   placeholder="Beneficiary Contact Number" required>
                            @error('Beneficiary_Contact_Number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label id="niclable" for="nic">Beneficiary Email</label>
                            <input type="text" name="Beneficiary_Email" class="form-control bb" value="{{old('Beneficiary_Email')}}" id="nic"
                                   placeholder="Beneficiary Email" required>
                            @error('Beneficiary_Email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row Child">
                        <div class="col-md-4 mb-3">

                                <label for="apply">Relationship</label>
                                <select name="Relationship" class="form-select" id="apply" required>
                                    <option selected disabled hidden>Please Select</option>
                                    <option {{ old('apply')=='Son'?'selected':'' }}>Son</option>
                                    <option {{ old('apply')=='Daughter'?'selected':'' }}>Daughter</option>
                                    <option {{ old('apply')=='Father'?'selected':'' }}>Father</option>
                                    <option {{ old('apply')=='Mother'?'selected':'' }}>Mother</option>
                                    <option {{ old('apply')=='Husband'?'selected':'' }}>Husband</option>
                                    <option {{ old('apply')=='Wife'?'selected':'' }}>Wife</option>

                                </select>

                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom04">Beneficiary DOB</label>
                            <input type="date" name="beneficiary_dob" value="{{old('beneficiary_dob')}}"
                                   class="form-control bb"
                                   id="validationCustom04"
                                   placeholder="Beneficiary Contact Number" required>
                            @error('beneficiary_dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="bnic" id="niclable" for="nic">Beneficiary NIC</label>
                            <input type="email" name="Beneficiary_NIC" class="form-control bnic bb" value="{{old('Beneficiary_NIC')}}" id="bnic"
                                   placeholder="Beneficiary NIC" required>
                            @error('Beneficiary_NIC')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


{{--                    <div class="row">--}}
{{--                        <div class="col-md-6 mb-3">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <label for="validationCustom03">Preferred Plan</label>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-8">--}}

{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        <input {{($plan=='Plan 1')?"checked ":"disabled"}} checked--}}
{{--                                               class="form-check-input"--}}
{{--                                               type="radio" name="plan" id="inlineRadio1" value="Plan 1">--}}
{{--                                        <label class="form-check-label" for="inlineRadio1">Plan 1</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        <input {{($plan=='Plan 2')?"checked ":"disabled"}} class="form-check-input"--}}
{{--                                               type="radio" name="plan" id="inlineRadio2" value="Plan 2">--}}
{{--                                        <label class="form-check-label" for="inlineRadio2">Plan 2</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        <input {{($plan=='Plan 3')?"checked ":"disabled"}} class="form-check-input"--}}
{{--                                               type="radio" name="plan" id="inlineRadio3" value="Plan 3">--}}
{{--                                        <label class="form-check-label" for="inlineRadio3">Plan 3</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        <input {{($plan=='Plan 4')?"checked ":"disabled"}} class="form-check-input"--}}
{{--                                               type="radio" name="plan" id="inlineRadio4" value="Plan 4">--}}
{{--                                        <label class="form-check-label" for="inlineRadio4">Plan 4</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        <input {{($plan=='Plan 5')?"checked ":"disabled"}} class="form-check-input"--}}
{{--                                               type="radio" name="plan" id="inlineRadio5" value="Plan 5">--}}
{{--                                        <label class="form-check-label" for="inlineRadio5">Plan 5</label>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @error('plan')--}}
{{--                            <span class="text-danger">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            --}}{{--                        <div class="card">--}}
{{--                            --}}{{--                            <div class="card-body">--}}
{{--                            --}}{{--                                <table class="table table-borderless table-dark">--}}
{{--                            --}}{{--                                    <tr>--}}
{{--                            --}}{{--                                        <td>Hospitalization Benefit within Sri Lanka - Annual/Event Limit</td>--}}
{{--                            --}}{{--                                        <td class="op1">Rs.100,000</td>--}}
{{--                            --}}{{--                                    </tr>--}}
{{--                            --}}{{--                                    <tr>--}}
{{--                            --}}{{--                                        <td>Total Hospital room charges including admission fees per event</td>--}}
{{--                            --}}{{--                                        <td class="op2">Rs.30,000</td>--}}
{{--                            --}}{{--                                    </tr>--}}
{{--                            --}}{{--                                    <tr>--}}
{{--                            --}}{{--                                        <td>Specialized services per event</td>--}}
{{--                            --}}{{--                                        <td class="op3">Rs.20,000</td>--}}
{{--                            --}}{{--                                    </tr>--}}
{{--                            --}}{{--                                    <tr>--}}
{{--                            --}}{{--                                        <td>All other expenses including, Surgeon's & Doctor' charges, Operational--}}
{{--                            --}}{{--                                            expenses, Medical Expenses and Emergency,Transport per Event--}}
{{--                            --}}{{--                                        </td>--}}
{{--                            --}}{{--                                        <td class="op4">Rs.50,000</td>--}}
{{--                            --}}{{--                                    </tr>--}}
{{--                            --}}{{--                                    <tr>--}}
{{--                            --}}{{--                                        <td><h6>PREMIUM WITH TAXES</h6></td>--}}
{{--                            --}}{{--                                        <td class="op5"><h6>Rs.600--}}
{{--                            --}}{{--                                            </h6></td>--}}
{{--                            --}}{{--                                    </tr>--}}
{{--                            --}}{{--                                </table>--}}
{{--                            --}}{{--                            </div>--}}
{{--                            --}}{{--                        </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('.Child').hide();

        var plan = "{{$plan}}";
        if ($('#apply').val() == "Child") {

            $('.bnic').hide();
            $('.Child').show();
        } if($('#apply').val() == "Spouse"){

            $('.Child').show();
            $('.bnic').show();
        }
        if($('#apply').val() == "Parent"){
            $('.Child').show();
            $('.bnic').show();

        }
        if (plan === 'Plan 1') {
            $('.op1').text("Rs.100,000");
            $('.op2').text("Rs.30,000");
            $('.op3').text("Rs.20,000");
            $('.op4').text("Rs.50,000");
            $('.op5').text("Rs.600");
            $('#premium').val("600");
        }
        if (plan === 'Plan 2') {
            $('.op1').text("Rs.200,000");
            $('.op2').text("Rs.60,000");
            $('.op3').text("Rs.40,000");
            $('.op4').text("Rs.100,000");
            $('.op5').text("Rs.1,050");
            $('#premium').val("1050");
        }
        if (plan === 'Plan 3') {
            $('.op1').text("Rs.300,000");
            $('.op2').text("Rs.90,000");
            $('.op3').text("Rs.60,000");
            $('.op4').text("Rs.150,000");
            $('.op5').text("Rs.1,450");
            $('#premium').val("1450");
        }
        if (plan === 'Plan 4') {
            $('.op1').text("Rs.400,000");
            $('.op2').text("Rs.120,000");
            $('.op3').text("Rs.80,000");
            $('.op4').text("Rs.200,000");
            $('.op5').text("Rs.2,000");
            $('#premium').val("2000");
        }
        if (plan === 'Plan 5') {
            $('.op1').text("Rs.500,000");
            $('.op2').text("Rs.150,000");
            $('.op3').text("Rs.100,000");
            $('.op4').text("Rs.250,000");
            $('.op5').text("Rs.2,350");
            $('#premium').val("2350");
        }

        $('#inlineRadio1').on('click', function () {
            $('.op1').text("Rs.100,000");
            $('.op2').text("Rs.30,000");
            $('.op3').text("Rs.20,000");
            $('.op4').text("Rs.50,000");
            $('.op5').text("Rs.600");
            $('#premium').val("600");
        });
        $('#inlineRadio2').on('click', function () {
            $('.op1').text("Rs.200,000");
            $('.op2').text("Rs.60,000");
            $('.op3').text("Rs.40,000");
            $('.op4').text("Rs.100,000");
            $('.op5').text("Rs.1,050");
            $('#premium').val("1050");
        });
        $('#inlineRadio3').on('click', function () {
            $('.op1').text("Rs.300,000");
            $('.op2').text("Rs.90,000");
            $('.op3').text("Rs.60,000");
            $('.op4').text("Rs.150,000");
            $('.op5').text("Rs.1,450");
            $('#premium').val("1450");
        });
        $('#inlineRadio4').on('click', function () {
            $('.op1').text("Rs.400,000");
            $('.op2').text("Rs.120,000");
            $('.op3').text("Rs.80,000");
            $('.op4').text("Rs.200,000");
            $('.op5').text("Rs.2,000");
            $('#premium').val("2000");
        });
        $('#inlineRadio5').on('click', function () {
            $('.op1').text("Rs.500,000");
            $('.op2').text("Rs.150,000");
            $('.op3').text("Rs.100,000");
            $('.op4').text("Rs.250,000");
            $('.op5').text("Rs.2,350");
            $('#premium').val("2350");
        });
        $('#apply').on('change', function () {
            if (this.value == 'Child') {


                $('.Child').show();
                $('.bnic').hide();
            } else if(this.value == 'Yourself') {

                $('.Child').hide();
                $('.bb').val('');
            }else{
                $('.Child').show();
                $('.bnic').show();

            }
        });
    });
</script>

<script src="{{asset('js/bootstrap.js')}}"></script>

