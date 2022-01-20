@extends('layout.master')

@section('content')
    <div class="container">
        <div class="card text-light mt-5">
            <div class="card-header">
                <h3>Personal Health Declaration (Person Who obtain the cover)</h3>
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
                <form class="needs-validation" action="{{url("/step3/data/serious_illness")}}" method="post" novalidate
                      enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <p>Do you suffer from or take any treatment for
                            Please select Yes/No</p>
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <div class="col-md-4"><label for="validationCustom01">Any serious
                                        illness/disease</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-2">NO</div>
                                        <div class="col-2">
                                            <div class="form-check form-switch">
                                                <input {{(old('seriousillness'))?"checked":""}} name="seriousillness"
                                                       class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">

                                            </div>
                                        </div>
                                        <div class="col-2">YES</div>
                                    </div>

                                </div>

                            </div>


                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <div class="col-md-4"><label for="validationCustom01">Diabetes/Hypertension</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-2">NO</div>
                                        <div class="col-2">
                                            <div class="form-check form-switch">
                                                <input {{(old('diabetes_hypertension'))?"checked":""}} name="diabetes_hypertension"
                                                       class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">

                                            </div>
                                        </div>
                                        <div class="col-2">YES</div>
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
                                    <div class="row">
                                        <div class="col-2">NO</div>
                                        <div class="col-2">
                                            <div class="form-check form-switch">
                                                <input {{(old('majorsurgeries'))?"checked":""}} name="majorsurgeries"
                                                       class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">


                                            </div>
                                        </div>
                                        <div class="col-2">YES</div>
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
                                    <textarea name="nature_of_illness" class="form-control" rows="5"
                                              placeholder="Nature of the Illness/Illnesses">{{old('nature_of_illness')}}</textarea>
                                    @error('nature_of_illness')
                                    <span class="text-danger">The Nature of the Illness is required.</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">Type Of surgery</div>
                                <div class="col-md-8">
                                    <textarea name="typeofsurgerie" class="form-control" rows="5"
                                              placeholder="Type Of surgery">{{old('typeofsurgerie')}}</textarea>
                                    @error('typeofsurgerie')
                                    <span class="text-danger">The Type Of surgery is required.</span>
                                    @enderror
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
                    <div class="row justify-content-end ">

                        <div class="col-12 col-md-4 border p-3">
                            <div class="form-check">
                                <input name="terms" class="form-check-input" type="checkbox" value="agree" id="terms">
                                <label  class="form-check-label" for="defaultCheck1">
                                    I agree to the <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Terms and Condtions </button>
                                </label>
                                @error('terms')
                                <br>
                                <span class="text-danger">Please Tick Above to Agree Terms and Condtions</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg bg-dark">
                            <div class="modal-content bg-dark">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Terms and Condtions </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p> In order to process your application we will capture the personal data</p>

                                    <p>  and health data of the insured regarding serious illnesses and surgeries undergone.</p>


                                    <p>  I/We declare that the information given in the proposal form is to the best of my/our knowledge and belief, correct and complete in every detail, and will be the basis of the contract between I/we and Ceylinco General Insurance Ltd.</p>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button onclick="agree()" type="button" data-bs-dismiss="modal" class="btn btn-primary">Agree</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
@endsection
