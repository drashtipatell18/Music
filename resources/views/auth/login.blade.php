@extends('layouts.app')
@section('title', 'Login: Music App Management')
@section('content')

<section class="Login_form">
    <div class="bg">
        <div class="bg-img bg-dark">
            <div class="Lbox ">
                <div class="inner-box rounded-3 border-light  text-dark m-0 k_bg">
                    <h2 class="login_title text-center">Log In</h2>
                    <p class="text-center k_rtxt" >Welcome onboard with us!</p>
                    <form method="POST" id="loginFrm" class="login">
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
                            <p>Don't have an account? <a href="/register" class=" text-decoration-underline text-dark">Register </a></p>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    if(sessionStorage.getItem('token') && sessionStorage.getItem('token') != null && sessionStorage.getItem('token') != "")
    {
        window.location.replace('/dashboard')
    }
    function showLoading()
    {
        Swal.fire({
            title: 'Loading...',
            text: 'Please wait while we process your request.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
    }
    function hideLoading()
    {
        Swal.hideLoading();
        Swal.clickConfirm();
    }
    $("#loginFrm").validate({
        rules:{
            email:{
                required: true,
                email: true
            },
            password:{
                required: true,
            }
        },
        messages: {
            email:{
                required: "<span class='text-danger' style='font-size:small'>Please enter email</span>",
                email: "<span class='text-danger' style='font-size:small'>Please enter email correctly</span>"
            },
            password:{
                required: "<span class='text-danger' style='font-size:small'>Please enter password</span>",
            }
        }
    })
    $("#loginFrm").submit((e)=>{
        e.preventDefault();
        if($("#loginFrm").valid())
        {
            let formData = new FormData();
            formData.append('email', $("#email").val())
            formData.append('password', $("#password").val())

            showLoading();
            $.ajax({
                "url": "/api/login",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": formData,
                "success": function(response){
                    response = JSON.parse(response);
                    hideLoading();
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: response.message
                    }).then(()=>{
                        sessionStorage.setItem('token', 'Bearer ' + response.access_token)
                        window.location.replace('/dashboard')
                    })
                },
                "error": function(err){
                    hideLoading();
                    Swal.fire({
                        icon: "error",
                        title: err.statusText,
                        text: "Credential does not match"
                    })
                }
            })
        }
    })
</script>
@endsection
