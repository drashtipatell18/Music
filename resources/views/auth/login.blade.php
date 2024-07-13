@extends('layouts.app')

@section('content')

<section class="Login_form">
    <div class="bg">
        <div class="bg-img bg-dark">
            <div class="Lbox ">
                <div class="inner-box rounded-3 border-light  text-dark m-0 k_bg">
                    <h2 class="login_title text-center">Log In</h2>
                    <p class="text-center k_rtxt" >Welcome onboard with us!</p>
                    <form method="POST" class="login">
                        @csrf
                        <div class=" field">
                            <label for="exampleInputEmail1" class="form-label mb-0 mt-3">Email or Phone*</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class=" field">
                            <label for="exampleInputPassword1" class="form-label mb-0 mt-3">Password*</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="password  mb-4 text-end fs-6 text-secondary">
                            <a href="{{ route('forget.password') }}" class="text-dark">Forgot password?</a>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="btn text-white align-items-center text-light k_loginBtn rounded-0" >Log In</button>
                        </div>
                        <div class="text-center">
                            <p>Don't have an account? <a href="{{ route('register') }}" class=" text-decoration-underline text-dark">Register </a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>


    document.addEventListener("DOMContentLoaded", function () {
        var dropdown = document.getElementsByClassName("dropdown-btnnn");

        for (var i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function () {
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
