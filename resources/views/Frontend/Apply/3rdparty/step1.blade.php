@extends('layout.master')

@section('content')
    <div class="container">
        <div class="card text-light mt-5">
            <div class="card-header">
                <h3>Details of the Vehicle</h3>
            </div>
            <div class="card-body">
                @if(\Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{\Session::get('error')}}</strong>

                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                            crossorigin="anonymous"></script>
                    <script>
                        $(".alert").fadeTo(2000, 1000).slideUp(1000, function () {
                            $(".alert").slideUp(1000);
                        });
                    </script>
                @endif
                <form class="needs-validation" action="{{url("/step3/data/thirdparty")}}" method="post" novalidate
                      enctype='multipart/form-data'>
                    @csrf
                    <div class="row">

                        <div class="col-md-6 mb-3">


                            <label for="validationCustom03">Registration Number</label>
                            <input type="text" name="Registration_Number" value="{{old('Registration_Number')}}"
                                   class="form-control" id="validationCustom03" required>
                            @error('Registration_Number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03">Make and Model</label>
                            <input type="text" name="model" value="{{old('model')}}" class="form-control"
                                   id="validationCustom03" required>
                            @error('model')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>


                    </div>
                    <div class="row">

                        <div class="col-md-6 mb-3">


                            <label for="validationCustom03">Engine Number</label>
                            <input type="text" name="Engine_Number" value="{{old('Engine_Number')}}"
                                   class="form-control" id="validationCustom03" required>
                            @error('Engine_Number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03">Chassis Number/ Frame Number</label>
                            <input type="text" name="Chassis_Number" value="{{old('Chassis_Number')}}"
                                   class="form-control" id="validationCustom03" required>
                            @error('Chassis_Number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>


                    </div>
                    <div class="row">

                        <div class="col-md-6 mb-3">


                            <label for="validationCustom03">Horse Power/ Cubic Capacity</label>
                            <input type="text" name="Horse_Power" value="{{old('Horse_Power')}}" class="form-control"
                                   id="validationCustom03" required>
                            @error('Horse_Power')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03">Color</label>
                            <input type="text" name="color" value="{{old('color')}}" class="form-control"
                                   id="validationCustom03" required>
                            @error('color')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>


                    </div>
                    <div class="row">

                        <div class="col-md-6 mb-3">


                            <label for="validationCustom03">Carrying Capacity</label>
                            <input type="text" name="Carrying_Capacity" value="{{old('Carrying_Capacity')}}"
                                   class="form-control" id="validationCustom03" required>
                            @error('Carrying_Capacity')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03">Seating Capacity</label>
                            <input type="text" name="seating_capacity" value="{{old('seating_capacity')}}"
                                   class="form-control" id="validationCustom03" required>
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
                            <select name="Vehicle_Type" class="form-select" id="validationCustom02" required disabled>


                                <option
                                    {{(\Session::get('third')['plan']=='Motor Bike')?"selected":"disabled"}} value="Motor Bike">
                                    Motor Bike
                                </option>
                                <option
                                    {{(\Session::get('third')['plan']=='Three Wheeler')?"selected":"disabled"}} value="Three Wheeler">
                                    Three Wheeler
                                </option>
                                <option
                                    {{(\Session::get('third')['plan']=='Tractors')?"selected":"disabled"}} value="Tractors">
                                    Tractors
                                </option>
                                <option
                                    {{(\Session::get('third')['plan']=='Motor Cars')?"selected":"disabled"}} value="Motor Cars">
                                    Motor Cars
                                </option>
                                <option
                                    {{(\Session::get('third')['plan']=='Lorry')?"selected":"disabled"}} value="Lorry">
                                    Lorry
                                </option>
                                <option
                                    {{(\Session::get('third')['plan']=='Dual Purpose vehicle private')?"selected":"disabled"}} value="Dual Purpose vehicle private">
                                    Dual Purpose vehicle private
                                </option>
                                <option
                                    {{(\Session::get('third')['plan']=='Dual Purpose vehicle hiring')?"selected":"disabled"}} value="Dual Purpose vehicle hiring">
                                    Dual Purpose vehicle hiring
                                </option>
                                <option
                                    {{(\Session::get('third')['plan']=='Trailers Hand Tractors')?"selected":"disabled"}} value="Trailers Hand Tractors">
                                    Trailers Hand Tractors
                                </option>

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
                            <input type="text" name="market_Value" value="{{old('market_Value')}}" class="form-control" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"
                                placeholder="Present market value"   id="validationCustom03" required>
                            @error('market_Value')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03">Year of make</label>
                            <input type="text" name="yom" value="{{old('yom')}}" class="form-control" placeholder="Year of make"
                                   id="validationCustom03" required>
                            @error('yom')
                            <span class="text-danger">Year of make is invalid.</span>
                            @enderror


                        </div>


                    </div>
                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <div class="row">
                                <div class="col-md-4"><label for="validationCustom01">Is this vehicle at present
                                        maintained
                                        free of any damages?</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-check form-switch">
                                        <input {{old('damages')?"checked":""}} name="damages" class="form-check-input"
                                               type="checkbox"
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
                                        <input
                                            {{old('usage')?in_array("Private", old('usage'))?"checked":"":""}} name="usage[]"
                                            class="form-check-input" type="checkbox" value="Private"
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Private
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="usage[]"
                                               {{old('usage')?in_array("Rent a car", old('usage'))?"checked":"":""}}  class="form-check-input"
                                               type="checkbox" value=" Rent a car" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Rent a car
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="usage[]"
                                               {{old('usage')?in_array("Transport passengers only", old('usage'))?"checked":"":""}}  class="form-check-input"
                                               type="checkbox" value="Transport passengers only" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Transport passengers only
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="usage[]"
                                               {{old('usage')?in_array("Hiring", old('usage'))?"checked":"":""}}  class="form-check-input"
                                               type="checkbox" value="Hiring" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Hiring
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="usage[]"
                                               {{old('usage')?in_array("Transport goods only", old('usage'))?"checked":"":""}}  value="Transport goods only"
                                               class="form-check-input" type="checkbox" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Transport goods only
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="usage[]"
                                               {{old('usage')?in_array("Transport goods only", old('usage'))?"checked":"":""}}  class="form-check-input"
                                               type="checkbox" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Transport goods only
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="usage[]"
                                               {{old('usage')?in_array("Transport goods and passengers(both)", old('usage'))?"checked":"":""}}  value="Transport goods and passengers(both)"
                                               class="form-check-input" type="checkbox" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Transport goods and passengers(both)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="usage[]"
                                               {{old('usage')?in_array("Any other purpose", old('usage'))?"checked":"":""}} value="Any other purpose"
                                               class="form-check-input" type="checkbox" id="flexCheckChecked">
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
                            <input type="text" name="Beneficiary_Name" value="{{old('Beneficiary_Name')}}"
                                   class="form-control" id="validationCustom03" required>
                            @error('Beneficiary_Name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03">Beneficiary NIC No</label>
                            <input type="text" name="Beneficiary_NIC" value="{{old('Beneficiary_NIC')}}"
                                   class="form-control" id="validationCustom03" required>
                            @error('Beneficiary_NIC')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>


                    </div>
                    <div class="row">

                        <div class="col-md-6 mb-3">


                            <label for="validationCustom03">Beneficiary Relationship Type</label>
                            <input type="text" name="Beneficiary_Relationship"
                                   value="{{old('Beneficiary_Relationship')}}" class="form-control"
                                   id="validationCustom03" required>
                            @error('Beneficiary_Relationship')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03">Endorsement Language</label>
                            <input type="text" name="language" value="{{old('language')}}" class="form-control"
                                   id="validationCustom03" required>
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
                                        <input name="declaration" value="{{old('declaration')}}"
                                               class="form-check-input" type="checkbox"
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
                        <h1>{{old('nicf')}}</h1>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">NIC Front Image</div>
                                <div class="file-upload">
                                    <button class="btn btn-sm btn-warning w-100" type="button"
                                            onclick="$('.file-upload-input').trigger( 'click' )">Add Image
                                    </button>

                                    <div class="image-upload-wrap">
                                        <input class="file-upload-input" name="nicf" type='file'
                                               onchange="readURL(this);"
                                               accept="image/*"/>
                                        <div class="drag-text">
                                            <h3>Drag and drop a file or select add Image</h3>
                                        </div>
                                    </div>
                                    <div class="file-upload-content">
                                        <img class="file-upload-image" src="#" alt="your image"/>
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload()" class="remove-image">Remove
                                                <span
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
                                            <button type="button" onclick="removeUpload1()" class="remove-image">Remove
                                                <span
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
                                            <button type="button" onclick="removeUpload2()" class="remove-image">Remove
                                                <span
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
                                        <input class="form-check-input" type="radio" name="policy" value="Digital"
                                               id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Digital
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="policy" value="Hard Copy"
                                               id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Hard Copy
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="policy" value="Both"
                                               id="flexRadioDefault1">
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
            if (input_val === "") {return;}

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
