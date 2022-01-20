@extends('layout.master')

@section('content')
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
                                <div class="col-md-4"><label for="validationCustom01">Any serious
                                        illness/disease</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-check form-switch">
                                        <input {{(old('seriousillness'))?"checked":""}} name="seriousillness"
                                               class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">

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
                                    <div class="form-check form-switch">
                                        <input
                                            {{(old('diabetes_hypertension'))?"checked":""}} name="diabetes_hypertension"
                                            class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">

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
                                        <input {{(old('majorsurgeries'))?"checked":""}} name="majorsurgeries"
                                               class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">

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
@endsection
