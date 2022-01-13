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
            <form class="needs-validation" action="{{url("/Gedara/basic_details")}}" novalidate>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom02">Title</label>
                        <select class="form-select" id="validationCustom02" required>
                            <option value="0" selected disabled hidden>Please Select Title</option>
                            <option value="1">Dr.</option>
                            <option value="2">Hon.</option>
                            <option value="3">Mr.</option>
                            <option value="3">Mrs.</option>
                            <option value="3">Ms.</option>
                        </select>

                        <div class="invalid-feedback">
                            Please Select Title
                        </div>
                    </div>
                    <div class="col-md-10 mb-3">
                        <label for="validationCustom01">Full Name</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Mark Anthony" required>
                        <div class="invalid-feedback">
                            Please provide a valid Name.
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Email</label>
                        <input type="email" class="form-control" id="validationCustom03" placeholder="abc@abc.com" required>
                        <div class="invalid-feedback">
                            Please provide a valid Email.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Contact Number</label>
                        <input type="tel" class="form-control" id="validationCustom04" placeholder="0771234567" pattern="[0-9]{10}" required>
                        <div class="invalid-feedback">
                            Please provide a valid Contact Number.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">NIC</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="913363471V" required>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom04">Permanent Address</label>
                        <textarea class="form-control" id="validationCustom04" placeholder="Address"  required>

                        </textarea>

                        <div class="invalid-feedback">
                            Please provide a valid Contact Number.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Date Of Birth</label>
                        <input type="Date" class="form-control" id="validationCustom03"  required>
                        <div class="invalid-feedback">
                            Please provide a valid Date of birth.
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-2 col-6"><a href="/" class="btn w-100 btn-danger btn-round" type="button">Cancel</a></div>
                    <div class="col-md-2 col-6"><button class="btn w-100 btn-warning btn-round" type="submit">Next</button></div>
                </div>


            </form>

            <script>

                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        const title = document.getElementById('validationCustom02');
                        console.log(title.value)
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {

                                if (form.checkValidity() === false) {

                                    if(title.value!=0){
                                        alert('asdsd')
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();
            </script>
        </div>
    </div>
</div>
<footer class="footer-10 text-light mt-3 footer-map footer-fix-bottom">
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
