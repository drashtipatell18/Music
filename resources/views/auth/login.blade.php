@extends('layouts.app')
@section('title', 'Login: Music App Management')
@section('content')

<!-- Forgot Password Modal -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="sendOtp">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Enter your email address and we'll send you otp to reset your password.</p>
                <div class="mb-3">
                    <label for="resetEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="resetEmail" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="sendOtpBtn" class="btn btn-primary">Send OTP</button>
            </div>
        </div>
        <div class="modal-content d-none" id="resetPassword">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Enter your otp received and new password.</p>
                <div class="mb-3">
                    <label for="otp" class="form-label">OTP</label>
                    <input type="number" class="form-control" id="otp" required>
                </div>
                <div class="mb-3">
                    <label for="newpassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newpassword" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="resetPasswordBtn" class="btn btn-primary">Reset Password</button>
            </div>
        </div>
    </div>
</div>
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
                            <a href="#" data-bs-target="#forgotPasswordModal" data-bs-toggle="modal" class="text-dark">Forgot password?</a>
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
    let otp = 0;
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
    });

    $("#sendOtpBtn").click(function(){
        if(!$("#resetEmail").val() || $("#resetEmail").val() == '')
        {
            Swal.fire({
                icon: "warning",
                title: "Warning",
                text: "Please enter your email id"
            })

            return;
        }

        showLoading();
        let formData = new FormData();
        formData.append('email', $("#resetEmail").val())
        $.ajax({
            "url": "/api/forget-password",
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": formData,
            "success": function(response){
                response = JSON.parse(response)
                otp = response.otp;
                Swal.fire({
                    icon: "success",
                    title: "OTP Sent",
                    text: "Please check your mail id and enter OTP and new password to reset your password"
                }).then(()=>{
                    $("#resetPassword").removeClass('d-none')
                    $("#sendOtp").addClass('d-none')
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
    })

    $("#resetPasswordBtn").click(function(){
        if(!$("#otp").val() || $("#otp").val() == '')
        {
            Swal.fire({
                icon: "warning",
                title: "Warning",
                text: "Please enter your otp"
            })

            return;
        }
        if(!$("#newpassword").val() || $("#newpassword").val() == '')
        {
            Swal.fire({
                icon: "warning",
                title: "Warning",
                text: "Please enter your new password"
            })

            return;
        }
        if($("#otp").val() != otp)
        {
            Swal.fire({
                icon: "warning",
                title: "Warning",
                text: "Invalid OTP"
            })

            return;
        }

        showLoading();
        let formData = new FormData();
        formData.append('email', $("#resetEmail").val())
        formData.append('password', $("#newpassword").val())
        $.ajax({
            "url": "/api/reset-password",
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": formData,
            "success": function(response){
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Password reset successful."
                }).then(()=>{
                    $("#resetEmail").val('')
                    $("#newpassword").val('')
                    $("#otp").val('')

                    $("#resetPassword").addClass('d-none')
                    $("#sendOtp").removeClass('d-none')

                    $("#forgotPasswordModal").modal('hide')
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
    })
</script>
@endsection
