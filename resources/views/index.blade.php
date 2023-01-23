@extends('layout.main')

@section('container')
<h1 class="text-white" style="padding-top: 100px;margin-left:10px">Movie List</h1>
<div class="row">
    <div class="col">
            <a href="/movie/create" class="text-decoration-none btn btn-danger" >Add Movie</a>
    </div>
</div>
    <div class="py-5">
        <div class="container" style="">
            <div class="row">
              @foreach ($data as $data)
              <br>
                <div class="col-auto col-md-3 my-3" style="">
                    <div class="card-deck"  style="max-height:700px !important; max-width: 500px !important; background-color: rgb(73, 73, 73); border: 0px; border-radius:20px">

                    @if ($data->image)
                        <div style="overflow:hidden">
                            <img src="{{asset($data->image)}}" alt="{{ $data->title }}" class="card-img-top" style="width:100%; height: 400px; width:300px;">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/400x350?movie" alt="{{ $data->title }}" class="card-img-top">
                    @endif

                    <div class="card-body" style="background: transparent">
                        <h5 class="text-white">{{$data->title}}</h5>
                            <p class="text-white text-start">{{ $data->director }}</p>
                            <a href="/movie/{{$data->id}}" class="btn btn-danger" style="margin-left: 0px; background-color:rgb(244, 80, 168); border-color:transparent; border-radius:15px">Details</a>
                    </div>
                    </div>
                </div>

              @endforeach
            </div>
        </div>
    </div>



    <div style="height: 1000px"></div>
@endsection
