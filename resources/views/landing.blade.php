@extends('layouts.app')

@section('content')

    <div class="container col-8">
        <h1 class="text-white">Welcome to MelodyMuse!</h1>
    </div>
    <div class="container col-8">
        <div class="container" style="margin-bottom: 10px; margin-left: 0">
            <div class="row" style="margin-left: 0">
                <form >
                    <div class="input-group" style="width: 300px;">
                        <input class="form-control" type="search" value=""
                               style="background-color: rgba(1,1,1,0); border: 1px solid gray; border-right: none;"
                               id="search">
                        <span class="input-group-append">
                <button class="btn text-white" type="button"
                        style="border: 1px solid gray; border-left: none; border-radius: 0 6px 6px 0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-search" viewBox="0 0 16 16">
  <path
      d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
                </button>
              </span>
                    </div>
                </form>
            </div>

        </div>
        <?php foreach ($albums as $album) { ?>
        <a href="album/{{$album['id']}}">

        <img src="{{ asset('album-covers/' . $album['icon'])}}"
             style="width: 180px; height: 180px; object-fit: cover; margin: 3px;"></a>
        <?php } ?>

    </div>

@endsection
