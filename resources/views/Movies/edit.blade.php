@extends('layout.main')

@section('container')
    <h1 style="padding-top: 120px; color:red">Edit Movie  <span style="color: white"> | {{ $movie->title }}</span></h1>

    <div class="mb-5 mt-5">
        <form action="/movie/{{$movie->id}}" method="POST" class="mb-3" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label text-white">Title</label>
                <input type="input" style="background-color: rgb(54, 54, 54); border-radius:10px; border-color:transparent;color:white" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    autofocus value="{{ old('title',$movie->title) }}" autocomplete="off" required>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="desc" class="form-label text-white">Description</label>
                <textarea type="textarea" class="form-control @error('desc') is-invalid @enderror" style="background-color: rgb(54, 54, 54); border-radius:10px; border-color:transparent;color:white" id="desc" name="desc"
                    value="{{ old('desc') }}" required autocomplete="off" rows="3">{{ $movie->desc }}</textarea>

                @error('desc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="genre_id" class="form-label text-white">Category</label>
                <br>
                @foreach ($category as $cats)
                    <span hidden>{{ $idx = 0 }}</span>

                    @foreach ($category_data as $check)
                        @if ($cats->id == $check->id)
                            <input type="checkbox" name="categories[]" style="background-color: rgb(54, 54, 54); border-radius:10px; border-color:transparent;color:white" id="genre_id" value="{{ $cats->id }}" checked> <span class="text-white"> {{ $cats->category_name }} </span> <br>
                            <span hidden>{{ $idx = 1 }}</span>
                        @endif
                    @endforeach

                    @if ($idx == 0)
                        <input type="checkbox" name="categories[]" style="background-color: rgb(54, 54, 54); border-radius:10px; border-color:transparent;color:white" id="genre_id" value="{{ $cats->id }}"> <span class="text-white"> {{ $cats->category_name }} </span> <br>
                    @endif

                @endforeach

            </div>

            <div class="mb-3">
                <label for="actor_list" class="form-label text-white">Cinema</label>

                <div class="border border-white p-3" id="dynamicRow">

                    @foreach ($cinemas_data as $data)
                        <span>
                        <div class="d-flex justify-content-between row m-2">
                            <div class="col">
                                <label for="cinema" class="form-label text-white">Playing at</label>
                                <select name="cinemas[]" class="form-select" style="background-color: rgb(54, 54, 54); border-radius:10px; border-color:transparent;color:white" >
                                    @foreach ($cinemas as $cinema)
                                        @if ($data->id == $cinema->id)
                                            <option value="{{ $cinema->id }}" selected>{{ $cinema->name }}</option>
                                        @else
                                            <option value="{{ $cinema->id }}">{{ $cinema->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                         </div>
                        </span>
                    @endforeach

                </div>
            </div>

            <div class="mb-3">
                <label for="director" class="form-label text-white">Director</label>
                <input type="input" class="form-control @error('director') is-invalid @enderror" style="background-color: rgb(54, 54, 54); border-radius:10px; border-color:transparent;color:white" id="director" name="director"
                    value="{{ old('director',$movie->director) }}" required autocomplete="off">
                @error('director')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="released_date" class="form-label text-white">Released Date</label>
                <input type="date" class="form-control @error('released_date') is-invalid @enderror" style="background-color: rgb(54, 54, 54); border-radius:10px; border-color:transparent;color:white" id="released_date" name="released_date"
                    value="{{ old('released_date',$movie->released_date) }}" required autocomplete="off">
                @error('released_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label text-white">Thumb Image</label>

                @if ($movie->image)
                    <img src= "{{ asset('storage/' . $movie->image) }}" class="img-preview1 img-fluid mb-3 col-sm-5" style="display: block;">
                @endif

                <img class="img-preview2 img-fluid mb-3 col-sm-5">

                <input id="image" class="form-control @error('image') is-invalid @enderror" style="background-color: rgb(54, 54, 54); border-radius:10px; border-color:transparent;color:white" type="file" name="image" onchange="previewImage1()">

                @error('thumb_img')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-danger">Update Movie</button>
            <a href="/movie/{{ $movie->title }}" class="text-decoration-none mx-3 text-white">Cancel</a>
        </form>
    </div>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        var divRow = document.getElementById('dynamicRow');
        function addMore(){
            divRow.innerHTML += `<span><div class="d-flex justify-content-between row m-2">
                {{-- pilih actor --}}
                <div class="col">
                    <label for="cinema" class="form-label text-white">Playing at</label>
                    <select name="cinemas[]" class="form-select">
                         @foreach ($cinemas as $cinema)
                            <option value="{{ $cinema->id }}">{{ $cinema->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-2 d-flex justify-content-end">
                    <button type="button" class="btn btn-danger remove-input">Remove</button>
                </div>

            </div></span>`;
        }

        $(document).on('click', '.remove-input', function () {
            $(this).parents('span').remove();
        });

        function previewImage1(){
            const image = document.querySelector('#thumb_img');
            const imgPreview1 = document.querySelector('.img-preview1');
            const imgPreview2 = document.querySelector('.img-preview2');

            imgPreview1.style.display = 'none';
            imgPreview2.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview2.src = oFREvent.target.result;
            }
        }

    </script>
@endsection
