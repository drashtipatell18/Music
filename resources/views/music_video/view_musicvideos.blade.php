@php
    $page = 'Music_Video';
@endphp
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

                <!-- Add Modal Start -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog k_modalWide">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h2 class="pageTitleHeading">Add Music & Video</h2>
                                <form class="row g-3" id="insertMusic">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="fname" class="form-label">Name :</label>
                                        <input type="text" class="form-control" id="fname" name="fname">
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
                                        <label for="type" class="form-label">Type :</label>
                                        <select id="type" name="type" class="form-select"
                                            onchange="updateFileLabel()">
                                            <option value="audio">Audio</option>
                                            <option value="video">Video</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 ">
                                        <label for="inputImage" class="form-label" id="fileLabel">Choose File</label>
                                        <input type="file" class="form-control" id="inputImage" name="inputImage">
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
                                <thead>
                                    <tr class="table_bottom_border">
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Artist Name</th>
                                        <th>Audio/Video</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">

                                </tbody>
                            </table>

                            <!-- View modal -->
                            <div class="modal fade k_modalContainer" id="viewModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-right: 0 !important;">
                                <div class="modal-dialog k_modal-dialog ">
                                    <div class="modal-content p-3 justify-content-center">
                                        <button type="button" class="btn-close k_closeBtn" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        <div class="d-flex align-items-center row info">
                                            <div id="videoAudio" class="col-md-4 text-center mb-3">
                                                <img src="image/profile.jpg" alt="" class="form-image" />
                                            </div>
                                            <div class="col-md-8">
                                                <h2 class='fw-bold fs-4 mb-4'>Yash Desai</h2>
                                                <div class="data-center">
                                                    <div class="d-flex mb-2">
                                                        <h5 class='dot-width fs-6 fw-bold' style="width: 100px;">
                                                            Name </h5>
                                                        <p class='fs-6 mb-0'>:&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                                id="viewName"></span> </p>
                                                    </div>
                                                    <div class="d-flex mb-2">
                                                        <h5 class='dot-width fs-6 fw-bold' style="width: 100px;">
                                                            Artist </h5>
                                                        <p class='fs-6 mb-0'>:&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                                id="artistView"></span> </p>
                                                    </div>
                                                    <div class="d-flex mb-2">
                                                        <h5 class='dot-width fs-6 fw-bold' style="width: 100px;">
                                                            Album </h5>
                                                        <p class='fs-6 mb-0'>:&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                                id="albumView"></span> </p>
                                                    </div>
                                                    <div class="d-flex mb-2">
                                                        <h5 class='dot-width fs-6 fw-bold' style="width: 100px;">
                                                            Category </h5>
                                                        <p class='fs-6 mb-0'>:&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                                id="catView"></span> </p>
                                                    </div>
                                                    <!-- <div class="d-flex city-block"> -->
                                                    <div class="d-flex mb-2">
                                                        <h5 class='dot-width fs-6 fw-bold mb-0' style="width: 100px;">
                                                            Language </h5>
                                                        <p class='fs-6 mb-0'>:&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                                id="lanView"></span> </p>
                                                    </div>
                                                    <div class=" d-flex mb-2">
                                                        <h5 class='state-margin fs-6 fw-bold  mb-0' style="width: 70px;">
                                                            type </h5>
                                                        <p class='fs-6 mb-0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;:
                                                            &nbsp;&nbsp;&nbsp;<span id="typeView"></span> </p>
                                                    </div>
                                                    <div class=" d-flex mb-2">
                                                        <h5 class='state-margin fs-6 fw-bold  mb-0' style="width: 70px;">
                                                            Status </h5>
                                                        <p class='fs-6 mb-0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;:
                                                            &nbsp;&nbsp;&nbsp;<span id="statusView"></span> </p>
                                                    </div>
                                                    <div class=" d-flex mb-2">
                                                        <h5 class='state-margin fs-6 fw-bold  mb-0' style="width: 70px;">
                                                            Url </h5>
                                                        <p class='fs-6 mb-0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;:
                                                            &nbsp;&nbsp;&nbsp;<span id="urlView"></span> </p>
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
                                            <form class="row g-3" id="updateFrm">
                                                <div class="col-md-12">
                                                    <label for="fname-edit" class="form-label">Name :</label>
                                                    <input type="text" class="form-control" id="fname-edit"
                                                        name="fname-edit">
                                                </div>
                                                <div class="col-md-6 col-xl-4">
                                                    <label for="artist_id-edit" class="form-label">Artist name
                                                        :</label><br>
                                                    <select id="artist_id-edit" name="artist_id-edit"
                                                        class="form-select">
                                                        <option>Arman Malik</option>
                                                        <option>Camila Cabello</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-xl-4">
                                                    <label for="album_id-edit" class="form-label">Album name :</label>
                                                    <select id="album_id-edit" name="album_id-edit" class="form-select">
                                                        <option>Wonder</option>
                                                        <option>Camila Cabello</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-xl-4">
                                                    <label for="category_id-edit" class="form-label">Category :</label>
                                                    <select id="category_id-edit" name="category_id-edit"
                                                        class="form-select">
                                                        <option>Trending</option>
                                                        <option>Mood</option>
                                                        <option>Party</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-xl-4">
                                                    <label for="language_id-edit" class="form-label">Language :</label>
                                                    <select id="language_id-edit" name="language_id-edit"
                                                        class="form-select">
                                                        <option>English</option>
                                                        <option>Hindi</option>
                                                        <option>Gujarati</option>
                                                        <option>Punjabi</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-xl-4">
                                                    <label for="type" class="form-label">Type :</label>
                                                    <select id="type-edit" name="type" class="form-select"
                                                        onchange="updateFileLabel()">
                                                        <option value="audio">Audio</option>
                                                        <option value="video">Video</option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-6 ">
                                                    <label for="inputImage" class="form-label" id="fileLabel">Choose
                                                        File</label>
                                                    <input type="file" class="form-control" id="inputImage-edit"
                                                        name="inputImage-edit">
                                                </div>
                                                <div class="col-xl-6">
                                                    <label for="url-edit" class="form-label">URL :</label>
                                                    <input type="text" class="form-control" id="url-edit"
                                                        name="url-edit">
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

    @push('script')
        <script>
            Object.defineProperty(String.prototype, 'capitalize', {
                value: function() {
                    return this.charAt(0).toUpperCase() + this.slice(1);
                },
                enumerable: false
            });

            function myFunctionR() {
                document.getElementById("myDropdownR").classList.toggle("show");
            }

            function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
            }

            window.onclick = function(event) {
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

            document.addEventListener("DOMContentLoaded", function() {
                var dropdown = document.getElementsByClassName("dropdown-btnnn");

                for (var i = 0; i < dropdown.length; i++) {
                    dropdown[i].addEventListener("click", function() {
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

            // getting data in table
            showLoading();
            $.ajax({
                "url": "http://127.0.0.1:8000/api/music_videos",
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Authorization": sessionStorage.getItem('token')
                },
                "success": function(response) {
                    hideLoading()
                    let i = 1
                    $.each(response.result, function() {
                        let tr = `
                            <tr>
                                <td>
                                    <span class="text-dark text-decoration-none">${i++}</span>
                                </td>
                                <td>${this.name}</td>
                                <td>${this.artist.name}</td>
                                <td>
                                    <a class="k_audio" href="${this.url}">
                                        <i class="fa-solid fa-circle-play"></i>
                                    </a>
                                </td>
                                <td>${this.type.capitalize()}</td>
                                <td>
                                    <button data-id="${this.id}" data-status="${(this.status == 'Active')?'Block':'Active'}" class="me-1 updateStatus ${(this.status == 'Active')?'k_status_active':'k_status_block'}">${this.status.capitalize()}</button>
                                </td>
                                <td>
                                    <div class="actions-btn d-flex ">
                                        <span data-id="${this.id}" class="viewData me-2 pt-3" data-bs-toggle="modal" data-bs-target="#viewModal">
                                            <img src="image/view.svg" class="k_eye" alt="">
                                        </span>
                                        <span data-id="${this.id}" class="editData me-1 pt-3" data-bs-toggle="modal" data-bs-target="#editModal">
                                            <img src="image/edit.svg" class="k_edit" alt="">
                                    </div>
                                </td>
                            </tr>
                        `;
                        $("#tbody").append(tr)
                    })
                    // DataTable Code
                    $('.table_new').DataTable();

                    $("#tbody").on('click', '.updateStatus', function() {
                        showLoading();
                        let id = $(this).data('id');
                        let status = $(this).data('status');
                        const form = new FormData();
                        form.append('status', status);
                        $.ajax({
                            "url": "http://127.0.0.1:8000/api/music_videos/status/" + id,
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
                                    text: "Status Updated"
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

            // initialising data in dropdown

            //Artist
            $.ajax({
                "url": "http://127.0.0.1:8000/api/artist",
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Authorization": sessionStorage.getItem('token')
                },
                "success": function(response) {
                    $("#artist_id").empty();
                    $("#artist_id").append(`<option value="">-Select Artist-</option>`);
                    $("#artist_id-edit").empty();
                    $("#artist_id-edit").append(`<option value="">-Select Artist-</option>`);
                    $.each(response.result, function() {
                        $("#artist_id").append(
                            `<option value="${this.id}">${this.name.capitalize()}</option>`);
                        $("#artist_id-edit").append(
                            `<option value="${this.id}">${this.name.capitalize()}</option>`);
                    })
                }
            })
            //Album
            $.ajax({
                "url": "http://127.0.0.1:8000/api/albums",
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Authorization": sessionStorage.getItem('token')
                },
                "success": function(response) {
                    $("#album_id").empty();
                    $("#album_id").append(`<option value="">-Select Album-</option>`);
                    $("#album_id-edit").empty();
                    $("#album_id-edit").append(`<option value="">-Select Album-</option>`);
                    $.each(response.result, function() {
                        $("#album_id").append(
                            `<option value="${this.id}">${this.album_name.capitalize()}</option>`);
                        $("#album_id-edit").append(
                            `<option value="${this.id}">${this.album_name.capitalize()}</option>`);
                    })
                }
            })
            //Category
            $.ajax({
                "url": "http://127.0.0.1:8000/api/category",
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Authorization": sessionStorage.getItem('token')
                },
                "success": function(response) {
                    $("#category_id").empty();
                    $("#category_id").append(`<option value="">-Select Category-</option>`);
                    $("#category_id-edit").empty();
                    $("#category_id-edit").append(`<option value="">-Select Category-</option>`);
                    $.each(response.result, function() {
                        $("#category_id").append(
                            `<option value="${this.id}">${this.name.capitalize()}</option>`);
                        $("#category_id-edit").append(
                            `<option value="${this.id}">${this.name.capitalize()}</option>`);
                    })
                }
            })
            //Language
            $.ajax({
                "url": "http://127.0.0.1:8000/api/language",
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Authorization": sessionStorage.getItem('token')
                },
                "success": function(response) {
                    $("#language_id").empty();
                    $("#language_id").append(`<option value="">-Select Language-</option>`);
                    $("#language_id-edit").empty();
                    $("#language_id-edit").append(`<option value="">-Select Language-</option>`);
                    $.each(response.result, function() {
                        $("#language_id").append(
                            `<option value="${this.id}">${this.name.capitalize()}</option>`);
                        $("#language_id-edit").append(
                            `<option value="${this.id}">${this.name.capitalize()}</option>`);
                    })
                }
            });


            // Validating Insert Form
            $("#insertMusic").validate({
                rules: {
                    "fname": {
                        required: true
                    },
                    "artist_id": {
                        required: true
                    },
                    "album_id": {
                        required: true
                    },
                    "category_id": {
                        required: true
                    },
                    "language_id": {
                        required: true
                    },
                    "type": {
                        required: true
                    },
                    "inputImage": {
                        required: true
                    },
                    "url": {
                        required: function(element) {
                            return $("#type").val() === "image";
                        }
                    }
                },
                messages: {
                    "fname": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter name</span>"
                    },
                    "artist_id": {
                        required: "<span class='text-danger' style='font-size:small'>Please select an artist</span>"
                    },
                    "album_id": {
                        required: "<span class='text-danger' style='font-size:small'>Please select an album</span>"
                    },
                    "category_id": {
                        required: "<span class='text-danger' style='font-size:small'>Please select a category</span>"
                    },
                    "language_id": {
                        required: "<span class='text-danger' style='font-size:small'>Please select a language</span>"
                    },
                    "type": {
                        required: "<span class='text-danger' style='font-size:small'>Please select a type</span>"
                    },
                    "inputImage": {
                        required: "<span class='text-danger' style='font-size:small'>Please select an image</span>"
                    },
                    "url": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter a URL</span>"
                    }
                }
            });
            $("#insertMusic").submit(function(e) {
                e.preventDefault();
                if ($("#insertMusic").valid()) {
                    showLoading();
                    const form = new FormData($("#insertMusic")[0]);
                    form.append('name', $("#fname").val());
                    form.append('status', 'Active');
                    if ($("#inputImage")[0].files[0]) {
                        form.append('image', $("#inputImage")[0].files[0])
                    }
                    $.ajax({
                        "url": "http://127.0.0.1:8000/api/music_videos/insert",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Authorization": sessionStorage.getItem('token')
                        },
                        "processData": false,
                        "mimeType": "multipart/form-data",
                        "contentType": false,
                        "data": form,
                        "success": function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Music / Video Insert Successfully"
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
            });

            // Viewing Data
            $("#tbody").on('click', '.viewData', function() {
                let id = $(this).data('id');
                showLoading();
                $.ajax({
                    "url": "http://127.0.0.1:8000/api/music_videos/" + id,
                    "method": "GET",
                    "timeout": 0,
                    "headers": {
                        "Authorization": sessionStorage.getItem('token')
                    },
                    "success": function(response) {
                        hideLoading();
                        $("#viewName").text(response.result.name);
                        $("#artistView").text(response.result.artist.name);
                        $("#albumView").text(response.result.album.album_name);
                        $("#catView").text(response.result.category.name);
                        $("#lanView").text(response.result.language.name);
                        $("#typeView").text(response.result.type);
                        $("#statusView").text(response.result.status);
                        $("#urlView").text(response.result.url);

                        var contentType = response.result.type;
                        var contentUrl = response.result.url;
                        var contentHtml = '';

                        if (contentType === 'image') {
                            contentHtml = '<img width="200px" src="' + contentUrl +
                                '" alt="" class="form-image" />';
                        } else if (contentType === 'video') {
                            contentHtml = '<video width="200px" controls class="form-video"><source src="' +
                                contentUrl +
                                '" type="video/mp4">Your browser does not support the video tag.</video>';
                        } else if (contentType === 'audio') {
                            contentHtml = '<audio width="100px" controls class="form-audio"><source src="' +
                                contentUrl +
                                '" type="audio/mpeg">Your browser does not support the audio tag.</audio>';
                        }

                        $("#videoAudio").html(contentHtml);
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

            // Edit Button Click
            $("#tbody").on('click', '.editData', function() {
                let id = $(this).data('id');
                showLoading();
                $.ajax({
                    "url": "http://127.0.0.1:8000/api/music_videos/" + id,
                    "method": "GET",
                    "timeout": 0,
                    "headers": {
                        "Authorization": sessionStorage.getItem('token')
                    },
                    "success": function(response) {
                        hideLoading();
                        $("#fname-edit").attr('data-id', id);
                        $("#fname-edit").val(response.result.name);
                        $("#artist_id-edit").find(`option[value='${response.result.artist.id}']`).prop(
                            'selected', true);
                        $("#album_id-edit").find(`option[value='${response.result.album.id}']`).prop(
                            'selected', true);
                        $("#category_id-edit").find(`option[value='${response.result.category.id}']`).prop(
                            'selected', true);
                        $("#language_id-edit").find(`option[value='${response.result.language.id}']`).prop(
                            'selected', true);
                        $("#type-edit").find(`option[value='${response.result.type}']`).prop('selected',
                            true);
                        $("#url-edit").val(response.result.url);

                        // Handle file input
                        if (response.result.icons) {
                            // Get the file name from the path
                            var fileName = response.result.icons.split('/').pop();

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

            // Validating Update Form
            $("#updateFrm").validate({
                rules: {
                    "fname-edit": {
                        required: true
                    },
                    "artist_id-edit": {
                        required: true
                    },
                    "album_id-edit": {
                        required: true
                    },
                    "category_id-edit": {
                        required: true
                    },
                    "language_id-edit": {
                        required: true
                    },
                    "type-edit": {
                        required: true
                    },
                    "url-edit": {
                        required: true
                    }
                },
                messages: {
                    "fname-edit": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter name</span>"
                    },
                    "artist_id-edit": {
                        required: "<span class='text-danger' style='font-size:small'>Please select an artist</span>"
                    },
                    "album_id-edit": {
                        required: "<span class='text-danger' style='font-size:small'>Please select an album</span>"
                    },
                    "category_id-edit": {
                        required: "<span class='text-danger' style='font-size:small'>Please select a category</span>"
                    },
                    "language_id-edit": {
                        required: "<span class='text-danger' style='font-size:small'>Please select a language</span>"
                    },
                    "type-edit": {
                        required: "<span class='text-danger' style='font-size:small'>Please select a type</span>"
                    },
                    "url-edit": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter a URL</span>"
                    }
                }
            });

            $("#updateFrm").submit(function(e) {
                e.preventDefault();
                if ($("#updateFrm").valid()) {
                    showLoading();
                    let id = $("#fname-edit").data('id');
                    const formData = new FormData();
                    formData.append('name', $('#fname-edit').val());
                    formData.append('album_id', $('#album_id-edit').val());
                    formData.append('artist_id', $('#artist_id-edit').val());
                    formData.append('category_id', $('#category_id-edit').val());
                    formData.append('language_id', $('#language_id-edit').val());
                    formData.append('type', $('#type-edit').val());
                    formData.append('url', $('#url-edit').val());

                    var file = $('#inputImage-edit')[0].files[0];
                    if (file) {
                        formData.append('inputImage', file);
                    }

                    $.ajax({
                        "url": "http://127.0.0.1:8000/api/music_videos/update/" + id,
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
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Music / Video Updated Successfully"
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

            function updateFileLabel() {
                const typeSelect = document.getElementById('type-edit');
                const fileLabel = document.getElementById('fileLabel');
                const selectedType = typeSelect.value;

                let labelText;
                switch (selectedType) {
                    case 'audio':
                        labelText = 'Choose Audio';
                        break;
                    case 'video':
                        labelText = 'Choose Video';
                        break;
                    default:
                        labelText = 'Choose File';
                }

                fileLabel.textContent = labelText;
            }

            // Ensure the label is updated when the page loads if there is a preselected type
            document.addEventListener('DOMContentLoaded', updateFileLabel);
        </script>
    @endpush

@endsection
