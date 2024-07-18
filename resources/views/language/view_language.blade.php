@php
    $page = 'language';
@endphp
@extends('layouts.main')
@section('title', 'Languages: Music App Management')
@section('content')
    <style>
        .k_delet {
            background: #162640 !important;
            padding: 10px !important;
            border-radius: 50% !important;
            cursor: pointer !important;
            color: white;
            margin-right: 10px;
        }
    </style>
    <section class="daily_price">
        <div class="p-3 btn-clr d-flex justify-content-between">
            <h3 class="fw-bolder">Language</h3>
            <!-- <span > -->
            <button type="button" class="px-4 py-2 text-white rounded-2 fs-5" data-bs-toggle="modal"
                data-bs-target="#addModal">
                + &nbsp;Add
            </button>
            <!-- </span> -->
        </div>

        <!-- Add Modal Start -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h2 class="pageTitleHeading">Add Language</h2>
                        <form class="row g-3" id="addLanguage">
                            <div class="col-12">
                                <label for="fname" class="form-label">Name :</label>
                                <input type="text" class="form-control" id="fname" name="fname">
                            </div>
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
                        <tbody id="languagesList">

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
                                <h2 class="pageTitleHeading">Edit Language</h2>
                                <form class="row g-3" id="editLanguage">
                                    <div class="col-12">
                                        <label for="fname-edit" class="form-label">Name :</label>
                                        <input type="text" class="form-control" id="fname-edit" name="fname-edit">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputImage-edit" class="form-label"> Image</label>
                                        <div>
                                            <img id="current-image" src="" alt="Current Image"
                                                style="width: 20%; max-height: 200px; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                        <label for="inputImage-edit" class="form-label">Choose Image</label>
                                        <input type="file" class="form-control" name="inputImage-edit"
                                            id="inputImage-edit">
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
        $(document).ready(function() {
            // Function to load languages
            function loadLanguages() {
                showLoading();
                $.ajax({
                    url: "{{ route('language') }}",
                    type: 'GET',
                    headers: {
                        'Authorization': sessionStorage.getItem('token')
                    },
                    dataType: 'json',
                    success: function(response) {
                        var languagesList = $('#languagesList');
                        languagesList.empty(); // Clear existing data

                        hideLoading();

                        if (response.success) {
                            $.each(response.result, function(index, language) {
                                languagesList.append(`
                                <tr>
                                    <td>
                                        <span class="text-dark text-decoration-none">${index + 1}</span>
                                    </td>
                                    <td class="k_user_img">
                                        <img src="/images/${language.image}" alt="${language.name}">
                                    </td>
                                    <td>${language.name}</td>
                                    <td>
                                        <button data-id="${this.id}" data-status="${(this.status == 'active')?'block':'active'}" class="languageStatusChange me-1 ${(this.status == 'active')?'k_status_active':'k_status_block'}">${(this.status == 'active')?'Active':'Block'}</button>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex">
                                            <span data-id="${this.id}" class="me-1 pt-3 editLanguage" data-bs-toggle="modal" data-bs-target="#editModal">
                                                <img src="image/edit.svg" class="k_edit" alt="">
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            `);
                            });
                        } else {
                            languagesList.append('<tr><td colspan="5">No languages found.</td></tr>');
                        }
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr);
                    }
                });
            }

            // Load languages on page load
            loadLanguages();

            $("#languagesList").on('click', '.editLanguage', function() {
                let id = $(this).data('id');
                showLoading();
                $.ajax({
                    "url": "http://127.0.0.1:8000/api/language/" + id,
                    "method": "GET",
                    "timeout": 0,
                    "headers": {
                        "Authorization": sessionStorage.getItem('token')
                    },
                    "success": function(response) {
                        hideLoading();
                        $("#fname-edit").attr('data-id', id);
                        $("#fname-edit").val(response.result.name)
                            let currentImageUrl = response.result
                            .image; // Ensure this URL is correct
                        $("#current-image").attr('src', '/images/' + currentImageUrl);

                    }
                })
            });

            $('#inputImage-edit').on('change', function(event) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#current-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(event.target.files[0]);
            });

            $("#languagesList").on('click', '.languageStatusChange', function() {
                let id = $(this).data('id');
                let status = $(this).data('status');
                let formData = new FormData();
                formData.append('status', status);
                showLoading();
                $.ajax({
                    "url": "http://127.0.0.1:8000/api/language/status/" + id,
                    "method": "POST",
                    "timeout": 0,
                    "processData": false,
                    "mimeType": "multipart/form-data",
                    "contentType": false,
                    "data": formData,
                    "headers": {
                        "Authorization": sessionStorage.getItem('token')
                    },
                    "success": function(response) {
                        hideLoading();
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Language status changed"
                        }).then(function() {
                            window.location.reload();
                        })
                    },
                    "error": function(err) {
                        hideLoading();
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: err.responseText
                        })
                    }
                })
            });

            $("#editLanguage").validate({
                rules: {
                    "fname-edit": {
                        required: true
                    },
                },
                messages: {
                    "fname-edit": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter name</span>"
                    },
                }
            })

            $("#addLanguage").validate({
                rules: {
                    "fname": {
                        required: true
                    },
                    "inputImage": {
                        required: true
                    }
                },
                messages: {
                    "fname": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter name</span>"
                    },
                    "inputImage": {
                        required: "<span class='text-danger' style='font-size:small'>Please select image</span>"
                    }
                }
            })

            $("#addLanguage").submit(function(e) {
                e.preventDefault();
                if ($("#addLanguage").valid()) {
                    showLoading();
                    const formData = new FormData();
                    formData.append('name', $("#fname").val());
                    formData.append('status', 'active');
                    formData.append('image', $("#inputImage")[0].files[0]);
                    $.ajax({
                        "url": "http://127.0.0.1:8000/api/language/insert",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Authorization": sessionStorage.getItem('token')
                        },
                        "processData": false,
                        "mimeType": "multipart/form-data",
                        "contentType": false,
                        "data": formData,
                        "success": function(response) {
                            hideLoading();
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Language Added Successfully."
                            }).then(function() {
                                window.location.reload();
                            })
                        },
                        "error": function(err) {
                            hideLoading();
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: err.responseText
                            })
                        }
                    })
                }
            })
            $("#editLanguage").submit(function(e) {
                e.preventDefault();
                if ($("#editLanguage").valid()) {
                    showLoading();
                    let id = $("#fname-edit").data('id');
                    const form = new FormData();
                    form.append('name', $("#fname-edit").val());
                    form.append('status', 'active');
                    form.append('image', $("#inputImage-edit")[0].files[0])

                    $.ajax({
                        url: "http://127.0.0.1:8000/api/language/update/" + id,
                        method: "POST",
                        headers: {
                            "Authorization": sessionStorage.getItem('token')
                        },
                        processData: false,
                        contentType: false,
                        data: form,
                        success: function(response) {
                            hideLoading();
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Language Updated Successfully."
                            }).then(function() {
                                window.location.reload();
                            });
                        },
                        error: function(err) {
                            hideLoading();
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: err.responseText
                            });
                        }
                    });
                }
            });
           

        });
    </script>
@endpush
