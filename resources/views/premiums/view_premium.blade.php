@php
    $page = 'Premium';
@endphp
@extends('layouts.main')
@section('title', 'Premium: Music App Management')
@section('content')

    <div class="container-fluid p-0 d-flex h-100">
        <div class="flex-fill  d-flex flex-column align-items-end">
            <section class="daily_price">
                <div class="p-3 btn-clr d-flex justify-content-between">
                    <h3 class="fw-bolder">Premium</h3>
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h2 class="pageTitleHeading">Add Premium</h2>
                                <form class="row g-3" id="insertFrm">
                                    <div class="col-md-6">
                                        <label for="pname" class="form-label">Premium name :</label>
                                        <input type="text" class="form-control" id="pname" name="pname">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="price" class="form-label">Price :</label>
                                        <input type="text" class="form-control" id="price" name="price">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="time" class="form-label">Time Period (days) :</label>
                                        <input type="text" class="form-control" id="time" name="time">
                                    </div>

                                    {{-- <div class="col-md-6">
                                        <label for="status" class="form-label">Status :</label>
                                        <select id="status" class="form-select">
                                            <option selected>Active</option>
                                            <option>Block</option>
                                        </select>
                                    </div> --}}

                                    <div class="col-12">
                                        <label for="description" class="form-label">Description :</label>
                                        <!-- <input type="text" class="form-control" id="description"> -->
                                        <textarea id="description" name="description" class="form-control k_fclr" rows="4"></textarea>
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
                                        <th>Premium name</th>
                                        <th>Price</th>
                                        <th>Time Period (days)</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    {{-- <tr>
                                        <td>
                                            <span class="text-dark text-decoration-none">10</span>
                                        </td>
                                        <td>
                                            <span class="text-dark text-decoration-none">Max</span>
                                        </td>
                                        <td>
                                            <span class="text-dark text-decoration-none">₹ 290</span>
                                        </td>
                                        <td>
                                            <span class="text-dark text-decoration-none">60</span>
                                        </td>

                                        <td>
                                            <span class="me-1 k_status_active">Active</span>
                                        </td>
                                        <td>
                                            <div class="actions-btn d-flex ">
                                                <span class="me-1 pt-3" data-bs-toggle="modal"
                                                    data-bs-target="#premiumModal">
                                                    <img src="image/view.svg" class="k_eye" alt="">
                                                </span>
                                                <span class="me-1 pt-3" data-bs-toggle="modal" data-bs-target="#editModal">
                                                    <img src="image/edit.svg" class="k_edit" alt="">
                                            </div>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>

                            <!-- View modal -->
                            <div class="modal fade k_modalContainer" id="premiumModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog k_modal-dialog">
                                    <div class="modal-content p-3 justify-content-center">
                                        <button type="button" class="btn-close k_closeBtn" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        <div class="d-flex align-items-center row info">
                                            <div class="col-md-4 text-center mb-3">
                                            </div>
                                            <div class="col-md-8">
                                                <h2 class='fw-bold fs-4 mb-4 '>Yash Desai</h2>
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

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                            <h2 class="pageTitleHeading">Edit Premium</h2>
                                            <form class="row g-3" id="updateFrm">
                                                <div class="col-md-6">
                                                    <label for="pname-edit" class="form-label">Premium name :</label>
                                                    <input type="text" class="form-control" id="pname-edit"
                                                        name="pname-edit">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="price-edit" class="form-label">Price :</label>
                                                    <input type="text" class="form-control" id="price-edit"
                                                        name="price-edit">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="time-edit" class="form-label">Time Period (days) :</label>
                                                    <input type="text" class="form-control" id="time-edit"
                                                        name="time-edit">
                                                </div>

                                                {{-- <div class="col-md-6">
                                                    <label for="status" class="form-label">Status :</label>
                                                    <select id="status" class="form-select">
                                                        <option selected>Active</option>
                                                        <option>Block</option>
                                                    </select>
                                                </div> --}}

                                                <div class="col-12">
                                                    <label for="description-edit" class="form-label">Description :</label>
                                                    <!-- <input type="text" class="form-control" id="description"> -->
                                                    <textarea id="description-edit" name="description-edit" class="form-control k_fclr" rows="4"></textarea>
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
            // function myFunctionR() {
            //     document.getElementById("myDropdownR").classList.toggle("show");
            // }

            // function myFunction() {
            //     document.getElementById("myDropdown").classList.toggle("show");
            // }

            // window.onclick = function(event) {
            //     if (!event.target.matches(".dropbtn")) {
            //         var dropdowns = document.getElementsByClassName("dropdown-content");
            //         var i;
            //         for (i = 0; i < dropdowns.length; i++) {
            //             var openDropdown = dropdowns[i];
            //             if (openDropdown.classList.contains("show")) {
            //                 openDropdown.classList.remove("show");
            //             }
            //         }
            //     }
            // };

            // document.addEventListener("DOMContentLoaded", function() {
            //     var dropdown = document.getElementsByClassName("dropdown-btnnn");

            //     for (var i = 0; i < dropdown.length; i++) {
            //         dropdown[i].addEventListener("click", function() {
            //             this.classList.toggle("active");
            //             var dropdownContent = this.nextElementSibling;
            //             if (dropdownContent.style.display === "block") {
            //                 dropdownContent.style.display = "none";
            //             } else {
            //                 dropdownContent.style.display = "block";
            //             }
            //         });
            //     }
            // });

            showLoading()
            $.ajax({
                "url": "http://127.0.0.1:8000/api/premiums",
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
                                <td>
                                    <span class="text-dark text-decoration-none">${this.premium_name}</span>
                                </td>
                                <td>
                                    <span class="text-dark text-decoration-none">₹ ${this.price}</span>
                                </td>
                                <td>
                                    <span class="text-dark text-decoration-none">${this.time_perid_days}</span>
                                </td>

                                <td>
                                    <button data-id="${this.id}" data-status="${(this.status == 'Block')?'Active':'Block'}" class="updateStatus me-1 ${(this.status == 'Active')?'k_status_active':'k_status_block'}">${this.status}</button>
                                </td>
                                <td>
                                    <div class="actions-btn d-flex ">
                                        <span data-id="${this.id}" class="me-1 pt-3" data-bs-toggle="modal"
                                            data-bs-target="#premiumModal">
                                            <img src="image/view.svg" class="k_eye" alt="">
                                        </span>
                                        <span data-id="${this.id}" class="editData me-1 pt-3" data-bs-toggle="modal" data-bs-target="#editModal">
                                            <img src="image/edit.svg" class="k_edit" alt="">
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
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: err.responseText
                    })
                }
            });

            // Update Status
            $("#tbody").on('click', '.updateStatus', function() {
                let id = $(this).data('id');
                let status = $(this).data('status');
                showLoading();
                const form = new FormData();
                form.append('status', status)
                $.ajax({
                    "url": '/api/premiums/updateStatus/' + id,
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
                            text: "Status Updated"
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
            })

            // Edit Data
            $("#tbody").on('click', '.editData', function() {
                let id = $(this).data('id');
                showLoading();
                $.ajax({
                    "url": "/api/premiums/" + id,
                    "method": "GET",
                    "timeout": 0,
                    "headers": {
                        "Authorization": sessionStorage.getItem('token')
                    },
                    "success": function(response) {
                        hideLoading()
                        $('#pname-edit').attr('data-id', id);
                        $('#pname-edit').val(response.result.premium_name);
                        $('#price-edit').val(response.result.price);
                        $('#time-edit').val(response.result.time_perid_days);
                        $('#description-edit').val(response.result.description);
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

            // Update Validation
            $("#updateFrm").validate({
                rules: {
                    "pname-edit": {
                        required: true
                    },
                    "price-edit": {
                        required: true,
                        number: true
                    },
                    "time-edit": {
                        required: true,
                        digits: true
                    },
                    "description-edit": {
                        required: true
                    }
                },
                messages: {
                    "pname-edit": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter a premium name</span>"
                    },
                    "price-edit": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter a price</span>",
                        number: "<span class='text-danger' style='font-size:small'>Please enter a valid number</span>"
                    },
                    "time-edit": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter a time period</span>",
                        digits: "<span class='text-danger' style='font-size:small'>Please enter a valid number of days</span>"
                    },
                    "description-edit": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter a description</span>"
                    }
                }
            });
            $("#updateFrm").submit(function(e) {
                e.preventDefault()
                if ($("#updateFrm").valid()) {
                    let id = $('#pname-edit').data('id');
                    showLoading();
                    $.ajax({
                        "url": "http://127.0.0.1:8000/api/premiums/update/" + id,
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Authorization": sessionStorage.getItem('token'),
                            "Content-Type": "application/json"
                        },
                        "data": JSON.stringify({
                            "premium_name": $('#pname-edit').val(),
                            "price": $('#price-edit').val(),
                            "time_perid_days": $('#time-edit').val(),
                            "status": "Active",
                            "description": $('#description-edit').val()
                        }),
                        "success": function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Premium Updated"
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
                }
            });

            // Insert Validation
            $("#insertFrm").validate({
                rules: {
                    "pname": {
                        required: true
                    },
                    "price": {
                        required: true,
                        number: true
                    },
                    "time": {
                        required: true,
                        digits: true
                    },
                    "description": {
                        required: true
                    }
                },
                messages: {
                    "pname": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter a premium name</span>"
                    },
                    "price": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter a price</span>",
                        number: "<span class='text-danger' style='font-size:small'>Please enter a valid number</span>"
                    },
                    "time": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter a time period</span>",
                        digits: "<span class='text-danger' style='font-size:small'>Please enter a valid number of days</span>"
                    },
                    "description": {
                        required: "<span class='text-danger' style='font-size:small'>Please enter a description</span>"
                    }
                }
            });
            $("#insertFrm").submit(function(e) {
                e.preventDefault()
                if ($("#insertFrm").valid()) {
                    showLoading();
                    $.ajax({
                        "url": "http://127.0.0.1:8000/api/premiums/insert",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Authorization": sessionStorage.getItem('token'),
                            "Content-Type": "application/json"
                        },
                        "data": JSON.stringify({
                            "premium_name": $('#pname').val(),
                            "price": $('#price').val(),
                            "time_perid_days": $('#time').val(),
                            "status": "Active",
                            "description": $('#description').val()
                        }),
                        "success": function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Premium Inserted"
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
                }
            })
        </script>
    @endpush
@endsection
