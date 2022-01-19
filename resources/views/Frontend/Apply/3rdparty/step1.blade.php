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
            <h3>Details of the Vehicle</h3>
        </div>
        <div class="card-body">
            <form class="needs-validation" action="{{url("/step3/data/thirdparty")}}" method="post" novalidate
                  enctype='multipart/form-data'>
                @csrf
                <div class="row">

                    <div class="col-md-6 mb-3">


                        <label for="validationCustom03">Registration Number</label>
                        <input type="text" name="Registration_Number" class="form-control" id="validationCustom03" required>
                        @error('Registration_Number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03">Make and Model</label>
                        <input type="text" name="model" class="form-control" id="validationCustom03" required>
                        @error('model')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>


                </div>
                <div class="row">

                    <div class="col-md-6 mb-3">


                        <label for="validationCustom03">Engine Number</label>
                        <input type="text" name="Engine_Number" class="form-control" id="validationCustom03" required>
                        @error('Engine_Number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03">Chassis Number/ Frame Number</label>
                        <input type="text" name="Chassis_Number" class="form-control" id="validationCustom03" required>
                        @error('Chassis_Number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>


                </div>
                <div class="row">

                    <div class="col-md-6 mb-3">


                        <label for="validationCustom03">Horse Power/ Cubic Capacity</label>
                        <input type="text" name="Horse_Power" class="form-control" id="validationCustom03" required>
                        @error('Horse_Power')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03">Color</label>
                        <input type="text" name="color" class="form-control" id="validationCustom03" required>
                        @error('color')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>


                </div>
                <div class="row">

                    <div class="col-md-6 mb-3">


                        <label for="validationCustom03">Carrying Capacity</label>
                        <input type="text" name="Carrying_Capacity" class="form-control" id="validationCustom03" required>
                        @error('Carrying_Capacity')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03">Seating Capacity</label>
                        <input type="text" name="seating_capacity" class="form-control" id="validationCustom03" required>
                        @error('seating_capacity')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>


                </div>
                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label for="validationCustom02">Fuel Type</label>
                        <select name="fuel" class="form-select" id="validationCustom02" required>

                            <option>Petrol</option>
                            <option>Diesel.</option>
                            <option>Hybrid</option>
                            <option>Electric</option>
                        </select>

                        @error('fuel')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02">Vehicle Type</label>
                        <select name="Vehicle_Type" class="form-select" id="validationCustom02" required>


                            <option value="Motor Bike">Motor Bike</option>
                            <option value="Three Wheeler">Three Wheeler</option>
                            <option value="Tractors">Tractors</option>
                            <option value="Motor Cars">Motor Cars</option>
                            <option value="Lorry">Lorry</option>
                            <option value="Dual Purpose vehicle private">Dual Purpose vehicle private</option>
                            <option value="Dual Purpose vehicle hiring">Dual Purpose vehicle hiring</option>
                            <option value="Trailers Hand Tractors">Trailers Hand Tractors</option>

                        </select>

                        @error('Vehicle_Type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>


                </div>


                <div class="row">

                    <div class="col-md-6 mb-3">


                        <label for="validationCustom03">Present market value including accessories and spare
                            parts</label>
                        <input type="text" name="market_Value" class="form-control" id="validationCustom03" required>
                        @error('market_Value')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03">Year of make</label>
                        <input type="text" name="yom" class="form-control" id="validationCustom03" required>
                        @error('yom')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>


                </div>
                <div class="row">

                    <div class="col-md-6 mb-3">

                        <div class="row">
                            <div class="col-md-4"><label for="validationCustom01">Is this vehicle at present maintained
                                    free of any damages?</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-check form-switch">
                                    <input name="damages" class="form-check-input" type="checkbox"
                                           id="flexSwitchCheckDefault">

                                </div>
                                @error('damages')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>


                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                Vehicle usage
                            </div>
                            <div class="col-md-8">
                                <div class="form-check">
                                    <input name="usage[]" class="form-check-input" type="checkbox" value="Private"  id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Private
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="usage[]"  class="form-check-input" type="checkbox" value=" Rent a car"  id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Rent a car
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="usage[]"  class="form-check-input" type="checkbox"  id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Transport passengers only
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="usage[]"  class="form-check-input" type="checkbox"  id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Hiring
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="usage[]"  class="form-check-input" type="checkbox" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Transport goods only
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="usage[]"  class="form-check-input" type="checkbox"  id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Transport goods only
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="usage[]"  class="form-check-input" type="checkbox"  id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Transport goods and passengers(both)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="usage[]"  class="form-check-input" type="checkbox"  id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Any other purpose

                                    </label>
                                </div>
                                @error('usage')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">

                    <div class="col-md-6 mb-3">


                        <label for="validationCustom03">Beneficiary Name</label>
                        <input type="text" name="Beneficiary_Name" class="form-control" id="validationCustom03" required>
                        @error('Beneficiary_Name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03">Beneficiary NIC No</label>
                        <input type="text" name="Beneficiary_NIC" class="form-control" id="validationCustom03" required>
                        @error('Beneficiary_NIC')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>


                </div>
                <div class="row">

                    <div class="col-md-6 mb-3">


                        <label for="validationCustom03">Beneficiary Relationship Type</label>
                        <input type="text" name="Beneficiary_Relationship" class="form-control" id="validationCustom03" required>
                        @error('Beneficiary_Relationship')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03">Endorsement Language</label>
                        <input type="text" name="language" class="form-control" id="validationCustom03" required>
                        @error('language')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">

                        <div class="row">
                            <div class="col-md-4"><label for="validationCustom01">Declaration Received</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-check form-switch">
                                    <input name="declaration" class="form-check-input" type="checkbox"
                                           id="flexSwitchCheckDefault">

                                </div>
                                @error('declaration')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>


                    </div>
                    <div class="col-md-6"></div>
                </div>


                <div class="row mt-2">

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">NIC Front Image</div>
                            <div class="file-upload">
                                <button class="btn btn-sm btn-warning w-100" type="button"
                                        onclick="$('.file-upload-input').trigger( 'click' )">Add Image
                                </button>

                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" name="nicf" type='file' onchange="readURL(this);"
                                           accept="image/*"/>
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image"/>
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span
                                                class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                                @error('nicf')
                                <span class="text-danger">The NIC Front Image is required.</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">NIC Back Image</div>

                            <div class="file-upload">
                                <button class="btn btn-sm btn-warning w-100" type="button"
                                        onclick="$('.file-upload-input1').trigger( 'click' )">Add Image
                                </button>

                                <div class="image-upload-wrap1">
                                    <input class="file-upload-input1" name="nicb" type='file'
                                           onchange="readURLNICb(this);"
                                           accept="image/*"/>
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content1">
                                    <img class="file-upload-image1" src="#" alt="your image"/>
                                    <div class="image-title-wrap1">
                                        <button type="button" onclick="removeUpload1()" class="remove-image">Remove <span
                                                class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                                @error('nicb')
                                <span class="text-danger">The NIC Back Image is required.</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">Upload vehicle registration certificate</div>

                            <div class="file-upload">
                                <button class="btn btn-sm btn-warning w-100" type="button"
                                        onclick="$('.file-upload-input2').trigger( 'click' )">Add Image
                                </button>

                                <div class="image-upload-wrap2">
                                    <input class="file-upload-input2" name="vehiC" type='file'
                                           onchange="readURLVehi(this);"
                                           accept="image/*"/>
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content2">
                                    <img class="file-upload-image2" src="#" alt="your image"/>
                                    <div class="image-title-wrap2">
                                        <button type="button" onclick="removeUpload2()" class="remove-image">Remove <span
                                                class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                                @error('vehiC')
                                <span class="text-danger">The vehicle registration certificate is required.</span>
                                @enderror
                            </div>

                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">Receive policy certificate</div>
                            <div class="col-md-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="policy" value="Digital" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Digital
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="policy" value="Hard Copy" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Hard Copy
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="policy" value="Both" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Both
                                    </label>
                                </div>
                                @error('policy')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row mt-2">
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
<script src="">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageUpload").change(function () {
        readURL(this);
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/addItem.js')}}"></script>
</body>
</html>
