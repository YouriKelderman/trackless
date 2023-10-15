@extends('layouts.app')
<?php
print_r($album->name);
print_r($userId);
?>
<div class="container">
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


    </form>
</div>
