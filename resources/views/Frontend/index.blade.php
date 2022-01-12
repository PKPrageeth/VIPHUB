<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet"
    >


    <link href="{{asset("/css/style.css")}}" rel="stylesheet">
    <title>VIP HUB</title>
</head>
<body class="bg-dark">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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


<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('/images/slider/slider1.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('/images/slider/slider2.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('/images/slider/slider3.jpg')}}" class="d-block w-100" alt="...">
        </div>
    </div>
    {{--    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">--}}
    {{--        <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
    {{--        <span class="visually-hidden">Previous</span>--}}
    {{--    </button>--}}
    {{--    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">--}}
    {{--        <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
    {{--        <span class="visually-hidden">Next</span>--}}
    {{--    </button>--}}
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-center mt-2">
                    <a href="/" class="w-100 d-flex justify-content-center text-decoration-none">
                        <button
                            class="btn btn-block w-100 @if($active=='all')btn-warning @else btn-outline-warning @endif ">
                            ALL
                        </button>
                    </a>


                </div>
                @foreach($category as $item)
                    <div class="col d-flex justify-content-center mt-2">
                        <a href="/index/{{$item['insuranceCategory']}}"
                           class="w-100 d-flex justify-content-center text-decoration-none">
                            <button
                                class="btn btn-block w-100 @if($active==$item['insuranceCategory'])btn-warning @else btn-outline-warning @endif ">   {{$item['insuranceCategory']}}</button>

                        </a>


                    </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        @foreach($all as $item)

            <div class="col-md-3 col-6 d-flex align-items-stretch">

                <div class="card mb-3 w-100">
                    <a class="w-100 text-decoration-none" data-bs-toggle="modal"
                       data-bs-target="#detail_{{$item['sku']}}">
                        <img src="{{asset('/images/coverimage.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-light">{{$item['displayName']}}</h5>

                        </div>
                        <div class="card-footer">
                            <p class="card-text text-warning d-flex mt-auto">LKR. {{$item['premium']}} </p>
                        </div>
                    </a>
                </div>


            </div>
            <div class="modal  fade" id="detail_{{$item['sku']}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg bg-dark ">
                    <div class="modal-content bg-dark ">
                        <div class="modal-body">
                            <div class="card text-light">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{asset('/images/coverimage.jpg')}}" class="w-100" alt="...">
                                    </div>
                                    <div class="col-md-6">
                                        <h2>{{$item['displayName']}}</h2>
                                        <p>{{$item['insurancePlan']}}</p>
                                        <h3>LKR. {{$item['premium']}}</h3>
                                        <p>{{$item['recurrenceInterval']}}</p>

                                        <div style=" border-top: 1px solid #f58a23;"></div>
                                        @foreach($item['policyShortDescription'] as $des)
                                            <p>{{$des}}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="/basic_details" class="btn btn-primary">
                                Buy Now
                            </a>

                        </div>
                    </div>
                </div>
            </div>

    @endforeach


    <!-- Modal -->

    </div>
</div>
<footer class="footer-10 text-light mt-3 ">
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
<script>
    function dataLoad(data) {

        alert(data);
        $('#exampleModal').modal('show');

    }

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>

</body>
</html>
