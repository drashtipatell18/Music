@extends('layouts.main')
@section('title', 'Music & Video: Music App Management')
@section('content')

    <div class="container-fluid p-0 d-flex h-100">
        <div class="flex-fill d-flex flex-column align-items-end">
            <section class="daily_price">
                <div class="p-3 btn-clr d-flex justify-content-between">
                    <h3 class="fw-bolder">Music & Video</h3>
                    <button type="button" class="px-4 py-2 text-white rounded-2 fs-5 " data-bs-toggle="modal"
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
                    <div class="modal-dialog k_modalWide">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h2 class="pageTitleHeading">Add Music & Video</h2>
                                <form class="row g-3">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="fname" class="form-label">Name :</label>
                                        <input type="text" class="form-control" id="fname" name="name">
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <label for="arname" class="form-label">Artist name :</label><br>
                                        <select id="artist_id" name="artist_id" class="form-select">
                                            <option>Arman Malik</option>
                                            <option>Camila Cabello</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <label for="alname" class="form-label">Album name :</label>
                                        <select id="album_id" name="album_id" class="form-select">
                                            <option>Wonder</option>
                                            <option>Camila Cabello</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <label for="category" class="form-label">Category :</label>
                                        <select id="category_id" name="category_id" class="form-select">
                                            <option>Trending</option>
                                            <option>Mood</option>
                                            <option>Party</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <label for="language" class="form-label">Language :</label>
                                        <select id="language_id" name="language_id" class="form-select">
                                            <option>English</option>
                                            <option>Hindi</option>
                                            <option>Gujarati</option>
                                            <option>Punjabi</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <label for="sstatus" class="form-label">Type :</label>
                                        <select id="type" name="type" class="form-select">
                                            <option>Audio</option>
                                            <option>Video</option>
                                        </select>
                                    </div>
                                    {{-- <div class="col-md-6 col-xl-4">
                                        <label for="status" class="form-label">Status :</label>
                                        <select id="status" name="status" class="form-select">
                                            <option selected>Active</option>
                                            <option>Block</option>
                                        </select>
                                    </div> --}}
                                    <div class="col-xl-6 ">
                                        <label for="inputImage" class="form-label">Choose Image</label>
                                        <input type="file" class="form-control" id="icons" name="icons">
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="url" class="form-label">URL :</label>
                                        <input type="text" class="form-control" id="url" name="url">
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
                                    <th>Name</th>
                                    <th>Artist Name</th>
                                    <th>Audio/Video</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="text-dark text-decoration-none">1</span>
                                    </td>
                                    <td>Chale Aana</td>
                                    <td>Arman Malik</td>
                                    <td>
                                        <a class="k_audio" href="image/audio_sample.mp3">
                                            <i class="fa-solid fa-music"></i>
                                        </a>
                                    </td>
                                    <td>Audio
                                    <td>
                                        <span class="me-2 k_status_active">Active</span>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <a class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#viewModal">
                                                <img src="image/view.svg" class="k_eye" alt="">
                                            </a>
                                            <span class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#editModal">
                                                <!-- <i class="fa fa-pen-to-square k_edit" title="Edit"></i> -->
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
                                    <td>Kaun Tujhe</td>
                                    <td>Palak Machal</td>
                                    <td>
                                        <a class="k_audio" href="image/video_sample.mp4">
                                            <i class="fa-solid fa-circle-play"></i>
                                        </a>
                                    </td>
                                    <td>Video</td>
                                    <td>
                                        <span class="me-2 k_status_block">Block</span>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <span class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#viewModal">
                                                <img src="image/view.svg" class="k_eye" alt="">
                                            </span>
                                            <span class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#editModal">
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
                                    <td>Soulmate</td>
                                    <td>Arijit Shing</td>
                                    <td>
                                        <a class="k_audio" href="image/audio_sample.mp3">
                                            <i class="fa-solid fa-music"></i>
                                        </a>
                                    </td>
                                    <td>Audio</td>
                                    <td>
                                        <a class="me-2 k_status_active">Active</a>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <span class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#viewModal">
                                                <img src="image/view.svg" class="k_eye" alt="">
                                            </span>
                                            <span class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#editModal">
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
                                    <td>Let’s Nacho</td>
                                    <td>Badshah</td>
                                    <td>
                                        <a class="k_audio" href="image/video_sample.mp4">
                                            <i class="fa-solid fa-circle-play"></i>
                                        </a>
                                    </td>
                                    <td>Video</td>
                                    <td>
                                        <span class="me-2 k_status_block">Block</span>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <span class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#viewModal">
                                                <img src="image/view.svg" class="k_eye" alt="">
                                            </span>
                                            <span class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#editModal">
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
                                    <td>Kala Chashma</td>
                                    <td>Neha Kakkar</td>
                                    <td>
                                        <a class="k_audio" href="image/audio_sample.mp3">
                                            <i class="fa-solid fa-music"></i>
                                        </a>
                                    </td>
                                    <td>Audio</td>
                                    <td>
                                        <span class="me-1 k_status_block">Block</span>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <span class="me-2 pt-3" data-bs-toggle="modal" data-bs-target="#viewModal">
                                                <img src="image/view.svg" class="k_eye" alt="">
                                            </span>
                                            <span class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#editModal">
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
                                    <td>Teri Aankhon Main</td>
                                    <td>Neha Kakkar</td>
                                    <td>
                                        <a class="k_audio" href="image/video_sample.mp4">
                                            <i class="fa-solid fa-circle-play"></i>
                                        </a>
                                    </td>
                                    <td>Video</td>
                                    <td>
                                        <span class="me-1 k_status_active">Active</span>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <span class="me-2 pt-3" data-bs-toggle="modal" data-bs-target="#viewModal">
                                                <img src="image/view.svg" class="k_eye" alt="">
                                            </span>
                                            <span class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#editModal">
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
                                    <td>Maahi Ve</td>
                                    <td>Neha Kakkar</td>
                                    <td>
                                        <a class="k_audio" href="image/audio_sample.mp3">
                                            <i class="fa-solid fa-music"></i>
                                        </a>
                                    </td>
                                    <td>Audio</td>
                                    <td>
                                        <a class="me-2 k_status_active">Active</a>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <span class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#viewModal">
                                                <!-- <i class="fa-solid fa-eye k_eye" title="View"></i> -->
                                                <img src="image/view.svg" class="k_eye" alt="">
                                            </span>
                                            <span class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#editModal">
                                                <img src="image/edit.svg" class="k_edit" alt="">
                                                <!-- <a href="" class=" pt-3">
                                                <i class="fa-solid fa-trash-can k_delet" title="Delete"></i>
                                            </a> -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="text-dark text-decoration-none">8</span>
                                    </td>
                                    <td>Chaleya</td>
                                    <td>Arijit Shing</td>
                                    <td>
                                        <a class="k_audio" href="image/video_sample.mp4">
                                            <i class="fa-solid fa-circle-play"></i>
                                        </a>
                                    </td>
                                    <td>Video</td>
                                    <td>
                                        <span class="me-1 k_status_block">Block</span>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <span class="me-2 pt-3" data-bs-toggle="modal" data-bs-target="#viewModal">
                                                <img src="image/view.svg" class="k_eye" alt="">
                                            </span>
                                            <span class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#editModal">
                                                <img src="image/edit.svg" class="k_edit" alt="">
                                                <!-- <a href="" class=" pt-3">
                                                <i class="fa-solid fa-trash-can k_delet" title="Delete"></i>
                                            </a> -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="text-dark text-decoration-none">9</span>
                                    </td>
                                    <td>Dhoka Dhadi</td>
                                    <td>Palak Machal</td>
                                    <td>
                                        <a class="k_audio" href="image/audio_sample.mp3">
                                            <i class="fa-solid fa-music"></i>
                                        </a>
                                    </td>
                                    <td>Audio</td>
                                    <td>
                                        <a class="me-2 k_status_active">Active</a>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <span class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#viewModal">
                                                <!-- <i class="fa-solid fa-eye k_eye" title="View"></i> -->
                                                <img src="image/view.svg" class="k_eye" alt="">
                                            </span>
                                            <span class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#editModal">
                                                <img src="image/edit.svg" class="k_edit" alt="">
                                                <!-- <a href="" class=" pt-3">
                                                <i class="fa-solid fa-trash-can k_delet" title="Delete"></i>
                                            </a> -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="text-dark text-decoration-none">10</span>
                                    </td>
                                    <td>Heeriye </td>
                                    <td>Arijit Shing</td>
                                    <td>
                                        <a class="k_audio" href="image/video_sample.mp4">
                                            <i class="fa-solid fa-circle-play"></i>
                                        </a>
                                    </td>
                                    <td>Video</td>
                                    <td>
                                        <span class="me-1 k_status_block">Block</span>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex ">
                                            <span class="me-2 pt-3" data-bs-toggle="modal" data-bs-target="#viewModal">
                                                <img src="image/view.svg" class="k_eye" alt="">
                                            </span>
                                            <span class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#editModal">
                                                <img src="image/edit.svg" class="k_edit" alt="">
                                                <!-- <a href="" class=" pt-3">
                                                <i class="fa-solid fa-trash-can k_delet" title="Delete"></i>
                                            </a> -->
                                        </div>
                                    </td>
                                </tr>

                            </table>

                            <!-- View modal -->
                            <div class="modal fade k_modalContainer" id="viewModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true"
                                style="padding-right: 0 !important;">
                                <div class="modal-dialog k_modal-dialog ">
                                    <div class="modal-content p-3 justify-content-center">
                                        <button type="button" class="btn-close k_closeBtn" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        <div class="d-flex align-items-center row info">
                                            <div class="col-md-4 text-center mb-3">
                                                <img src="image/profile.jpg" alt="" class="form-image" />
                                            </div>
                                            <div class="col-md-8">
                                                <h2 class='fw-bold fs-4 mb-4'>Yash Desai</h2>
                                                <div class="data-center">
                                                    <div class="d-flex mb-2">
                                                        <h5 class='dot-width fs-6 fw-bold' style="width: 100px;">
                                                            Name </h5>
                                                        <p class='fs-6 mb-0'>:&nbsp;&nbsp;&nbsp;&nbsp;Familia </p>
                                                    </div>
                                                    <div class="d-flex mb-2">
                                                        <h5 class='dot-width fs-6 fw-bold' style="width: 100px;">
                                                            Artist </h5>
                                                        <p class='fs-6 mb-0'>:&nbsp;&nbsp;&nbsp;&nbsp; Camila Cabello
                                                        </p>
                                                    </div>
                                                    <div class="d-flex mb-2">
                                                        <h5 class='dot-width fs-6 fw-bold' style="width: 100px;">
                                                            Album </h5>
                                                        <p class='fs-6 mb-0'>:&nbsp;&nbsp;&nbsp;&nbsp; Familia </p>
                                                    </div>
                                                    <div class="d-flex mb-2">
                                                        <h5 class='dot-width fs-6 fw-bold' style="width: 100px;">
                                                            Category </h5>
                                                        <p class='fs-6 mb-0'>:&nbsp;&nbsp;&nbsp;&nbsp; Romence</p>
                                                    </div>
                                                    <!-- <div class="d-flex city-block"> -->
                                                    <div class="d-flex mb-2">
                                                        <h5 class='dot-width fs-6 fw-bold mb-0' style="width: 100px;">
                                                            Language </h5>
                                                        <p class='fs-6 mb-0'>:&nbsp;&nbsp;&nbsp;&nbsp; English</p>
                                                    </div>
                                                    <div class=" d-flex mb-2">
                                                        <h5 class='state-margin fs-6 fw-bold  mb-0'
                                                            style="width: 70px;">
                                                            type </h5>
                                                        <p class='fs-6 mb-0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;:
                                                            &nbsp;&nbsp;&nbsp; Audio</p>
                                                    </div>
                                                    <div class=" d-flex mb-2">
                                                        <h5 class='state-margin fs-6 fw-bold  mb-0'
                                                            style="width: 70px;">
                                                            Status </h5>
                                                        <p class='fs-6 mb-0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;:
                                                            &nbsp;&nbsp;&nbsp; Active</p>
                                                    </div>

                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Modal Start -->
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog k_modalWide">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h2 class="pageTitleHeading">Edit Music & Video</h2>
                                    <form class="row g-3">
                                        <div class="col-md-12">
                                            <label for="fname" class="form-label">Name :</label>
                                            <input type="text" class="form-control" id="fname">
                                        </div>
                                        <div class="col-md-6 col-xl-4">
                                            <label for="arname" class="form-label">Artist name :</label><br>
                                            <select id="arname" class="form-select">
                                                <option>Arman Malik</option>
                                                <option>Camila Cabello</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-xl-4">
                                            <label for="alname" class="form-label">Album name :</label>
                                            <select id="alname" class="form-select">
                                                <option>Wonder</option>
                                                <option>Camila Cabello</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-xl-4">
                                            <label for="category" class="form-label">Category :</label>
                                            <select id="category" class="form-select">
                                                <option>Trending</option>
                                                <option>Mood</option>
                                                <option>Party</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-xl-4">
                                            <label for="language" class="form-label">Language :</label>
                                            <select id="language" class="form-select">
                                                <option>English</option>
                                                <option>Hindi</option>
                                                <option>Gujarati</option>
                                                <option>Punjabi</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-xl-4">
                                            <label for="sstatus" class="form-label">Type :</label>
                                            <select id="sstatus" class="form-select">
                                                <option>Audio</option>
                                                <option>Video</option>
                                            </select>
                                        </div>
                                        {{-- <div class="col-md-6 col-xl-4">
                                            <label for="status" class="form-label">Status :</label>
                                            <select id="status" class="form-select">
                                                <option selected>Active</option>
                                                <option>Block</option>
                                            </select>
                                        </div> --}}
                                        <div class="col-xl-6 ">
                                            <label for="inputImage" class="form-label">Choose Image</label>
                                            <input type="file" class="form-control" id="inputImage">
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="url" class="form-label">URL :</label>
                                            <input type="text" class="form-control" id="url">
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
