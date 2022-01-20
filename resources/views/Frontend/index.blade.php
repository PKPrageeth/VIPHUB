@extends('layout.master')

@section('content')


    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('/images/slider/slider1.png')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('/images/slider/slider2.png')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('/images/slider/slider3.png')}}" class="d-block w-100" alt="...">
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
                        <a href="{{url('/')}}" class="w-100 d-flex justify-content-center text-decoration-none">
                            <button
                                class="btn btn-block w-100 @if($active=='all')btn-warning @else btn-outline-warning @endif ">
                                ALL
                            </button>
                        </a>


                    </div>
                    @foreach($category as $item)
                        <div class="col d-flex justify-content-center mt-2">
                            <a href="{{url("/index/".$item['insuranceCategory']) }}"
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
                            <img src="{{$item['policyImageURL']}}" class="card-img-top" alt="...">
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
                                            <img src="{{$item['policyImageURL']}}" class="w-100" alt="...">
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
                                @if($item['insurancePolicyId']=="ceylinco-gedara")
                                    <a href="{{url("/basic_details/".$item['insurancePolicyId']."/plan/".$item['premium']) }}"
                                       class="btn btn-primary">
                                        Buy Now
                                    </a>
                                @else
                                    <a href="{{url("/basic_details/".$item['insurancePolicyId']."/".$item['insurancePlan']."/".$item['premium']) }}"
                                       class="btn btn-primary">
                                        Buy Now
                                    </a>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>

        @endforeach


        <!-- Modal -->

        </div>
    </div>
@endsection
