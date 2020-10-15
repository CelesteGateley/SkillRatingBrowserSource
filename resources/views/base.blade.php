<!DOCTYPE html>
<!-- /resources/views/bases/base.blade.php -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <!-- Dynamic Title -->
    <title>@yield('title') - Skill Rank Browser Source</title>

    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap 4 created by the Bootstrap team. Available from https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- JQuery created by the jQuery foundation. Available from https://jquery.com/ -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
</head>
@yield('header')
@yield('scripts')
<body>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <ion-icon name="close"></ion-icon>
            </button>
        </div>
    @endforeach
@endif
@yield('body')
</body>
</html>
