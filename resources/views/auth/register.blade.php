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
                        <form method="POST" id="registerFrm">
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showLoading() {
            Swal.fire({
                title: 'Loading...',
                text: 'Please wait while we process your request.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        }

        function hideLoading() {
            Swal.hideLoading();
            Swal.clickConfirm();
        }


        $("#registerFrm").validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true
                },
                password: {
                    required: true
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                name: {
                    required: "<span class='text-danger' style='font-size:small'>Please enter name</span>"
                },
                email: {
                    required: "<span class='text-danger' style='font-size:small'>Please enter email</span>"
                },
                password: {
                    required: "<span class='text-danger' style='font-size:small'>Please enter password</span>"
                },
                password_confirmation: {
                    required: "<span class='text-danger' style='font-size:small'>Please enter confirm password</span>"
                }
            }
        });

        $("#registerFrm").submit(function(e){
            e.preventDefault();
            if($("#registerFrm").valid()){
                showLoading();
                const form = new FormData($("#registerFrm")[0]);
                $.ajax({
                    "url": "/api/create/register",
                    "method": "POST",
                    "timeout": 0,
                    "processData": false,
                    "mimeType": "multipart/form-data",
                    "contentType": false,
                    "data": form,
                    "success": function(response){
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Registration Successful"
                        }).then(()=>{
                            window.location.href = '/';
                        })
                    },
                    "error": function(err){
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: err.responseText
                        })
                    }
                })
            }
        })
    </script>
@endsection
