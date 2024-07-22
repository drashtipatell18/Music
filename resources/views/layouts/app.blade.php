<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset ('bootstrap-5.2.3/dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.2-web/fontawesome-free-6.5.2-web/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/Login.css') }}" />
    <title>@yield('title', 'Music App Management')</title>

</head>
<style>
    .k_loginBtn{
  border-radius: 6px !important;
  background: #162640 !important;
  background-color: #162640 !important;
  width: 100%;
  margin-bottom: 15px;
}
.k_loginBtn:hover, .k_loginBtn:active{
  background:#2b446c !important;
  border-color: 1px solid #2b446c !important ;
}
@media only screen and (max-width: 425px) {
    .otp_input {
        padding: 3px 16px;
        width: 21px;
        margin: 5px;
    }
}
</style>
<body>
    @yield('content')

    <script src="{{ asset('bootstrap-5.2.3/dist/js/bootstrap.min.js') }}"></script>
    <script src="http
        s://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>


    @stack('scripts')
</body>

</html>
