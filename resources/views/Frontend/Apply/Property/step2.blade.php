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
            <h3>Description of the building</h3>
        </div>
        <div class="card-body">
            <form class="needs-validation" action="{{url("/step2/data/gedara")}}" method="post" novalidate>
                @csrf
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-md-4"><label for="validationCustom01">Walls</label></div>
                            <div class="col-md-8">
                                <div class="form-check form-check-inline">
                                    <input name="wall" type="radio" class="form-check-input" id="validationCustom01"
                                           value="Briks" placeholder="Briks" required>
                                    <label class="form-check-label" for="validationCustom01">Briks</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="wall" type="radio" class="form-check-input" id="validationCustom02"
                                           value="Cement Blocks" placeholder="Briks" required>
                                    <label class="form-check-label" for="validationCustom02">Cement Blocks</label>
                                </div>

                            </div>
                            @error('wall')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-md-4"><label for="validationCustom01">Roof</label></div>
                            <div class="col-md-8">
                                <div class="form-check form-check-inline">
                                    <input name="roof" type="radio" class="form-check-input" id="validationCustom03"
                                           value="Asbestos" placeholder="Briks" required>
                                    <label class="form-check-label" for="validationCustom03">Asbestos</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="roof" type="radio" class="form-check-input" id="validationCustom04"
                                           value="Tiles" placeholder="Briks" required>
                                    <label class="form-check-label" for="validationCustom04">Tiles</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="roof" type="radio" class="form-check-input" id="validationCustom05"
                                           value="Concrete" placeholder="Briks" required>
                                    <label class="form-check-label" for="validationCustom05">Concrete</label>
                                </div>

                            </div>
                            @error('roof')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>
                    <div class="col-md-6"></div>

                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-md-4"><label for="validationCustom01">Ceiling made of</label></div>
                            <div class="col-md-8">
                                <div class="form-check form-check-inline">
                                    <input name="ceiling" type="radio" class="form-check-input" id="validationCustom06"
                                           value="Asbestos" placeholder="Briks" required>
                                    <label class="form-check-label" for="validationCustom06">Asbestos</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="ceiling" type="radio" class="form-check-input" id="validationCustom07"
                                           value="Plastic" placeholder="Briks" required>
                                    <label class="form-check-label" for="validationCustom07">Plastic</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="ceiling" type="radio" class="form-check-input" id="validationCustom08"
                                           value="Wood" placeholder="Briks" required>
                                    <label class="form-check-label" for="validationCustom08">Wood</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="ceiling" type="radio" class="form-check-input" id="validationCustom09"
                                           value="None" placeholder="Briks" required>
                                    <label class="form-check-label" for="validationCustom09">None</label>
                                </div>

                            </div>
                            @error('ceiling')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-md-4"><label for="validationCustom01">Lit by</label></div>
                            <div class="col-md-8">
                                <div class="form-check form-check-inline">
                                    <input name="lit" type="radio" class="form-check-input" id="validationCustom10"
                                           value="Asbestos" placeholder="Briks" required>
                                    <label class="form-check-label" for="validationCustom10">LED</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="lit" type="radio" class="form-check-input" id="validationCustom11"
                                           value="Plastic" placeholder="Briks" required>
                                    <label class="form-check-label" for="validationCustom11">Plastic</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="lit" type="radio" class="form-check-input" id="validationCustom12"
                                           value="Wood" placeholder="Briks" required>
                                    <label class="form-check-label" for="validationCustom12">Wood</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="lit" type="radio" class="form-check-input" id="validationCustom13"
                                           value="None" placeholder="Briks" required>
                                    <label class="form-check-label" for="validationCustom13">None</label>
                                </div>

                            </div>
                            @error('lit')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>
                    <div class="col-md-6"></div>
                </div>
                <div class="row">

                    <div class="card" id="item-holder">
                        {{--                        {{dd(old('value'));}}--}}
                        @if(old('value'))

                            @for($i=0;count(old('value'))>$i;$i++)

                                <div class="card-body mb-3 item-card" id="items{{$i}}">
                                    <div class="row flex">

                                        <div class="col-md-4 col-lg-2 col-12 mb-3">
                                            @error('item.'.$i)
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror  @if($i==0)<br>
                                                <label for="validationCustom01">ITEM TO BE INSURED</label> @endif

                                            <input name='item[]' value="{{old("item.".$i)}}" type="text"
                                                   class="form-control"
                                                   id="validationCustom01"
                                                   placeholder="Mark Anthony"
                                                   required>

                                        </div>
                                        <div class="col-md-4 col-lg-2 col-12 mb-3">
                                            @error('make.'.$i)
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror @if($i==0)<br>
                                                <label for="validationCustom01">MAKE</label> @endif


                                            <input value="{{old("make.".$i)}}" name='make[]' type="text"
                                                   class="form-control"
                                                   id="validationCustom01"
                                                   placeholder="Mark Anthony"
                                                   required>

                                        </div>

                                        <div class="col-md-4 col-lg-2 col-12 mb-3">
                                            @error('model.'.$i)
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror @if($i==0)<br>
                                                <label for="validationCustom01">MODEL/ SERIAL NO</label> @endif

                                            <input value="{{old("model.".$i)}}" name='model[]' type="text"
                                                   class="form-control"
                                                   id="validationCustom01"
                                                   placeholder="Mark Anthony"
                                                   required>

                                        </div>

                                        <div class="col-md-4 col-lg-2 col-12 mb-3">
                                            @error('value.'.$i)
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                            @if($i==0)
                                                <br>
                                                <label for="validationCustom01">VALUE</label> @endif

                                            <input value="{{old("value.".$i)}}" name='value[]' type="text"
                                                   class="form-control"
                                                   id="validationCustom01"
                                                   placeholder="Mark Anthony"
                                                   required>


                                        </div>

                                        <div class="col-md-4 col-lg-2 col-12 mb-3">
                                            @if($i==0)
                                                <label class="form-check-label" for="flexSwitchCheckDefault">FOR
                                                    BURGLARY
                                                    COVER
                                                    UPTO RS:300,000/= (PLEASE TICK)</label>
                                            @endif
                                            <div class="form-check form-switch">

                                                <input class="form-check-input"
                                                       {{(old("tick.".$i)==1)?"checked":"0"}} type="checkbox"
                                                       id="ch{{$i}}"
                                                       onclick="tick({{$i}})">
                                                <input id='tik{{$i}}' type='hidden'
                                                       value='{{(old("tick.".$i)==1)?"1":"0"}}' name='tick[]'>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-2 col-12 mb-3">
                                            @if($i>0)
                                                <button type='button' onclick='remove({{$i}})'
                                                        class="btn btn-danger btn-sm">
                                                    REMOVE
                                                </button>
                                            @endif
                                        </div>

                                    </div>
                                </div>



                            @endfor
                        @else
                            <div class="card-body mb-3 item-card" id="items">
                                <div class="row flex">

                                    <div class="col-md-4 col-lg-2 col-12 mb-3">
                                        <label for="validationCustom01">ITEM TO BE INSURED</label>
                                        <input name='item[]' type="text" class="form-control" id="validationCustom01"
                                               placeholder="Mark Anthony"
                                               required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Name.
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-12 mb-3">
                                        <label for="validationCustom01">MAKE</label>
                                        <input name='make[]' type="text" class="form-control" id="validationCustom01"
                                               placeholder="Mark Anthony"
                                               required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Name.
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-lg-2 col-12 mb-3">
                                        <label for="validationCustom01">MODEL/ SERIAL NO</label>
                                        <input name='model[]' type="text" class="form-control" id="validationCustom01"
                                               placeholder="Mark Anthony"
                                               required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Name.
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-lg-2 col-12 mb-3">
                                        <label for="validationCustom01">VALUE</label>
                                        <input name='value[]' type="text" class="form-control" id="validationCustom01"
                                               placeholder="Mark Anthony"
                                               required>

                                    </div>

                                    <div class="col-md-4 col-lg-2 col-12 mb-3">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">FOR BURGLARY COVER
                                            UPTO RS:300,000/= (PLEASE TICK)</label>
                                        <div class="form-check form-switch">

                                            <input class="form-check-input" type="checkbox" id="ch0"
                                                   onclick="tick('0')">
                                            <input id='tik0' type='hidden' value='0' name='tick[]'>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-12 mb-3">

                                    </div>

                                </div>
                            </div>
                            @error('value.*')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        @endif


                    </div>

                </div>
                <button type="button" id="add" class="btn btn-info btn-sm mb-3 mt-2">ADD ITEM</button>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-2 col-6"><a href="{{url('/')}}" class="btn w-100 btn-danger btn-round"
                                                   type="button">Cancel</a></div>
                    <div class="col-md-2 col-6">
                        <button class="btn w-100 btn-warning btn-round" type="submit">Next</button>
                    </div>
                </div>


            </form>

            <script>

                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function () {
                    'use strict';
                    window.addEventListener('load', function () {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');


                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function (form) {
                            form.addEventListener('submit', function (event) {

                                if (form.checkValidity() === false) {

                                    if (title.value != 0) {
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
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/addItem.js')}}"></script>
</body>
</html>
