@extends('layouts.app')


@section('content')
    <style>
        body { background: #1B1A1A !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
    </style>

    <div class="container col-8">
        <div class="row">
            <img
                src="{{ asset('album-covers/' . $album['icon'])}}"
                class=""
                style="width:150px; height: 150px; object-fit: cover; border-radius: 10px; padding: 0 !important;">
            <div
                class="col-5 d-flex flex-column justify-content-between">
                <div>
                    <h1 style="margin-bottom: -0.4rem" class="text-white">{{$album['name']}}</h1>
                    <p class="fst-italic " style="color: #8C8C8C; font-size: 1.3rem"><?= $poster['name'] ?></p>
                </div>
                <div class="d-flex flex-row align-items-center">
                <img
                    src="../img/star.png"
                style="width:40px; margin-left: -10px;"><p style="margin-bottom: 0; font-size: 2em; color: white; margin-right: 5px;"><?= round($album->ratings()->avg('rating'),1)?></p><p style="margin-bottom: 0; color: white; font-style: italic"> 🞄 <?= count($album->ratings) ?> total reviews</p>
                </div>
            </div>
        </div>
<p class="text-white" style="margin-top:20px; margin-left: -10px">{{$album['description']}}</p>
    </div>
    <div class="container col-4" style="background-color: gray; border-radius: 10px;">
        <form method="post" action="{{route('review.store')}}">
            {{--review--}}
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="review" class="form-label">Review</label>
                <input type="text"
                       id="review"
                       name="review"
                       class="form-control">
            </div>
            {{--rating--}}
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="number"
                       id="rating"
                       name="rating"
                       class="form-control">
            </div>
            <input type="number"
                   id="user_id"
                   name="user_id"
                   hidden="hidden"
                   value="<?=$userId?>">
            <input type="number"
                   id="item_id"
                   name="item_id"
                   hidden="hidden"
                   value="<?=$album->id?>">
            <input type="string"
                   name="status"
                   id="status"
                   value="active"
                   hidden="hidden">
            <?php if ($loggedIn === true) { ?>
            <button type="submit" class="btn btn-primary">Submit</button>
            <?php } else { ?>
            <button type="" class="btn btn-primary">
                {{ __('Login') }}
            </button>
            <?php } ?>
            @forelse($album->ratings as $review)
                {{$review['review']}}
            @empty
                <p>You dont have any active reviews</p>
            @endforelse
            {{$rating}}

        </form>
    </div>
@endsection
