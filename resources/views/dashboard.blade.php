@php
    $page = "dashboard";
@endphp
@extends('layouts.main')
@section('title', 'Dashboard: Music App Management')
@section('content')
    <!-- Dashboard Content -->
    <section class="k_dash daily_price ">
        <div class="p-3 btn-clr d-flex justify-content-between">
            <h3 class="fw-bolder">Dashboard</h3>
        </div>
        <div class="row">
            <a href="{{ route('music_videos') }}" class=" col-md-6 col-xl-4 k_db_box mb-4">
                <div class="card m-1">
                    <div class="row g-0">
                        <div class="col-10">
                            <div class="card-body">
                                <h5 class="k_db_name">Music</h5>
                                <p class="k_db_num">214</p>
                            </div>
                        </div>
                        <div class="col-2 d-flex align-items-end justify-content-center">
                            <img src="image/db_m.svg" class="k_bdIcon">
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('albums') }}" class=" col-md-6 col-xl-4 k_db_box  mb-4">
                <div class="card m-1">
                    <div class="row g-0">
                        <div class="col-10">
                            <div class="card-body">
                                <h5 class="k_db_name">Album</h5>
                                <p class="k_db_num">62</p>
                            </div>
                        </div>
                        <div class="col-2 d-flex align-items-end justify-content-center">
                            <img src="image/db_al.svg" class="k_bdIcon">
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('music_videos') }}" class=" col-md-6 col-xl-4 k_db_box  mb-4">
                <div class="card m-1">
                    <div class="row g-0">
                        <div class="col-10">
                            <div class="card-body">
                                <h5 class="k_db_name">Video</h5>
                                <p class="k_db_num">134</p>
                            </div>
                        </div>
                        <div class="col-2 d-flex align-items-end justify-content-center">
                            <img src="image/db_v.svg" class="k_bdIcon">
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('language') }}" class="col-md-6 col-xl-4 k_db_box  mb-4">
                <div class="card m-1">
                    <div class="row g-0">
                        <div class="col-10">
                            <div class="card-body">
                                <h5 class="k_db_name">Language</h5>
                                <p class="k_db_num">9</p>
                            </div>
                        </div>
                        <div class="col-2 d-flex align-items-end justify-content-center">
                            <img src="image/db_lan.svg" class="k_bdIcon">
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('category') }}" class="col-md-6 col-xl-4 k_db_box  mb-4">
                <div class="card m-1">
                    <div class="row g-0">
                        <div class="col-10">
                            <div class="card-body">
                                <h5 class="k_db_name">Category</h5>
                                <p class="k_db_num">15</p>
                            </div>
                        </div>
                        <div class="col-2 d-flex align-items-end justify-content-center">
                            <img src="image/db_cat.svg" class="k_bdIcon">
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('artist') }}" class="col-md-6 col-xl-4 k_db_box  mb-4">
                <div class="card m-1">
                    <div class="row g-0">
                        <div class="col-10">
                            <div class="card-body">
                                <h5 class="k_db_name">Artist</h5>
                                <p class="k_db_num">34</p>
                            </div>
                        </div>
                        <div class="col-2 d-flex align-items-end justify-content-center">
                            <img src="image/db_ar.svg" class="k_bdIcon">
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="row">
            <div class="col-xl-7 k_db_ch1 mb-4">
                <section class="k_sec">
                    <h4 class="k_db_f">Top Listening</h4>
                    <div class="k_chart">
                        <div class="legend">
                            <div class="legend-item">
                                <div style="background-color: #264C82;"></div> <span>English</span>
                            </div>
                            <div class="legend-item">
                                <div style="background-color: #3382DD;"></div> <span>Hindi</span>
                            </div>
                            <div class="legend-item">
                                <div style="background-color: #9BD3F5;"></div> <span>Gujarati</span>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="myChart" width="300px" height="300"></canvas>
                            <div class="tooltip" id="tooltip"></div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-xl-5 k_db_ch2 mb-4 ">
                <section>
                    <h4 class="k_db_f">Total Revenue</h4>
                    <canvas id="myChart2"></canvas>
                </section>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
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
    </script>

    <!-- Chart 1 script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // script.js
        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('myChart').getContext('2d');

            const circles = [{
                    percentage: 90,
                    radius: 120,
                    color: '#264C82',
                    label: 'English'
                },
                {
                    percentage: 85,
                    radius: 95,
                    color: '#3382DD',
                    label: 'Hindi'
                },
                {
                    percentage: 75,
                    radius: 70,
                    color: '#9BD3F5',
                    label: 'Gujarati'
                },
            ];

            const createConcentricCircle = (ctx, percentage, radius, lineWidth, color) => {
                const startAngle = -0.5 * Math.PI;
                const endAngle = startAngle + (2 * Math.PI * (percentage / 100));
                const centerX = ctx.canvas.width / 2;
                const centerY = ctx.canvas.height / 2;

                // Draw the gray portion
                ctx.beginPath();
                ctx.arc(centerX, centerY, radius, endAngle, startAngle + 2 * Math.PI);
                ctx.lineWidth = lineWidth;
                ctx.strokeStyle = '#ededed';
                ctx.stroke();

                // Draw the filled portion
                ctx.beginPath();
                ctx.arc(centerX, centerY, radius, startAngle, endAngle);
                ctx.lineWidth = lineWidth;
                ctx.strokeStyle = color;
                ctx.lineCap = 'round';
                ctx.stroke();
            };

            const drawChart = () => {
                ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
                circles.forEach(circle => {
                    createConcentricCircle(ctx, circle.percentage, circle.radius, 15, circle
                        .color); // Decrease thickness to 15
                });
            };

            drawChart();
        });

        var ctx = document.getElementById('myChart2').getContext('2d');
        var myChart2 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Premium User',
                    backgroundColor: '#264C82',
                    data: [50, 50, 70, 55, 54, 52, 54, 73, 52, 78, 62, 64],
                    barPercentage: 0.7,
                    categoryPercentage: 0.6
                }, {
                    label: 'Non Normal User',
                    backgroundColor: '#3382DD',
                    data: [72, 72, 88, 69, 65, 63, 62, 89, 65, 60, 91, 73],
                    barPercentage: 0.7,
                    categoryPercentage: 0.6
                }]
            },
            options: {
                scales: {
                    x: {
                        grid: {
                            display: false,
                        },
                        stacked: false,
                    },
                    y: {
                        stacked: false,
                        ticks: {
                            stepSize: 30,
                            beginAtZero: true
                        },
                        title: {
                            display: true,
                            text: 'Users',
                            font: {
                                size: 14
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    }
                }
            }
        });
    </script>
@endpush
