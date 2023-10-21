@extends('layouts.app')

@section('content')

    <div class="container col-4">

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
                <input type="text"
                       id="description"
                       name="description"
                       class="form-control">
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
    </div>

@endsection
