@extends('layouts.app')

@section('content')

<section class="Login_form">
    <div class="bg">
        <div class="bg-img bg-dark">
            <div class="Lbox ">
                <div class="inner-box rounded-3 border-light text-dark m-0 k_bg h-100">
                    <h2 class="login_title text-center">Reset Password</h2>
                    <form class="">
                        <div class="field">
                            <label for="newPassword" class="form-label mb-0 mt-3">New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="newPassword" />
                                <span class="input-group-text k_igt">
                                    <i class="fas fa-eye-slash toggle-password" data-toggle="#newPassword"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label for="confirmPassword" class="form-label mb-0 mt-3">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirmPassword" />
                                <span class="input-group-text  k_igt">
                                    <i class="fas fa-eye-slash toggle-password" data-toggle="#confirmPassword"></i>
                                </span>
                            </div>
                        </div>
                        <div class="password mb-4 fs-6 text-secondary">
                            <p>Both passwords must match</p>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <a href="Dashboard.html" type="submit" class="btn text-white align-items-center text-light k_loginBtn rounded-0">verify</a>
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

        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(item => {
            item.addEventListener('click', function () {
                const input = document.querySelector(this.getAttribute('data-toggle'));
                if (input.getAttribute('type') === 'password') {
                    input.setAttribute('type', 'text');
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                } else {
                    input.setAttribute('type', 'password');
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                }
            });
        });
    });
</script>
@endsection
