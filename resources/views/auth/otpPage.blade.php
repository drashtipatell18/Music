@extends('layouts.app')

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
                    <div class="inner-box rounded-3 border-light  text-dark m-0 bg-white">
                        <h2 class="login_title text-center">Email Verification</h2>
                        <p class="text-center k_rtxt">OTP Has been sent to {{ $email }}</p>
                        <form method="POST" action="{{ route('verify.otp') }}">
                            @csrf
                            <div class="otp_box_container d-flex justify-content-center">
                                <input class="otp_input" type="text" maxlength="1" name="otp[]" oninput="moveToNext(this, event)"
                                    onkeypress="return isNumber(event)">
                                <input class="otp_input" type="text" maxlength="1" name="otp[]" oninput="moveToNext(this, event)"
                                    onkeypress="return isNumber(event)">
                                <input class="otp_input" type="text" maxlength="1" name="otp[]" oninput="moveToNext(this, event)"
                                    onkeypress="return isNumber(event)">
                                <input class="otp_input" type="text" maxlength="1" name="otp[]" oninput="moveToNext(this, event)"
                                    onkeypress="return isNumber(event)">
                                <input class="otp_input" type="text" maxlength="1" name="otp[]" oninput="moveToNext(this, event)"
                                    onkeypress="return isNumber(event)">
                                <input class="otp_input" type="text" maxlength="1" name="otp[]" oninput="moveToNext(this, event)"
                                    onkeypress="return isNumber(event)">
                            </div>

                            <div class="text-center">
                                <p>Didn’t receive code? <a class=" text-decoration-underline text-dark" href="{{ route('resend.otp') }}">Resend</a></p>
                            </div>
                            <div class="d-flex justify-content-center mt-5">
                                <button type="submit" class="btn text-white align-items-center text-light k_loginBtn rounded-0" onclick="redirectToResetPassword()">Continue</button>
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

    <!-- otp input field -->
    <script>
        function moveToNext(input, event) {
            if (input.value.length >= input.maxLength) {
                let next = input.nextElementSibling;
                if (next && next.tagName === "INPUT") {
                    next.focus();
                }
            }
        }

        function isNumber(event) {
            var char = String.fromCharCode(event.which);
            if (!(/[0-9]/.test(char))) {
                event.preventDefault();
            }
        }
        function redirectToResetPassword() {
            window.location.href = '/reset-password';
        }
    </script>
    <script src="../bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>
@endsection
