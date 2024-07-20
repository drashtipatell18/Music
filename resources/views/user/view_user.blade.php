@php
    $page = "user";
@endphp
@extends('layouts.main')
@section('title', 'Users: Music App Management')
@section('content')
    <section class="daily_price">
        <div class="p-3 btn-clr d-flex justify-content-between">
            <h3 class="fw-bolder">Users</h3>

        </div>
        <div class="border scrollTable2 bg-white p-3 m-3">
            <div class="container-fluid">
                <div class=" daily_table">
                    <table class="table_new">
                        <thead>
                            <tr class="table_bottom_border">
                                <th>No.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        showLoading();
        $("#tbody").empty();
        $.ajax({
            "url": "/api/user",
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Authorization": sessionStorage.getItem('token')
            },
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "success": function(response){
                hideLoading();
                response = JSON.parse(response);
                let i = 1;
                $.each(response.result, function(){
                    let tr = `
                    <tr>
                        <td>
                            <span class="text-dark text-decoration-none">${i++}</span>
                        </td>
                        <td class="k_user_img">
                            <img src="image/user.jpg" alt="user">
                        </td>
                        <td>${this.name}</td>
                        <td>${this.email}</td>
                        <td>${this.phone}</td>
                        <td>
                            <span data-id="${this.id}" data-status="${(this.status == 'active')?'block':'active'}" class="updateStatus me-1 ${(this.status == 'active')?'k_status_active':'k_status_block'}">${(this.status == 'active')?'Active':'Block'}</span>
                        </td>
                    </tr>
                    `;
                    $("#tbody").append(tr)
                });

                $("#tbody").on('click', '.updateStatus', function(){
                    showLoading();
                    let id = $(this).data('id');
                    const formData = new FormData();
                    formData.append('status', $(this).data('status'));

                    $.ajax({
                        "url": "http://127.0.0.1:8000/api/user/status-update/" + id,
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Authorization": sessionStorage.getItem('token')
                        },
                        "processData": false,
                        "mimeType": "multipart/form-data",
                        "contentType": false,
                        "data": formData,
                        "success": function(response){
                            hideLoading();
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "User status updated"
                            }).then(function(){
                                window.location.reload();
                            })
                        },
                        "error": function(err){
                            hideLoading();
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "Internal server error occurred"
                            })
                        }
                    })
                })
            },
            "error": function(err){
                hideLoading()
                console.log(err);
            }
        })
    </script>
@endpush
