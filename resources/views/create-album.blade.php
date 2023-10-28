@extends('layouts.app')

@section('content')

    <div class="container col-8" style="margin-top: 50px;">

<?php if(count(auth()->user()->ratings) >= 5) {?>
        <form method="post" action="{{route('item.store')}}" enctype="multipart/form-data">
            {{--name--}}
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="name" class="form-label text-white">Name</label>
                <input type="text"
                       id="name"
                       name="name"
                       class="form-control">
            </div>
            {{--description--}}
            <div class="mb-3">
                <label for="description" class="form-label text-white">Description</label>
                <textarea type="text"
                       id="description"
                       name="description"
                          class="form-control"></textarea>
            </div>
            {{--icon--}}
            <div class="mb-3">
                <label for="icon" class="form-label text-white">Album Cover</label>
                <input type="file"
                       id="icon"
                       name="icon"
                       class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php } else { ?>
        <h1 class="text-white">You do not have enough reviews to create an Album.</h1>
        <h2 class="text-white">Please ensure that you have 5 or more total reviews.</h2>
        <h3 class="text-white">{{count(auth()->user()->ratings)}}/5 total reviews</h3>
        <?php }?>

    </div>

@endsection
