@php
    $page = 'albums';
@endphp
@extends('layouts.main')
@section('title', 'Albums: Music App Management')
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
                                <form class="row g-3" id="insertArtist">
                                    <div class="col-12">
                                        <label for="arName" class="form-label">Artist name :</label>
                                        <select id="arName" name="arName" class="form-select">
                                            <option value="">-Select Artist-</option>
                                            {{-- <option>Camila Cabello</option>
                                            <option>Shawn Mendes</option> --}}
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="fname" class="form-label">Album name :</label>
                                        <input type="text" name="fname" class="form-control" id="fname">
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
                                        <input type="file" name="inputImage" class="form-control" id="inputImage">
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
                                <thead>
                                    <tr class="table_bottom_border">
                                        <th>No.</th>
                                        <th>Image</th>
                                        <th>Album Name</th>
                                        <th>Artist Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">

                                </tbody>
                                {{-- <tr>
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
                                            <span class="me-1 " data-bs-toggle="modal" data-bs-target="#editModal">
                                                <img src="image/edit.svg" class="k_edit" alt="">
                                            </span>
                                        </div>
                                    </td>
                                </tr> --}}
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
                                        <form class="row g-3" id="updateAlbum">
                                            <div class="col-12">
                                                <label for="arName-edit" class="form-label">Artist name :</label>
                                                <select id="arName-edit" name="arName-edit" class="form-select">
                                                    <option value="">-Select Artist-</option>
                                                    {{-- <option>Camila Cabello</option>
                                                    <option>Shawn Mendes</option> --}}
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="fname-edit" class="form-label">Album name :</label>
                                                <input type="text" class="form-control" id="fname-edit" name="fname-edit">
                                            </div>
                                            <div class="col-12">
                                                <img src="" style="width: 100px" id="oldImg" alt="">
                                            </div>
                                            {{-- <div class="col-12">
                                                <label for="inputState" class="form-label">Status :</label>
                                                <select id="inputState" class="form-select">
                                                    <option selected>Active</option>
                                                    <option>Block</option>
                                                </select>
                                            </div> --}}
                                            <div class="col-12 ">
                                                <label for="inputImage-edit" class="form-label">Choose Image</label>
                                                <input type="file" class="form-control" id="inputImage-edit" name="inputImage-edit">
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
    @push('script')
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

        showLoading();
        $.ajax({
            "url": "http://127.0.0.1:8000/api/albums",
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Authorization": sessionStorage.getItem('token')
            },
            "success": function(response){
                hideLoading();
                let i = 1;
                $.each(response.result, function(){
                    let tr = `
                        <tr>
                            <td>
                                <span class="text-dark text-decoration-none">${i++}</span>
                            </td>
                            <td class="k_user_img">
                                <img src="/images/${this.image}" alt="user">
                            </td>
                            <td>${this.album_name}</td>
                            <td>${this.artist_name}</td>
                            <td>
                                <button data-status="${(this.status == 'Active')?'Block':'Active'}" data-id="${this.id}" class="updateStatus me-1 ${(this.status == 'Active')?'k_status_active':'k_status_block'}">${(this.status == 'Active')?'Active':'Block'}</button>
                            </td>
                            <td>
                                <div class="actions-btn d-flex ">
                                    <span data-id="${this.id}" class="me-1 getAlbum" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <img src="image/edit.svg" class="k_edit" alt="">
                                    </span>
                                </div>
                            </td>
                        </tr>
                    `;
                    $("#tbody").append(tr);
                })
            },
            "error": function(err){
                hideLoading();
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: err.responseText
                })
            }
        });
        $.ajax({
            "url": "http://127.0.0.1:8000/api/artist",
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Authorization": sessionStorage.getItem('token')
            },
            "success": function(response){
                $.each(response.result, function(){
                    $("#arName-edit").append(`
                        <option value="${this.name}">${this.name}</option>
                    `);
                    $("#arName").append(`
                        <option value="${this.name}">${this.name}</option>
                    `);
                })
            }
        })

        $("#insertArtist").validate({
            rules: {
                arName: {
                    required: true
                },
                fname: {
                    required: true
                },
                inputImage: {
                    required: true
                }
            },
            messages: {
                arName: {
                    required: "<span class='text-danger' style='font-style: small'>Please select artist name</span>"
                },
                fname: {
                    required: "<span class='text-danger' style='font-style: small'>Please enter name</span>"
                },
                inputImage: {
                    required: "<span class='text-danger' style='font-style: small'>Please select image</span>"
                }
            }
        })
        $("#insertArtist").submit(function(e){
            e.preventDefault();
            if($("#insertArtist").valid())
            {
                showLoading();
                let form = new FormData();
                form.append('artist_name', $("#arName").val())
                form.append('album_name', $("#fname").val())
                form.append('status', 'Active')
                form.append('image', $("#inputImage")[0].files[0])

                $.ajax({
                    "url": "http://127.0.0.1:8000/api/albums/store",
                    "method": "POST",
                    "timeout": 0,
                    "processData": false,
                    "mimeType": "multipart/form-data",
                    "contentType": false,
                    "data": form,
                    "headers": {
                        "Authorization": sessionStorage.getItem('token')
                    },
                    "success": function(response){
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Album stored successfully"
                        }).then(()=>{
                            window.location.reload()
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

        $("#updateAlbum").validate({
            rules: {
                "arName-edit": {
                    required: true
                },
                "fname-edit": {
                    required: true
                },
                // "inputImage-edit": {
                //     required: true
                // }
            },
            messages: {
                "arName-edit": {
                    required: "<span class='text-danger' style='font-style: small'>Please select artist name</span>"
                },
                "fname-edit": {
                    required: "<span class='text-danger' style='font-style: small'>Please enter name</span>"
                },
                // "inputImage-edit": {
                //     required: "<span class='text-danger' style='font-style: small'>Please select image</span>"
                // }
            }
        });
        $("#updateAlbum").submit(function(e){
            e.preventDefault();
            if($("#updateAlbum").valid())
            {
                let id = $("#fname-edit").data('id');
                let form = new FormData();

                form.append('artist_name', $("#arName-edit").val())
                form.append('album_name', $("#fname-edit").val())
                form.append('image', $("#inputImage-edit")[0].files[0])
                form.append('status', 'Active')

                showLoading();

                $.ajax({
                    "url": "http://127.0.0.1:8000/api/albums/update/1",
                    "method": "POST",
                    "timeout": 0,
                    "processData": false,
                    "mimeType": "multipart/form-data",
                    "contentType": false,
                    "data": form,
                    "headers": {
                        "Authorization": sessionStorage.getItem('token')
                    },
                    "success": function(response){
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Album Updated"
                        }).then(()=>{
                            window.location.reload()
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

        $("#tbody").on('click', '.updateStatus', function(){
            let id = $(this).data('id')
            let status = $(this).data('status')
            showLoading();
            const form = new FormData();
            form.append('status', status)
            $.ajax({
                "url": "http://127.0.0.1:8000/api/albums/status/" + id,
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "headers": {
                    "Authorization": sessionStorage.getItem('token')
                },
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form,
                "success": function(response){
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: "Status updated successfully."
                    }).then(()=>{
                        window.location.reload();
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
        });

        $("#tbody").on('click', '.getAlbum', function(){
            showLoading();
            let id = $(this).data("id");
            $.ajax({
                "url": "http://127.0.0.1:8000/api/albums/" + id,
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Authorization": sessionStorage.getItem('token')
                },
                "success": function(response){
                    $("#oldImg").attr('src', "/images/" + response.result.image)
                    $("#fname-edit").val(response.result.album_name)
                    $("#arName-edit").find(`option[value='${response.result.artist_name}']`).prop('selected', true)
                    $("#fname-edit").attr('data-id', response.result.id);
                    hideLoading()
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
    @endpush
  @endsection
