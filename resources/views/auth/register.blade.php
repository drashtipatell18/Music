@extends('layouts.app')
@section('title', 'Register: Music App Management')
@section('content')
    <section class="Login_form">
        <div class="bg">
            <div class="bg-img bg-dark">
                <div class="Lbox">
                    <div class="inner-box rounded-3 border-light text-dark m-0 k_bg">
                        <h2 class="login_title text-center">Register</h2>
                        <p class="text-center k_rtxt">Welcome onboard with us!</p>
                        <form method="POST" action="{{ route('store.register') }}">
                            @csrf
                            <div class="field">
                                <label for="name" class="form-label mb-0 mt-3">{{ __('Name') }}</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="email" class="form-label mb-0 mt-3">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="password" class="form-label mb-0 mt-3">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="my-3 d-flex justify-content-center mt-5">
                                <button type="submit"
                                    class="btn text-white align-items-center text-light k_loginBtn rounded-">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="text-center">
                                <p>Already have an account? <a href="{{ route('login') }}"
                                        class="text-decoration-underline text-dark">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dropdown = document.getElementsByClassName("dropdown-btnnn");
            for (var i = 0; i < dropdown.length; i++) {
                dropdown[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var dropdownContent = this.nextElementSibling;
                    if (dropdownContent.style.display === "block") {
                        dropdownContent.style.display = "none";
                    } else {
                        dropdownContent.style.display = "block";
                    }
                });
            }
        });
    </script>
    <script src="../bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>
@endsection
