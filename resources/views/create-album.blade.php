<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
@section('create')
    <div class="container">
        <form method="post" action="{{route('item.store')}}">
            {{--name--}}
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text"
                       id="name"
                       name="name"
                       class="form-control">
            </div>
            {{--description--}}
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text"
                       id="description"
                       name="description"
                       class="form-control">
            </div>
            {{--description--}}
            <div class="mb-3">
                <label for="icon" class="form-label">Icon (yass)</label>
                <input type="text"
                       id="icon"
                       name="icon"
                       class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
