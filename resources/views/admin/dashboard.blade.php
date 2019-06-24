<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script> window.Laravel = { csrfToken: 'csrf_token() ' } </script>
    <title> Welcome to the Admin dashboard </title>
    <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
@if(auth()->user())
    {{--<script>--}}
        {{--var user_name = "{{ auth()->user()->name }}";--}}
        {{--var user_id = "{{ auth()->user()->id }}";--}}
        {{--console.log(user_name);--}}
    {{--</script>--}}
@endif
<div id="app">
    <Homepage :user-name='@json(auth()->user()->name)'
              :user-id='@json(auth()->user()->id)'></Homepage>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>