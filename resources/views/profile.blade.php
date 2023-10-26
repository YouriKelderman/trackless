@extends('layouts.app')

@section('content')
    <script>
        jQuery(document).ready(function ($) {
            $('input[type=checkbox]').on('change', function () {
                this.value = (Number(this.checked));
                if (this.checked === true) {
                    this.value = 1;
                }
                else {
                    this.value = 2;
                }

                $(this).closest("form").submit();

            });
        });
    </script>
    <div class="container col-8">
        <h1 class="text-white">Hi <?= $user['name'] ?></h1>
        <h2 class="text-white">Your albums</h2>
        <div style="width: 100%">
            <div class="container">
                <?php foreach ($user->albums as $album) { ?>
                <div class="d-flex flex-row justify-content-start align-items-center" style="margin-bottom: 10px;">
                    <img
                        src="{{ asset('album-covers/' . $album['icon'])}}"
                        class="shadow"
                        style="width:50px; object-fit: cover; padding: 0 !important; margin-right: 5px;">
                    <p class="text-white" style="margin: 0; font-size: 1.8em">{{$album['name']}}</p>
                    <p class="fst-italic"
                       style="margin: 0 0 0 5px; color: #aaaaaa; font-size: 1.2em"><?= round($album->ratings()->where('status', 1)->avg('rating'), 1) ?>
                        /10</p>
                    <p class="text-white"
                       style="margin: 0 0 0 5px;"> 🞄 <?= count($album->ratings->where('status', 1)) ?> Reviews</p>
                </div>
                <?php } ?>

            </div>
        </div>
        <h2 class="text-white">Your reviews</h2>
        <div style="width: 500px">
            <div class="container">
                <?php foreach ($user->ratings as $review) { ?>
                <form method="POST" action="{{route('status.edit')}}">
                    {{ csrf_field() }}
                    <input id="id"
                           name="id"
                           value="{{$user['id']}}"
                           hidden="hidden">
                    <input id="rating_id"
                           name="rating_id"
                           value="{{$review['id']}}"
                           hidden="hidden">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status"
                               <?php if ($review['status'] === 1) { ?> checked <?php } ?>>

                    </div>

                </form>
                {{$review['id']}}
                <div class="row d-flex flex-row justify-content-between">
                    <p>Yest</p>


                </div>
                <?php } ?>

            </div>
        </div>
    </div>

@endsection


