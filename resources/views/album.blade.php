@extends('layouts.app')


@section('content')
    <style>
        body {
            background: #1B1A1A !important;
        }

        main {
            padding: 0 !important;
        }

        /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
    </style>
    <section class="container col-8" style="padding-bottom: 50px;">
        <img
            src="{{ asset('banners/' . $poster['banner'])}}"
            class=""
            style="width: 100%; height: 140px; object-fit: cover; padding: 0 !important; box-shadow: 0 8px 5px -1px rgba(0,0,0,0.45);; z-index: 2">
        <div class="d-flex flex-row align-items-center col-8" id="details">
            <img
                src="{{ asset('profile_pictures/' . $poster['profile_picture']) }}"
                class="rounded-circle"
                style="width: 140px; object-fit: cover; padding: 0 !important; border: 8px solid #1B1A1A; margin-top: -40px;">
            <div style="margin-top: -25px">
                <h2 class="text-white" style="margin: 0 !important;">{{$poster['name']}}</h2>
                <a style="display: block; color: gray; font-style: italic; margin-top: -4px !important;">&#64;{{ $poster['username'] }}</a>
            </div>
        </div>
    </section>
    <section class="container col-8" style="background-color: #222020; padding-top: 25px; padding-bottom: 20px;">
        <div class="d-flex flex-row" style="position: absolute; top: 0; right: 0; margin: 10px;">
            <?php if (($admin || $userId === $poster['id']) && !$editing) { ?>
            <form method="POST" action="{{route('item.delete')}}">
                @csrf
                <input type="number" name="item_id" id="item_id" hidden="hidden" value="{{$album['id']}}">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
                <?php if (!$editing && $userId === $poster['id']) { ?>
            <a href="/album/{{$album['id']}}/edit#details" class="btn btn-primary" style="color: white;">Edit</a>
            <?php } ?>
            <?php } ?>
        </div>
        <?php if ($userId === $poster['id']) { ?>
        <form method="POST" action="{{route('item.edit')}}">
            {{ csrf_field() }}
            <?php } ?>
            <div style="position: absolute; top: 0; right: 0; margin: 10px;">

                <?php if ($userId === $poster['id'] && $editing){ ?>
                <a href="/album/{{$album['id']}}#details" class="btn btn-danger">Discard</a>
                <input type="text" name="item_id" id="item_id" hidden="hidden" value="{{$album['id']}}">
                <button type="submit" class="btn btn-success">Save</button>
                <?php } ?>

            </div>
            <div class="row" style="margin-left: 25px;">
                <img
                    src="{{ asset('album-covers/' . $album['icon'])}}"
                    class="shadow"
                    style="width:150px; height: 150px; object-fit: cover; border-radius: 10px; padding: 0 !important;">

                <div
                    class="col-8 d-flex flex-column justify-content-between">

                    <div><?php if ($editing && $userId === $poster['id']) { ?>
                        <input
                            style="background-color: rgba(1,1,1,0); border: 1px solid white; color: white; font-size: 30px; width: fit-content !important;display: inline-block"
                            type="text" id="name" name="name" value="{{$album['name']}}"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                            <?php } else { ?>
                        <h1 style="margin-bottom: -0.4rem" class="text-white">{{$album['name']}}</h1>
                        <?php } ?>

                        <p class="fst-italic " style="color: #8C8C8C; font-size: 1.3rem">{{ $poster['name'] }}</p>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <img
                            src="/img/star.png"
                            style="width:40px; margin-right: 2px">
                        <p style="margin-bottom: 0; font-size: 2em; color: white; margin-right: 5px;">{{ round($album->ratings()->where('status', 1)->avg('rating'), 1) }}</p>
                        <p style="margin-bottom: 0; color: white; font-style: italic">
                            🞄 {{count($album->ratings->where('status', 1)) }} total
                            reviews</p>
                    </div>
                </div>
            </div>
            <?php if ($userId === $poster['id'] && $editing) { ?>
            <textarea
                style="background-color: rgba(1,1,1,0); margin: 10px 0 0 25px; border: 1px solid white; color: white; width: 95% !important; height: 400px; display: inline-block"
                type="text" id="description" name="description"
                class="form-control @error('description') is-invalid @enderror">{{$album['description']}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
                <?php } else { ?>
            <p class="text-white" style="margin-top:20px; margin-left: 25px">{{$album['description']}}</p>
            <?php } ?>
            <?php if ($userId === $poster['id']) { ?>
        </form>
        <?php } ?>
    </section>
    <div class="container col-4" style="background-color: gray; border-radius: 10px;">
        <?php if ($loggedIn){ ?>
        <form method="post" action="{{route('review.store')}}">
            <?php } ?>
            @csrf

            {{--review--}}
            <div class="mb-3">
                <label for="review" class="form-label">Review</label>
                <input type="text"
                       id="review"
                       name="review"
                       class="form-control @error('review') is-invalid @enderror"
                       required="required"
                       value="{{old('review')}}">
                @error('review')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            {{--rating--}}
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="number"
                       id="rating"
                       name="rating"
                       class="form-control @error('rating') is-invalid @enderror"
                       required="required"
                       value="{{old('rating')}}">
                @error('rating')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <input type="number"
                   id="user_id"
                   name="user_id"
                   hidden="hidden"
                   value="{{$userId}}"
                   required="required">
            <input type="number"
                   id="item_id"
                   name="item_id"
                   hidden="hidden"
                   value="{{$album->id}}">
            <input type="number"
                   name="status"
                   id="status"
                   value="1"
                   hidden="hidden"
                   required="required">
                <?php if ($loggedIn === true) { ?>
            <button type="submit" class="btn btn-primary">Submit</button>
            <?php } else { ?>
            <button type="" class="btn btn-primary">
                {{ __('Login') }}
            </button>
            <?php } ?>

        </form>
    </div>
    <div class="container col-8">
        @forelse($album->ratings->where('status', 1) as $review)
            <div class="container" style=" margin: 10px;">
                <div class="flex-row d-flex justify-content-between"
                     style=" padding-bottom: 5px; border-bottom: 1px solid gray;">
                    <div class="flex-row d-flex align-items-center">
                        <img
                            src="{{ asset('profile_pictures/' . $review->poster->profile_picture) }}"
                            class="rounded-circle shadow-4"
                            style=" width: 50px; object-fit: cover; padding: 0; margin-right: 5px;">
                        <p style="margin: 0;" class="text-white">{{$review->poster->name}}</p>
                    </div>
                    <div class="flex-row d-flex align-items-center">
                            <?php for ($i = 0;
                                       $i < $review['rating'];
                                       $i++)  { ?>
                        <img
                            src="/img/star.png"
                            style="width:30px; height:30px; margin: 0 1px">
                        <?php } ?>
                    </div>
                </div>
                <p class="text-white" style="margin-top: 5px">{{$review['review']}}</p>
            </div>

        @empty
            <p class="text-white">You don't have any active reviews</p>
        @endforelse


    </div>
@endsection
