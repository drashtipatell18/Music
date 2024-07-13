@extends('layouts.main')
@section('content')
    <section class="daily_price">
        <div class="p-3 btn-clr d-flex justify-content-between">
            <h3 class="fw-bolder">Users</h3>

        </div>
        <div class="border scrollTable2 bg-white p-3 m-3">
            <div class="container-fluid">
                <div class=" daily_table">
                    <table class="table_new">
                        <tr class="table_bottom_border">
                            <th>No.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-dark text-decoration-none">1</span>
                            </td>
                            <td class="k_user_img">
                                <img src="image/user.jpg" alt="user">
                            </td>
                            <td>Ketanbhai Jasani</td>
                            <td>abc@gmail.com</td>
                            <td>123456789</td>
                            <td>
                                <span class="me-1 k_status_active">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-dark text-decoration-none">2</span>
                            </td>
                            <td class="k_user_img">
                                <img src="image/user.jpg" alt="user">
                            </td>
                            <td>Ketanbhai Jasani</td>
                            <td>abc@gmail.com</td>
                            <td>123456789</td>
                            <td>
                                <span class="me-1 k_status_block">Block</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-dark text-decoration-none">3</span>
                            </td>
                            <td class="k_user_img">
                                <img src="image/user.jpg" alt="user">
                            </td>
                            <td>Ketanbhai Jasani</td>
                            <td>abc@gmail.com</td>
                            <td>123456789</td>
                            <td>
                                <span class="me-1 k_status_active">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-dark text-decoration-none">4</span>
                            </td>
                            <td class="k_user_img">
                                <img src="image/user.jpg" alt="user">
                            </td>
                            <td>Ketanbhai Jasani</td>
                            <td>abc@gmail.com</td>
                            <td>123456789</td>
                            <td>
                                <span class="me-1 k_status_block">Block</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-dark text-decoration-none">5</span>
                            </td>
                            <td class="k_user_img">
                                <img src="image/user.jpg" alt="user">
                            </td>
                            <td>Ketanbhai Jasani</td>
                            <td>abc@gmail.com</td>
                            <td>123456789</td>
                            <td>
                                <span class="me-1 k_status_active">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-dark text-decoration-none">6</span>
                            </td>
                            <td class="k_user_img">
                                <img src="image/user.jpg" alt="user">
                            </td>
                            <td>Ketanbhai Jasani</td>
                            <td>abc@gmail.com</td>
                            <td>123456789</td>
                            <td>
                                <span class="me-1 k_status_block">Block</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-dark text-decoration-none">7</span>
                            </td>
                            <td class="k_user_img">
                                <img src="image/user.jpg" alt="user">
                            </td>
                            <td>Ketanbhai Jasani</td>
                            <td>abc@gmail.com</td>
                            <td>123456789</td>
                            <td>
                                <span class="me-1 k_status_active">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-dark text-decoration-none">8</span>
                            </td>
                            <td class="k_user_img">
                                <img src="image/user.jpg" alt="user">
                            </td>
                            <td>Ketanbhai Jasani</td>
                            <td>abc@gmail.com</td>
                            <td>123456789</td>
                            <td>
                                <span class="me-1 k_status_block">Block</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-dark text-decoration-none">9</span>
                            </td>
                            <td class="k_user_img">
                                <img src="image/user.jpg" alt="user">
                            </td>
                            <td>Ketanbhai Jasani</td>
                            <td>abc@gmail.com</td>
                            <td>123456789</td>
                            <td>
                                <span class="me-1 k_status_active">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-dark text-decoration-none">10</span>
                            </td>
                            <td class="k_user_img">
                                <img src="image/user.jpg" alt="user">
                            </td>
                            <td>Ketanbhai Jasani</td>
                            <td>abc@gmail.com</td>
                            <td>123456789</td>
                            <td>
                                <span class="me-1 k_status_block">Block</span>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    {{-- <script>
        function myFunctionR() {
            document.getElementById("myDropdownR").classList.toggle("show");
        }
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        window.onclick = function (event) {
            if (!event.target.matches(".dropbtn")) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains("show")) {
                        openDropdown.classList.remove("show");
                    }
                }
            }
        };
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
</script> --}}
@endpush
