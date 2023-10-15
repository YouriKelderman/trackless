@extends('layouts.app')
@include('footer')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php foreach ($select as $album) {
    ?>
<p><?=$album['name']?></p>
<?php
}
?>
<?php if(Auth::check()) { ?>
    <button>You logged in fam</button>
<?php } else{?>
<button>Click here to log in!</button>
<?php }?>



<footer>
    @yield('footer')
</footer>
</body>
</html>
