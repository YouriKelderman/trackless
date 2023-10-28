@extends('layouts.app')

@section('content')
    <style>
        .leading-artist {
            width: 200px !important;
            height: 350px;
            background-position: center;
            background-size: cover;
        }

        .leading-artist-photo {
            width: 90%;
            height: 90%;
            object-fit: cover;
        }
    </style>
    <div class="container col-8" style="margin-top: 20px;">
        <h1 class="text-white">Welcome to MelodyMuse!</h1>
    </div>

    <div class="container col-8">
        <div class="container" style="margin-bottom: 10px; margin-left: 0">
            <div class="" style="margin-left: 0; display: flex; flex-direction: row">
                <form id="search" class="d-flex flex-row" method="POST" action="{{ route('home.search')}}">
                    @csrf
                    <div class="input-group" style="width: 300px;">
                        <input class="form-control text-white" placeholder="Search.." type="search" value="{{old('search')}}"
                               style="background-color: rgba(1,1,1,0); border: 1px solid gray; border-right: none;"
                               id="search"
                               name="search">

                        <span class="input-group-append">

                <button class="btn text-white" type="submit"
                        style="border: 1px solid gray; border-left: none; border-radius: 0 6px 6px 0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-search" viewBox="0 0 16 16">
  <path
      d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
                </button>
              </span>
                    </div>
                    <select class="form-select" id="filter" name="filter" style="margin: 0; !important;">
                        <option value="1" selected="selected">A-Z</option>
                        <option value="2">Z-A</option>
                    </select>
                </form>
            </div>

        </div>
        <div class="container d-flex flex-wrap">
            <?php foreach ($albums as $album) { ?>
            <div style="width: 180px; margin: 5px;" class="d-flex flex-column align-items-center">

                <a href="album/{{$album['id']}}">
                    <div
                        class="album"
                        style="width: 180px; height: 180px; background-image: url('{{asset('album-covers/' . $album['icon'])}}'); background-position:center; background-size: cover;">
                        <div class="albumText d-flex align-items-center justify-content-center"
                             style="width: 100%; height: 100%;">
                            <h2 class="text-white" style="text-decoration: none;">{{$album['name']}}</h2>
                        </div>
                    </div>
                </a>

            </div>
            <?php } ?>
        </div>

    </div>

@endsection
