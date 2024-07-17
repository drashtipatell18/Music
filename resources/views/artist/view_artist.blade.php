@php
    $page = 'artist';
@endphp
@extends('layouts.main')
@section('title', 'Artist: Music App Management')
@section('content')
    <section class="daily_price">
        <div class="p-3 btn-clr d-flex justify-content-between">
            <h3 class="fw-bolder">Artist</h3>
            <button type="button" class="px-4 py-2 text-white rounded-2 fs-5" data-bs-toggle="modal"
                data-bs-target="#addModal">
                + &nbsp;Add
            </button>
        </div>
        <!-- Add Modal Start -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h2 class="pageTitleHeading">Add Artist</h2>
                        <form class="row g-3" id="addArtist">
                            <div class="col-12">
                                <label for="fname" class="form-label">Name :</label>
                                <input type="text" class="form-control"name="fname" id="fname">
                            </div>
                            <div class="col-12">
                                <label for="fname" class="form-label">Description :</label>
                                <textarea style="width: 100%;" name="description" id="description" class="k_fclr"></textarea>
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
                        <thead>
                            <tr class="table_bottom_border">
                                <th>No.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="artistsList">

                    </table>
                </div>

                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h2 class="pageTitleHeading">Edit Artist</h2>
                                <form class="row g-3" id="editArtist">
                                    <div class="col-12">
                                        <label for="fname" class="form-label">Name :</label>
                                        <input type="text" class="form-control" name="name" id="fname-edit">
                                    </div>
                                    <div class="col-12">
                                        <label for="fname" class="form-label">Description :</label>
                                        <textarea style="width: 100%;" name="description" id="edit-description" class="k_fclr"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputImage-edit" class="form-label"> Image</label>
                                        <div>
                                            <img id="current-image" src="" alt="Current Image"
                                                style="width: 20%; max-height: 200px; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputImage-edit" class="form-label">Choose New Image</label>
                                        <input type="file" class="form-control" id="inputImage-edit"
                                            name="inputImage-edit">
                                    </div>
                                    <div class="col-12 col-auto d-flex justify-content-center submit_button mt-5">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            // Function to load languages
            function loadartists() {
                showLoading();
                $.ajax({
                    url: "{{ route('artist') }}",
                    type: 'GET',
                    headers: {
                        'Authorization': sessionStorage.getItem('token')
                    },
                    dataType: 'json',
                    success: function(response) {
                        var artistsList = $('#artistsList');
                        artistsList.empty(); // Clear existing data

                        hideLoading();

                        if (response.success) {
                            $.each(response.result, function(index, artist) {
                                artistsList.append(`
                                <tr>
                                    <td>
                                        <span class="text-dark text-decoration-none">${index + 1}</span>
                                    </td>
                                    <td class="k_user_img">
                                        <img src="/images/${artist.image}" alt="${artist.name}">
                                    </td>
                                    <td>${artist.name}</td>
                                    <td>${artist.description}</td>
                                    <td>
                                        <button data-id="${this.id}" data-status="${(this.status == 'active')?'block':'active'}" class="artistStatusChange me-1 ${(this.status == 'active')?'k_status_active':'k_status_block'}">${(this.status == 'active')?'Active':'Block'}</button>
                                    </td>
                                    <td>
                                        <div class="actions-btn d-flex">
                                            <span data-id="${this.id}" class="me-1 pt-3 editArtist" data-bs-toggle="modal" data-bs-target="#editModal">
                                                <img src="image/edit.svg" class="k_edit" alt="">
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            `);
                            });
                        } else {
                            artistsList.append('<tr><td colspan="5">No languages found.</td></tr>');
                        }
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr);
                    }
                });
            }

            // Load languages on page load
            loadartists();

            $("#artistsList").on('click', '.editArtist', function() {
                let id = $(this).data('id');
                showLoading();
                $.ajax({
                    url: "http://127.0.0.1:8000/api/artist/" + id,
                    method: "GET",
                    timeout: 0,
                    headers: {
                        "Authorization": sessionStorage.getItem('token')
                    },
                    success: function(response) {
                        console.log(response);
                        hideLoading();
                        $("#fname-edit").attr('data-id', id);
                        $("#fname-edit").val(response.result.name);
                        $("#edit-description").val(response.result.description);
                        let currentImageUrl = response.result
                            .image; // Ensure this URL is correct
                        $("#current-image").attr('src', '/images/' + currentImageUrl);

                        $('#editModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching artist data:', error);
                        hideLoading();
                    }
                });
            });

            $('#inputImage-edit').on('change', function(event) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#current-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(event.target.files[0]);
            });

            $("#artistsList").on('click', '.artistStatusChange', function() {
                let id = $(this).data('id');
                let status = $(this).data('status');
                let formData = new FormData();
                formData.append('status', status);
                showLoading();
                $.ajax({
                    "url": "http://127.0.0.1:8000/api/artist/status/" + id,
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

            $("#editArtist").validate({
                rules: {
                    "name": {
                        required: true
                    },
                    "description": {
                        required: true
                    },
                },
                messages: {
                    "name": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter name</span>"
                    },
                    "description": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter description</span>"
                    }
                }
            })

            $("#addArtist").validate({
                rules: {
                    "fname": {
                        required: true
                    },
                    "description": {
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
                    "description": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter description</span>"
                    },
                    "inputImage": {
                        required: "<span class='text-danger' style='font-size:small'>Please select image</span>"
                    }
                }
            })

            $("#addArtist").submit(function(e) {
                e.preventDefault();
                if ($("#addArtist").valid()) {
                    showLoading();
                    const formData = new FormData();
                    formData.append('name', $("#fname").val());
                    formData.append('description', $("#description").val());
                    formData.append('status', 'active');
                    formData.append('image', $("#inputImage")[0].files[0]);
                    $.ajax({
                        "url": "http://127.0.0.1:8000/api/artist/store",
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
                                text: "Artist Added Successfully."
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

            $("#editArtist").submit(function(e) {
                e.preventDefault();
                if ($("#editArtist").valid()) {
                    showLoading();
                    let id = $("#fname-edit").data('id');
                    const form = new FormData();
                    form.append('name', $("#fname-edit").val())
                    form.append('description', $("#edit-description").val())
                    form.append('status', 'Active')
                    form.append('image', $("#inputImage-edit")[0].files[0])

                    $.ajax({
                        "url": "http://127.0.0.1:8000/api/artist/update/" + id,
                        "method": "POST",
                        "timeout": 0,
                        "processData": false,
                        "mimeType": "multipart/form-data",
                        "contentType": false,
                        "data": form,
                        "headers": {
                            "Authorization": sessionStorage.getItem('token')
                        },
                        "success": function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Category Updated"
                            }).then(function() {
                                window.location.reload();
                            })
                        },
                        "error": function(err) {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: err.responseText
                            })
                        }
                    })
                }
            })
        });
    </script>
@endpush
