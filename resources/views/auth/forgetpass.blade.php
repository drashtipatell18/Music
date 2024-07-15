@extends('layouts.app')
@section('title', 'Forgot Password: Music App Management')
@section('content')


<section class="Login_form">
    <div class="bg">
        <div class="bg-img bg-dark">
            <div class="Lbox ">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('danger'))
                    <div class="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                @endif
                <div class="inner-box rounded-3 border-light  text-dark m-0 k_bg h-100">
                    <h2 class="login_title text-center ">Forgot password?</h2>
                    <form method="POST" action="{{ route('forget.password.email') }}" class="login">
                        @csrf
                        <div class=" field">
                            <label for="exampleInputEmail1" class="form-label mb-0 mt-3">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"/>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="btn text-white align-items-center text-light k_loginBtn rounded-0" >Continue</button>
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
