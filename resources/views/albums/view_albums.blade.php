@extends('layouts.main')
@section('content')


    <div class="container-fluid p-0 d-flex h-100">
        <div class=" flex-fill d-flex flex-column align-items-end">
            <section class="daily_price">
                <div class="p-3 btn-clr d-flex justify-content-between align-items-center">
                    <h3 class="fw-bolder">Album</h3>
                    <button type="button" class="px-4 py-2 text-white rounded-2 fs-5" data-bs-toggle="modal"
                        data-bs-target="#addModal">
                        + &nbsp;Add
                    </button>
                </div>

                <!-- Change password Modal Start -->
                <div class="modal fade" id="chngPassModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h2 class="pageTitleHeading">Change password</h2>
                                <div class="field">
                                    <label for="oldPassword" class="form-label mb-0 mt-3">Old Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="oldPassword" />
                                        <span class="input-group-text k_igt">
                                            <i class="fas fa-eye-slash toggle-password" data-toggle="#newPassword"></i>
                                        </span>
                                    </div>
                                </div>
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
                                            <i class="fas fa-eye-slash toggle-password"
                                                data-toggle="#confirmPassword"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="password mb-4 fs-6 text-secondary">
                                    <p>Both passwords must match</p>
                                </div>
                                <div class="d-flex justify-content-center mt-5">
                                    <a href="Dashboard.html" type="submit"
                                        class="btn text-white align-items-center text-light k_loginBtn rounded-0">verify</a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Change password Modal End -->

                <!-- Logout Modal Start -->
                <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body k_modal-body">
                                <p>Are you Sure to Logout?</p>
                                <div class="k_lob d-flex">
                                    <button type="button" class="k_loClose" data-bs-dismiss="modal"
                                        aria-label="Close">Cancel</button>
                                    <a href="Login.html">Sure</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Logout Modal End -->


                <!-- Add Modal Start -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h2 class="pageTitleHeading">Add Album</h2>
                                <form class="row g-3">
                                    <div class="col-12">
                                        <label for="arName" class="form-label">Artist name :</label>
                                        <select id="arName" class="form-select">
                                            <option>Camila Cabello</option>
                                            <option>Shawn Mendes</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="fname" class="form-label">Album name :</label>
                                        <input type="text" class="form-control" id="fname">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputState" class="form-label">Status :</label>
                                        <select id="inputState" class="form-select">
                                            <option selected>Active</option>
                                            <option>Block</option>
                                        </select>
                                    </div>
                                    <div class="col-12 ">
                                        <label for="inputImage" class="form-label">Choose Image</label>
                                        <input type="file" class="form-control" id="inputImage">
                                    </div>
                                    <div class="col-12 col-auto d-flex justify-content-center submit_button mt-5">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Modal End -->

                <div class="border scrollTable2 bg-white p-3 m-3">
                    <div class="container-fluid">
                        <div class=" daily_table">
                            <table class="table_new">
                                <tr class="table_bottom_border">
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Album Name</th>
                                    <th>Artist Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="text-dark text-decoration-none">1</span>
                                    </td>
                                    <td class="k_user_img">
                                        <img src="image/al1.png" alt="user">
                                    </td>
                                    <td>Mood</td>
                                    <td>Arman Malik
                                    </td>
                                    <td>
                                        <span class="me-1 k_status_active">Active</span>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <!-- <a href="" class="me-1 pt-3">
                                                <i class="fa-solid fa-eye k_eye" title="View"></i>
                                            </a>                                         -->
                                            <span class="me-1 " data-bs-toggle="modal" data-bs-target="#editModal">
                                                <img src="image/edit.svg" class="k_edit" alt="">
                                                <!-- <a href="" class=" pt-3">
                                                <i class="fa-solid fa-trash-can k_delet" title="Delete"></i>
                                            </a> -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="text-dark text-decoration-none">2</span>
                                    </td>
                                    <td class="k_user_img">
                                        <img src="image/al2.png" alt="user">
                                    </td>
                                    <td> Lofi</td>
                                    <td>Palak Machal </td>
                                    <td>
                                        <span class="me-1 k_status_block">Block</span>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <!-- <a href="" class="me-1 pt-3">
                                                <i class="fa-solid fa-eye k_eye" title="View"></i>
                                            </a>                                         -->
                                            <span class="me-1 " data-bs-toggle="modal" data-bs-target="#editModal">
                                                <img src="image/edit.svg" class="k_edit" alt="">
                                                <!-- <a href="" class=" pt-3">
                                                <i class="fa-solid fa-trash-can k_delet" title="Delete"></i>
                                            </a> -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="text-dark text-decoration-none">3</span>
                                    </td>
                                    <td class="k_user_img">
                                        <img src="image/al3.png" alt="user">
                                    </td>
                                    <td> Love</td>
                                    <td>Arijit Shing </td>
                                    <td>
                                        <span class="me-1 k_status_block">Block</span>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <!-- <a href="" class="me-1 pt-3">
                                                <i class="fa-solid fa-eye k_eye" title="View"></i>
                                            </a>                                         -->
                                            <span class="me-1 " data-bs-toggle="modal" data-bs-target="#editModal">
                                                <img src="image/edit.svg" class="k_edit" alt="">
                                                <!-- <a href="" class=" pt-3">
                                                <i class="fa-solid fa-trash-can k_delet" title="Delete"></i>
                                            </a> -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="text-dark text-decoration-none">4</span>
                                    </td>
                                    <td class="k_user_img">
                                        <img src="image/al4.png" alt="user">
                                    </td>
                                    <td> Party</td>
                                    <td>Badshah </td>
                                    <td>
                                        <span class="me-1 k_status_active">Active</span>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <!-- <a href="" class="me-1 pt-3">
                                                <i class="fa-solid fa-eye k_eye" title="View"></i>
                                            </a>                                         -->
                                            <span class="me-1 " data-bs-toggle="modal" data-bs-target="#editModal">
                                                <img src="image/edit.svg" class="k_edit" alt="">
                                                <!-- <a href="" class=" pt-3">
                                                <i class="fa-solid fa-trash-can k_delet" title="Delete"></i>
                                            </a> -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="text-dark text-decoration-none">5</span>
                                    </td>
                                    <td class="k_user_img">
                                        <img src="image/al5.png" alt="user">
                                    </td>
                                    <td> Sad</td>
                                    <td>Neha Kakkar </td>
                                    <td>
                                        <span class="me-1 k_status_block">Block</span>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <!-- <a href="" class="me-1 pt-3">
                                                <i class="fa-solid fa-eye k_eye" title="View"></i>
                                            </a>                                         -->
                                            <span class="me-1 " data-bs-toggle="modal" data-bs-target="#editModal">
                                                <img src="image/edit.svg" class="k_edit" alt="">
                                                <!-- <a href="" class=" pt-3">
                                                <i class="fa-solid fa-trash-can k_delet" title="Delete"></i>
                                            </a> -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="text-dark text-decoration-none">6</span>
                                    </td>
                                    <td class="k_user_img">
                                        <img src="image/al3.png" alt="user">
                                    </td>
                                    <td> Love</td>
                                    <td>Arijit Shing</td>
                                    <td>
                                        <span class="me-1 k_status_block">Block</span>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <!-- <a href="" class="me-1 pt-3">
                                                <i class="fa-solid fa-eye k_eye" title="View"></i>
                                            </a>                                         -->
                                            <span class="me-1" data-bs-toggle="modal" data-bs-target="#editModal">
                                                <img src="image/edit.svg" class="k_edit" alt="">
                                                <!-- <a href="" class=" pt-3">
                                                <i class="fa-solid fa-trash-can k_delet" title="Delete"></i>
                                            </a> -->
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <span class="text-dark text-decoration-none">7</span>
                                    </td>
                                    <td class="k_user_img">
                                        <img src="image/al2.png" alt="user">
                                    </td>
                                    <td> Mood</td>
                                    <td>Palak Machal </td>
                                    <td>
                                        <span class="me-1 k_status_active">Active</span>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <!-- <a href="" class="me-1 pt-3">
                                                <i class="fa-solid fa-eye k_eye" title="View"></i>
                                            </a>                                         -->
                                            <span class="me-1 " data-bs-toggle="modal" data-bs-target="#editModal">
                                                <img src="image/edit.svg" class="k_edit" alt="">
                                                <!-- <a href="" class=" pt-3">
                                                <i class="fa-solid fa-trash-can k_delet" title="Delete"></i>
                                            </a> -->
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </div>


                        <!-- Edit Modal Start -->
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h2 class="pageTitleHeading">Edit Album</h2>
                                        <form class="row g-3">
                                            <div class="col-12">
                                                <label for="arName" class="form-label">Artist name :</label>
                                                <select id="arName" class="form-select">
                                                    <option>Camila Cabello</option>
                                                    <option>Shawn Mendes</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="fname" class="form-label">Album name :</label>
                                                <input type="text" class="form-control" id="fname">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputState" class="form-label">Status :</label>
                                                <select id="inputState" class="form-select">
                                                    <option selected>Active</option>
                                                    <option>Block</option>
                                                </select>
                                            </div>
                                            <div class="col-12 ">
                                                <label for="inputImage" class="form-label">Choose Image</label>
                                                <input type="file" class="form-control" id="inputImage">
                                            </div>
                                            <div
                                                class="col-12 col-auto d-flex justify-content-center submit_button mt-5">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Modal End -->


                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
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
    </script>
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
  @endsection
