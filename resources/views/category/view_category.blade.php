@extends('layouts.main')
@section('title', 'Category: Music App Management')
@section('content')
 <!-- main section -->
 <section class="daily_price">
    <div class="p-3 btn-clr d-flex justify-content-between">
        <h3 class="fw-bolder">Category</h3>
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
                    <h2 class="pageTitleHeading">Add Category</h2>
                    <form class="row g-3">
                        <div class="col-12">
                            <label for="fname" class="form-label">Name :</label>
                            <input type="text" class="form-control" id="fname">
                        </div>
                        {{-- <div class="col-12">
                            <label for="inputState" class="form-label">Status :</label>
                            <select id="inputState" class="form-select">
                                <option selected>Active</option>
                                <option>Block</option>
                            </select>
                        </div> --}}
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
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>
                            <span class="text-dark text-decoration-none">1</span>
                        </td>
                        <td class="k_user_img">
                            <img src="image/ca_mood.png" alt="user">
                        </td>
                        <td>Mood</td>
                        <td>
                            <span class="me-1 k_status_block">Block</span>
                        </td>
                        <td>
                            <div class="actions-btn d-flex ">
                                <!-- <a href="" class="me-1 pt-3">
                                    <i class="fa-solid fa-eye k_eye" title="View"></i>
                                </a>                                         -->
                                <span class="me-1 pt-3" data-bs-toggle="modal"
                                data-bs-target="#editModal">
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
                            <img src="image/ca_tre.png" alt="user">
                        </td>
                        <td>Trending</td>
                        <td>
                            <span class="me-1 k_status_active">Active</span>
                        </td>
                        <td>
                            <div class="actions-btn d-flex ">
                                <!-- <a href="" class="me-1 pt-3">
                                    <i class="fa-solid fa-eye k_eye" title="View"></i>
                                </a>                                         -->
                                <span class="me-1 pt-3" data-bs-toggle="modal"
                                data-bs-target="#editModal">
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
                            <img src="image/ca_par.png" alt="user">
                        </td>
                        <td>Party</td>
                        <td>
                            <span class="me-1 k_status_active">Active</span>
                        </td>
                        <td>
                            <div class="actions-btn d-flex ">
                                <!-- <a href="" class="me-1 pt-3">
                                    <i class="fa-solid fa-eye k_eye" title="View"></i>
                                </a>                                         -->
                                <span class="me-1 pt-3" data-bs-toggle="modal"
                                data-bs-target="#editModal">
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
                            <img src="image/ca_tre2.png" alt="user">
                        </td>
                        <td>Trending</td>
                        <td>
                            <span class="me-1 k_status_active">Active</span>
                        </td>
                        <td>
                            <div class="actions-btn d-flex ">
                                <!-- <a href="" class="me-1 pt-3">
                                    <i class="fa-solid fa-eye k_eye" title="View"></i>
                                </a>                                         -->
                                <span class="me-1 pt-3" data-bs-toggle="modal"
                                data-bs-target="#editModal">
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
                            <img src="image/ca_mood2.png" alt="user">
                        </td>
                        <td>Mood</td>
                        <td>
                            <span class="me-1 k_status_block">Block</span>
                        </td>
                        <td>
                            <div class="actions-btn d-flex ">
                                <!-- <a href="" class="me-1 pt-3">
                                    <i class="fa-solid fa-eye k_eye" title="View"></i>
                                </a>                                         -->
                                <span class="me-1 pt-3" data-bs-toggle="modal"
                                data-bs-target="#editModal">
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
                            <h2 class="pageTitleHeading">Edit Category</h2>
                    <form class="row g-3">
                        <div class="col-12">
                            <label for="fname" class="form-label">Name :</label>
                            <input type="text" class="form-control" id="fname">
                        </div>
                        {{-- <div class="col-12">
                            <label for="inputState" class="form-label">Status :</label>
                            <select id="inputState" class="form-select">
                                <option selected>Active</option>
                                <option>Block</option>
                            </select>
                        </div> --}}
                        <div class="col-12 ">
                            <label for="inputImage" class="form-label">Choose Image</label>
                            <input type="file" class="form-control" id="inputImage">
                        </div>
                        <div class="col-12 col-auto d-flex justify-content-center submit_button mt-5">
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
@endsection
@push('script')

@endpush
