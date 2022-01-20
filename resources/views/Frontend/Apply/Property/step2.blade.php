@extends('layout.master')

@section('content')
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
                                        <label class="form-check-label" for="validationCustom01">Bricks</label>
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
                                        <input name="ceiling" type="radio" class="form-check-input"
                                               id="validationCustom06"
                                               value="Asbestos" placeholder="Briks" required>
                                        <label class="form-check-label" for="validationCustom06">Asbestos</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input name="ceiling" type="radio" class="form-check-input"
                                               id="validationCustom07"
                                               value="Plastic" placeholder="Briks" required>
                                        <label class="form-check-label" for="validationCustom07">Plastic</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input name="ceiling" type="radio" class="form-check-input"
                                               id="validationCustom08"
                                               value="Wood" placeholder="Briks" required>
                                        <label class="form-check-label" for="validationCustom08">Wood</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input name="ceiling" type="radio" class="form-check-input"
                                               id="validationCustom09"
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
                                                <span class="text-danger">Item is Reuired</span>
                                                @enderror  @if($i==0)<br>
                                                <label for="validationCustom01">ITEM TO BE INSURED</label> @endif

                                                <input name='item[]' value="{{old("item.".$i)}}" type="text"
                                                       class="form-control"
                                                       id="validationCustom01"
                                                       placeholder="ITEM"
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
                                                       placeholder="MAKE"
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
                                                       placeholder="MODEL"
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
                                                       id="currency-field" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"
                                                       placeholder="VALUE"
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
                                            <input name='item[]' type="text" class="form-control"
                                                   id="validationCustom01"
                                                   placeholder="ITEM"
                                                   required>
                                            <div class="invalid-feedback">
                                                Please provide a valid Name.
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-2 col-12 mb-3">
                                            <label for="validationCustom01">MAKE</label>
                                            <input name='make[]' type="text" class="form-control"
                                                   id="validationCustom01"
                                                   placeholder="MAKE"
                                                   required>
                                            <div class="invalid-feedback">
                                                Please provide a valid Name.
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-lg-2 col-12 mb-3">
                                            <label for="validationCustom01">MODEL/ SERIAL NO</label>
                                            <input name='model[]' type="text" class="form-control"
                                                   id="validationCustom01"
                                                   placeholder="MODEL"
                                                   required>
                                            <div class="invalid-feedback">
                                                Please provide a valid Name.
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-lg-2 col-12 mb-3">
                                            <label for="currency-field">VALUE</label>
                                            <input name='value[]' type="text" class="form-control"
                                                   id="currency-field" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"
                                                   placeholder="VALUE"
                                                   required>

                                        </div>

                                        <div class="col-md-4 col-lg-2 col-12 mb-3">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">FOR BURGLARY
                                                COVER
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


            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        // Jquery Dependency

        $("input[data-type='currency']").on({
            keyup: function() {

                formatCurrency($(this));
            },
            blur: function() {
                formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }


        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === "") { return; }

            // original length
            var original_len = input_val.length;

            // initial caret position
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val =  left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val =  input_val;

                // final formatting
                if (blur === "blur") {
                    input_val += ".00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }



    </script>

@endsection

