<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title','Laravel e-commerce project!')
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8243dec6e5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>


    <div class="wrapper">
        {{-- navigation --}}
       @include('frontend.partials.nav')
          {{-- End navbar part --}}

          {{-- Start sidebar + content --}}
          <div class="container margin-top-40">
            <div class="row">
@include('frontend.partials.sidebar')
@yield('content')
            </div>
          </div>
        {{-- End sidebar + content --}}

@include('frontend.partials.footer')

@include('frontend.partials.scripts')
</body>
</html>
