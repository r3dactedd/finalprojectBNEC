@extends('layout.main')

@section('container')
    @foreach ($movie as $movie)

    @endforeach
    <div class="container movie-detail-container" style="padding-top: 120px">
        <div class="row">
            <div class="col-sm-5">
                    <div style="max-height: 1000px; width:50%; overflow:hidden">
                        <img src="{{ asset($movie->image)}}" alt="{{ $movie->title }}" class="img-fluid">
                    </div>


            </div>
            <div class="col-lg">
                <div class="col-sm" >
                    <h5><a class="text-decoration-none" style="color: white; font-size:50px; margin-top:50px">{{ $movie->title }}</a></h5>
                </div>
                <div class="description text-white">
                    <a href="/movie/{{ $movie->id }}/edit" class="btn btn-danger" style="border-radius:20px; background-color:transparent; margin-top:20px; padding:15px; border-color:pink">
                        Edit Movie
                    </a>
                    <br>
                    <br>
                        <b>Release Date</b>
                        <p style="padding-top: 10px">{{ $movie->released_date }}</p>

                        <b class="text-white">Category</b>
                        <br>
                        @foreach ($category as $category)
                        <button type="button" class="btn btn-outline-disabled my-3" style="color:white; border-color:white; border-radius:20px; width:100px; margin-left:0px">{{ $category->category_name }}</button>
                        &nbsp;
                         @endforeach


                        <br>
                        <b>Author</b>
                        <p style="padding-top: 10px">{{ $movie->director }}</p>


                        <b>Playing at</b>
                        <p style="padding-top: 10px">{{ $movie->name }}</p>

                        <b>Synopsis</b>
                        <p style="padding-top: 10px">{{$movie->desc}}</p>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div style="height: 1000px"></div>
@endsection
