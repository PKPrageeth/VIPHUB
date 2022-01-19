<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">


    <link href="{{asset("/css/style.css")}}" rel="stylesheet">
    <title>VIPHUB</title>
</head>
<body class="bg-dark">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="border-bottom: 2px solid #b8810b">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{asset('/images/VIP-01.png')}}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">HOME</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CONTACTS</a>
                </li>
                {{--                <li class="nav-item dropdown">--}}
                {{--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"--}}
                {{--                       data-bs-toggle="dropdown" aria-expanded="false">--}}
                {{--                        Dropdown--}}
                {{--                    </a>--}}
                {{--                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                {{--                        <li><a class="dropdown-item" href="#">Action</a></li>--}}
                {{--                        <li><a class="dropdown-item" href="#">Another action</a></li>--}}
                {{--                        <li>--}}
                {{--                            <hr class="dropdown-divider">--}}
                {{--                        </li>--}}
                {{--                        <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}

            </ul>

        </div>
    </div>
</nav>
<div class="container">
    <div class="card text-light mt-5">
        <div class="card-header">
            <h3>Basic Details</h3>
        </div>
        <div class="card-body">
            @if(\Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Already  exist</strong>

                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
               <script>
                   $(".alert").fadeTo(2000, 500).slideUp(500, function() {
                       $(".alert").slideUp(500);
                   });
               </script>
            @endif
            <form method="post" class="needs-validation" action="{{url("/hospitalization/basic_details")}}" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="apply">You apply this policy for</label>
                        <select name="apply" class="form-select" id="apply" required>
                            <option selected disabled hidden>Please Select</option>
                            <option {{ old('apply')=='Yourself'?'selected':'' }}>Yourself</option>
                            <option {{ old('apply')=='Child'?'selected':'' }}>Child</option>

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
                        <label for="validationCustom01">Full Name</label>
                        <input type="text" name="Full_Name" value="{{old('Full_Name')}}" class="form-control"
                               id="validationCustom01"
                               placeholder="Mark Anthony" required>
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
                               placeholder="abc@abc.com" required>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Contact Number</label>
                        <input type="tel" name="Contact_Number" value="{{old('Contact_Number')}}" class="form-control"
                               id="validationCustom04"
                               placeholder="0771234567" pattern="[0-9]{10}" required>
                        @error('Contact_Number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label id="niclable" for="nic">NIC</label>
                        <input type="text" name="nic" class="form-control" value="{{old('nic')}}" id="nic"
                               placeholder="913363471V" required>
                        @error('nic')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row Child">
                    <div class="col-md-6 mb-3">
                        <label id="Guardian" for="nic">Name of the Guardian</label>
                        <input type="text" name="Guardian" class="form-control" value="{{old('Guardian')}}"
                               id="Guardian"
                               placeholder="" required>

                    </div>
                    <div class="col-md-6 mb-3">

                        <label for="apply">Relationship</label>
                        <select name="Relationship" class="form-select" id="apply" required>
                            <option selected disabled hidden>Please Select</option>
                            <option {{ old('apply')=='Son'?'selected':'' }}>Son</option>
                            <option {{ old('apply')=='Daughter'?'selected':'' }}>Daughter</option>

                        </select>

                    </div>
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
                        <label for="validationCustom03">Permanent Address</label>
                        <textarea name="Permanent_Address" class="form-control" id="validationCustom04"
                                  placeholder="Address" required>{{old('Permanent_Address')}}</textarea>
                        @error('Permanent_Address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="validationCustom03">Preferred Plan</label>
                            </div>
                            <div class="col-md-8">
                                <input type="hidden" id="premium" name="premium" value="600"/>
                                <div class="form-check form-check-inline">
                                    <input {{($plan=='Plan 1')?"checked ":"disabled"}} checked class="form-check-input"
                                           type="radio" name="plan" id="inlineRadio1" value="Plan 1">
                                    <label class="form-check-label" for="inlineRadio1">Plan 1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input {{($plan=='Plan 2')?"checked ":"disabled"}} class="form-check-input"
                                           type="radio" name="plan" id="inlineRadio2" value="Plan 2">
                                    <label class="form-check-label" for="inlineRadio2">Plan 2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input {{($plan=='Plan 3')?"checked ":"disabled"}} class="form-check-input"
                                           type="radio" name="plan" id="inlineRadio3" value="Plan 3">
                                    <label class="form-check-label" for="inlineRadio3">Plan 3</label>
                                </div>


                            </div>
                        </div>
                        @error('plan')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-borderless table-dark">
                                    <tr>
                                        <td>Daily Allowance for Medical Benefit</td>
                                        <td class="op1">Rs.1,000</td>
                                    </tr>
                                    <tr>
                                        <td>Serious Illness Benefit</td>
                                        <td class="op2">Not applicable</td>
                                    </tr>
                                    <tr>
                                        <td>The cover provide a daily allowance as tabulated above for the period of Hospitalization maximum up to 7 days per event 21 days per annum</td>
                                        <td class="op3"></td>
                                    </tr> <tr>
                                        <td>And reimbursement of Hospitalization benefit in respect of Serious Illness mentioned below up to a maximum of 100,000/- per annum</td>
                                        <td class="op3"></td>
                                    </tr>

                                    <tr>
                                        <td><h6>PREMIUM WITH TAXES</h6></td>
                                        <td class="op5"><h6>Rs.850
                                            </h6></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
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
<footer class="footer-10 text-light mt-3 footer-map ">
    <div class="container">

        <div class="row pb-5 pt-3">
            <div class="col-md-6 col-lg-8 mb-md-0 mb-4">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('/images/VIP-01.png')}}" alt="">
                </a>
                <p class="copyright mb-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    COPYRIGHT @ 2021 VIPHUB. ALL RIGHTS RESEREVED
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>

        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('.Child').hide();
        var plan = "{{$plan}}";
        if ($('#apply').val() == "Child") {

            $('#niclable').text("NIC No of guardian");
            $('.Child').show();
        }
        if (plan === 'Plan 1') {
            $('.op1').text("Rs.1,000");
            $('.op2').text("Not applicable");
            $('.op5').text("Rs.125.00");
            $('#premium').val("125");
        }
        if (plan === 'Plan 2') {
            $('.op1').text("Rs.4,000");
            $('.op2').text("Rs.100,000");

            $('.op5').text("Rs.600.00");
            $('#premium').val("600");
        }
        if (plan === 'Plan 3') {
            $('.op1').text("Rs.6,000");
            $('.op2').text("Rs.100,000");

            $('.op5').text("Rs.850.00");
            $('#premium').val("850");
        }


        $('#inlineRadio1').on('click', function () {
            $('.op1').text("Rs.1,000");
            $('.op2').text("Not applicable");
            $('.op5').text("Rs.125.00");
            $('#premium').val("125");
        });
        $('#inlineRadio2').on('click', function () {
            $('.op1').text("Rs.4,000");
            $('.op2').text("Rs.100,000");

            $('.op5').text("Rs.600.00");
            $('#premium').val("600");
        });
        $('#inlineRadio3').on('click', function () {
            $('.op1').text("Rs.6,000");
            $('.op2').text("Rs.100,000");

            $('.op5').text("Rs.850.00");
            $('#premium').val("850");
        });

        $('#apply').on('change', function () {
            if (this.value == 'Child') {

                $('#niclable').text("NIC No of guardian");
                $('.Child').show();
            } else {
                $('#niclable').text("NIC");
                $('.Child').hide();
            }
        });
    });
</script>

<script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>
