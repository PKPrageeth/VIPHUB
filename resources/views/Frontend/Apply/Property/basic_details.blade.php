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

    </div>
</nav>
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
                        <input value="{{ old('fname')}}" type="text" name="fname" class="form-control" id="validationCustom01" placeholder="ex:Mark Anthony" required>
                        @error('fname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Email</label>
                        <input value="{{ old('email')}}" type="email" name="email" class="form-control" id="validationCustom03" placeholder="abc@abc.com" required>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Contact Number</label>
                        <input value="{{ old('mobile')}}" type="tel" name="mobile" class="form-control" id="validationCustom04" placeholder="0771234567" pattern="[0-9]{10}" required>
                        @error('mobile')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">NIC</label>
                        <input value="{{ old('nic')}}" type="text" name="nic" class="form-control" id="validationCustom05" placeholder="913363471V" required>
                        @error('nic')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom05">Name of Mortgagee</label>
                        <input value="{{ old('mortgagee')}}" type="text" name="mortgagee" class="form-control" id="validationCustom05" >
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
                        <textarea name="address" class="form-control" id="validationCustom04" placeholder="Address"  required>{{ old('address')}}</textarea>

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
<footer class="footer-10 text-light mt-3 footer-map  ">
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
<script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>
