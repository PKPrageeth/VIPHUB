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
            <h3>Personal Health Declaration (Person Who obtain the cover)</h3>
        </div>
        <div class="card-body">
            <form class="needs-validation" action="{{url("/step3/data/serious_illness")}}" method="post" novalidate
                  enctype='multipart/form-data'>
                @csrf
                <div class="row">
                    <p>Do you suffer from or take any treatment for
                        Please select Yes/No</p>
                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-md-4"><label for="validationCustom01">Any serious illness/disease</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-check form-switch">
                                    <input name="seriousillness" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">

                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-md-4"><label for="validationCustom01">Diabetes/Hypertension</label></div>
                            <div class="col-md-8">
                                <div class="form-check form-switch">
                                    <input name="diabetes_hypertension" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">

                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="col-md-6"></div>

                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-md-4"><label for="validationCustom01">Have you ever undergone any major
                                    surgeries or obtained treatment for major illness during past ten (10)
                                    years? </label></div>
                            <div class="col-md-8">
                                <div class="form-check form-switch">
                                    <input name="majorsurgeries" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">

                                </div>

                            </div>

                        </div>


                    </div>
                    <div class="col-md-6"></div>
                </div>

                <p>If the answer is 'Yes' to any of the above questions, please give details</p>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">Nature of the Illness/Illnesses</div>
                            <div class="col-md-8">
                                <textarea name="nature_of_illness" class="form-control" rows="5" placeholder="Player Details">{{old('nature_of_illness')}}</textarea>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">Type Of surgery</div>
                            <div class="col-md-8">
                                <textarea name="typeofsurgerie" class="form-control" rows="5" placeholder="Player Details">{{old('typeofsurgerie')}}</textarea>

                            </div>
                        </div>
                    </div>
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
                    <div class="col-md-2 col-6"><a href="/" class="btn w-100 btn-danger btn-round"
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
