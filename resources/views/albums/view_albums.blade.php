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
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="fname" class="form-label">Album name :</label>
                                        <input type="text" name="fname" class="form-control" id="fname">
                                    </div>
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
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="fname-edit" class="form-label">Album name :</label>
                                                <input type="text" class="form-control" id="fname-edit"
                                                    name="fname-edit">
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="inputImage" class="form-label" id="fileLabel">Choose
                                                    File</label>
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
                        <!-- Edit Modal End -->


                    </div>
                </div>
            </section>
        </div>
    </div>
    @push('script')
        <script>
            showLoading();
            $.ajax({
                "url": "http://127.0.0.1:8000/api/albums",
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Authorization": sessionStorage.getItem('token')
                },
                "success": function(response) {
                    hideLoading();
                    let i = 1;
                    $.each(response.result, function() {
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
                    // DataTable Code
                    $('.table_new').DataTable();
                },
                "error": function(err) {
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
                "success": function(response) {
                    $.each(response.result, function() {
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
            $("#insertArtist").submit(function(e) {
                e.preventDefault();
                if ($("#insertArtist").valid()) {
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
                        "success": function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Album stored successfully"
                            }).then(() => {
                                window.location.reload()
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
            $('#inputImage-edit').on('change', function(event) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#current-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(event.target.files[0]);
            });

            $("#updateAlbum").submit(function(e) {
                e.preventDefault();
                if ($("#updateAlbum").valid()) {
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
                        "success": function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Album Updated"
                            }).then(() => {
                                window.location.reload()
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

            $("#tbody").on('click', '.updateStatus', function() {
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
                    "success": function(response) {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Status updated successfully."
                        }).then(() => {
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
            });

            $("#tbody").on('click', '.getAlbum', function() {
                showLoading();
                let id = $(this).data("id");
                $.ajax({
                    "url": "http://127.0.0.1:8000/api/albums/" + id,
                    "method": "GET",
                    "timeout": 0,
                    "headers": {
                        "Authorization": sessionStorage.getItem('token')
                    },
                    "success": function(response) {
                        $("#fname-edit").val(response.result.album_name)
                        $("#arName-edit").find(`option[value='${response.result.artist_name}']`).prop(
                            'selected', true)
                        $("#fname-edit").attr('data-id', response.result.id);
                        if (response.result.image) {
                        var fileName = response.result.image.split('/').pop();

                        // Create a new FileList object
                        var fileList = new DataTransfer();
                        var file = new File([""], fileName, {
                            type: "file"
                        });
                        fileList.items.add(file);

                        // Set the files property of the input element
                        $('#inputImage-edit')[0].files = fileList.files;

                        // Update the label to show the file name
                        $('#inputImage-edit').next('.custom-file-label').html(fileName);
                    }
                        hideLoading()
                    },
                    "error": function(err) {
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
