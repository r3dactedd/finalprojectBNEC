@extends('layout.main')
@section('container')
@php
     $counter = 1;
@endphp
<h1 class="text-white" style="padding-top: 150px">Cinema List</h1>
@foreach ($cinema as $cinema)
    <div class="content-center flex flex-wrap flex-col" style="">
        <div class="publisher-detail">
            <div class="row">
                <div class="col-sm-5">
                    <div style="max-height: 1000px; width:50%; overflow:hidden">
                        <img src="{{ asset($cinema->pub_img)}}" alt="{{ $cinema->name }}" class="img-fluid">
                    </div>
            </div>
            <div class="col-lg">
                <div class="col-sm">
                    <h5><a class="text-decoration-none" style="color: white; font-size:50px">{{ $cinema->name }}</a></h5>
                </div>
                <div class="description text-white">
                    <div class="row">
                        <div class="col-sm">
                            <b>Address</b>
                        </div>
                        <p style="padding-top: 10px">{{ $cinema->address }}</p>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <b>Phone</b>
                        </div>
                        <p style="padding-top: 10px">{{ $cinema->phone }}</p>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <b>Publisher</b>
                        </div>

                        <p style="padding-top: 10px">{{ $cinema->email}}</p>


                    </div>
                </div>
            </div>

        </div>
    </div>

    <h1 class="text-white text-start" style="padding-top: 50px">Now Showing</h1>
    <div class="py-5">
        <div class="container">
            <div class="row">
            @foreach ($mov as $movie)
              @if ($movie->cinema_id == $counter)
                <div class="col-auto col-md-3" style="">
                    <div class="card-deck"  style="max-height:700px !important; max-width: 300px !important; background-color: rgb(73, 73, 73); border: 0px; border-radius:20px">

                        <div style="overflow:hidden">
                            <img src="{{ asset($movie->image)}}" alt="{{ $movie->title }}" class="card-img-top" style="width:100%; height: 400px; width:300px;">
                        </div>

                        <div class="card-body" style="background: transparent">
                            <h5 class="text-white">{{$movie->title}}</h5>
                            <p class="text-white text-start">{{ $movie->director }}</p>
                            <a href="/movie/{{$movie->id}}" class="btn btn-danger" style="margin-left: 0px; background-color:rgb(244, 80, 168); border-color:transparent; border-radius:15px">Details</a>
                        </div>
                    </div>
                </div>
              @endif
            @endforeach
            @php
                    $counter++;
                @endphp
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection
