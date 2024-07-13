<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./bootstrap-5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/fontawesome-free-6.5.2-web/css/all.min.css" />
    <link rel="stylesheet" href="./css/table.css" />
    <link rel="stylesheet" href="./css/sidebar.css" />
    <link rel="stylesheet" href="./css/form.css" />
    {{-- Dashboard --}}
    <link rel="stylesheet" href="./css/Dashboard.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <div class="container-fluid p-0 d-flex h-100">

        <!-- .................................Sidebar .......................................... -->
        <div id="bdSidebar" class="d-flex flex-column  flex-shrink-0 sidebar text-white offcanvas-md offcanvas-start">
          <a href="#" class="navbar-brand">
            <span class="d-flex justify-content-center fs-2 my-2 m_logo">Logo</span>
          </a>
          <ul class="mynav nav nav-pills flex-column mb-auto">
            <li class="nav-item d-flex align-items-center mb-2 sideBar_active">
              <a href="{{ route('dashboard') }}" class="active">
                <img src="image/sb_db.svg" class="m_svg">
                Dashboard
              </a>
            </li>
            <li class="nav-item d-flex align-items-center mb-2">
              <a href="{{ route('user') }}">
                <img src="image/sb_user.svg">
                User
              </a>
            </li>
            <li class="nav-item d-flex align-items-center mb-2">
              <a href="{{ route('language') }}">
                <img src="image/sb_lang.svg">
                Language
              </a>
            </li>
            <li class="nav-item d-flex align-items-center mb-2">
              <a href="category.html">
                <img src="image/sb_cat.svg">
                category
              </a>
            </li>

            <li class="nav-item d-flex align-items-center mb-2">
              <a href="artist.html">
                <img src="image/sb_art.svg">
                Artist
              </a>
            </li>
            <li class="nav-item d-flex align-items-center mb-2">
              <a href="album.html">
                <img src="image/sb_al.svg">
                Album

              </a>
            </li>
            <li class="nav-item d-flex align-items-center mb-2">
              <a href="music_video.html">
                <img src="image/sb_mv.svg">
                Music & Video
              </a>
            </li>
            <li class="nav-item d-flex align-items-center mb-2">
              <a href="premium.html">
                <img src="image/sb_pr.svg">
                Premium
              </a>
            </li>
          </ul>
        </div>

        <!-- .................................Content .......................................... -->

        <div class="flex-fill k_main d-flex align-items-end flex-column" style="background-color: #f5f5f5;">
          <div class="p-2 d-md-none d-flex text-white bg-success w-100">
            <a href="#" class="text-white" data-bs-toggle="offcanvas" data-bs-target="#bdSidebar">
              <i class="fa-solid fa-bars"></i>
            </a>
            <span class="ms-3">logo</span>
            <div class="top-user-responsive">
              <div class="dropdown alignment">
                <i class="fa-solid fa-circle-user"></i>
                <button class="btn dropdown-toggle" onclick="myFunctionR()" type="button" data-toggle="dropdown"
                  style="padding: 0 15px 0 5px !important">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-content dropdown-menu" id="myDropdownR">
                  <li><a data-bs-toggle="modal" data-bs-target="#chngPassModal"><img src="image/profile_cp.svg"
                        alt="">Change Password</a></li>
                  <li><a  data-bs-toggle="modal" data-bs-target="#logoutModal"><img src="image/profile_lo.svg">Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- content Table -->
          <div class="content w-100">
            <div class="top-user">
              <div class="dropdown alignment">
                <i class="fa-solid fa-circle-user k_usr"></i>
                <button class="btn dropdown-toggle" onclick="myFunction()" type="button" data-toggle="dropdown"
                  style="padding: 0 15px 0 5px !important">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-content dropdown-menu" id="myDropdown">
                  <li><a data-bs-toggle="modal" data-bs-target="#chngPassModal"><img src="image/profile_cp.svg" alt="">
                      Change Password</a></li>
                  <li><a data-bs-toggle="modal" data-bs-target="#logoutModal"><img src="image/profile_lo.svg">Logout</a></li>
                </ul>
              </div>
            </div>
          </div>


          <!-- Change password Modal Start -->
          <div class="modal fade" id="chngPassModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-right: 0 !important;" >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <i class="fas fa-eye-slash toggle-password" data-toggle="#confirmPassword"></i>
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
                              <a href="{{ route('logout') }}">Sure</a>
                      </div>
                  </div>
              </div>
          </div>

      </div>

      @yield('content')

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

      <!-- Chart 1 script -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
        // script.js
        document.addEventListener('DOMContentLoaded', () => {
          const ctx = document.getElementById('myChart').getContext('2d');

          const circles = [
            { percentage: 90, radius: 120, color: '#264C82', label: 'English' },
            { percentage: 85, radius: 95, color: '#3382DD', label: 'Hindi' },
            { percentage: 75, radius: 70, color: '#9BD3F5', label: 'Gujarati' },
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
              createConcentricCircle(ctx, circle.percentage, circle.radius, 15, circle.color); // Decrease thickness to 15
            });
          };

          drawChart();
        });
      </script>

      <!-- Chart script 2 -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
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
      <script src="../bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      @stack('script')
</body>
</html>
