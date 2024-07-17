@php
    $page = "category";
@endphp
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
                    <form class="row g-3" id="addfrm">
                        <div class="col-12">
                            <label for="fname" class="form-label">Name :</label>
                            <input type="text" class="form-control" id="fname" name="fname">
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
                            <input type="file" class="form-control" id="inputImage" name="inputImage">
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
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        {{-- <tr>
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
                                    <span class="me-1 pt-3" data-bs-toggle="modal"
                                    data-bs-target="#editModal">
                                        <img src="image/edit.svg" class="k_edit" alt="">
                                    </span>
                                </div>
                            </td>
                        </tr> --}}
                    </tbody>
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
                    <form class="row g-3" id="editFrm">
                        <div class="col-12">
                            <label for="fname-edit" class="form-label">Name :</label>
                            <input type="text" name="fname-edit" class="form-control" id="fname-edit">
                        </div>
                        <div class="col-12">
                            <img src="" id="editImage" alt="">
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
<script>
    $("#editFrm").validate({
        rules:{
            "fname-edit":{
                required: true
            },
            "inputImage-edit": {
                required: true
            }
        },
        messages: {
            "fname-edit":{
                required: "<span class='text-danger' style='font-size:small'>Please enter name</span>"
            },
            "inputImage-edit": {
                required: "<span class='text-danger' style='font-size:small'>Please select image</span>"
            }
        }
    })
    $("#addfrm").validate({
        rules:{
            "fname":{
                required: true
            },
            "inputImage": {
                required: true
            }
        },
        messages: {
            "fname-edit":{
                required: "<span class='text-danger' style='font-size:small'>Please enter name</span>"
            },
            "inputImage-edit": {
                required: "<span class='text-danger' style='font-size:small'>Please select image</span>"
            }
        }
    })

    showLoading();
    $.ajax({
        "url": "http://127.0.0.1:8000/api/category",
        "method": "GET",
        "timeout": 0,
        "headers": {
            "Authorization": sessionStorage.getItem('token')
        },
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "success": function(response){
            response = JSON.parse(response)
            let i = 1;
            $.each(response.result, function(){
                let tr = `
                    <tr>
                        <td>
                            <span class="text-dark text-decoration-none">${i++}</span>
                        </td>
                        <td class="k_user_img">
                            <img src="/category_images/${this.image}" alt="user">
                        </td>
                        <td>${this.name}</td>
                        <td>
                            <button data-status="${(this.status == 'Active')?"Block":"Active"}" data-id="${this.id}" class="categoryStatusUpdate me-1 ${(this.status == 'Active')?"k_status_active":"k_status_block"}">${(this.status == 'Active')?"Active":"Block"}</button>
                        </td>
                        <td>
                            <div class="actions-btn d-flex ">
                                <span data-id="${this.id}" class="getCat me-1 pt-3" data-bs-toggle="modal"
                                data-bs-target="#editModal">
                                    <img src="image/edit.svg" class="k_edit" alt="">
                                </span>
                            </div>
                        </td>
                    </tr>
                `;
                $("#tbody").append(tr);
            });
            hideLoading();
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

    $("#tbody").on('click', '.categoryStatusUpdate', function(){
        let id = $(this).data('id');
        let status = $(this).data('status');
        showLoading();
        const form = new FormData();
        form.append('status', status);
        $.ajax({
            "url": "http://127.0.0.1:8000/api/category/updateStatus/" + id,
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Authorization": sessionStorage.getItem('token')
            },
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": form,
            "success": function(response){
                hideLoading()
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Status Updated"
                }).then(function(){
                    window.location.reload();
                })
            },
            "error": function(err){
                hideLoading()
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: err.responseText
                })
            }
        })
    });

    $("#tbody").on('click', '.getCat', function(){
        let id = $(this).data('id')
        showLoading();
        $.ajax({
            "url": "http://127.0.0.1:8000/api/category/" + id,
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Authorization": sessionStorage.getItem('token')
            },
            "success": function(response){
                hideLoading()

                $("#fname-edit").attr('data-id', id);
                $("#fname-edit").val(response.result.name)
                $("#editImage").attr('src', '/images/' + response.result.image)
            },
            "error": function(err){
                hideLoading()

                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: err.responseText
                })
            }
        })
    });

    $("#editFrm").submit(function(e){
        e.preventDefault();
        if($("#editFrm").valid())
        {
            showLoading();
            let id = $("#fname-edit").data('id');
            const form = new FormData();
            form.append('name', $("#fname-edit").val())
            form.append('status', 'Active')
            form.append('image', $("#inputImage-edit")[0].files[0])

            $.ajax({
                "url": "http://127.0.0.1:8000/api/category/update/" + id,
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
                        text: "Category Updated"
                    }).then(function(){
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
        }
    })
    $("#addfrm").submit(function(e){
        e.preventDefault();
        if($("#editFrm").valid())
        {
            showLoading();
            const form = new FormData();
            form.append('name', $("#fname").val())
            form.append('status', 'Active')
            form.append('image', $("#inputImage")[0].files[0])

            $.ajax({
                "url": "http://127.0.0.1:8000/api/category/store",
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
                        text: "Category Saved"
                    }).then(function(){
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
        }
    })
</script>
@endpush
