<!-- Page Sidebar Start -->
<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper">
            <a href="index.html">
                <img class="img-fluid for-light" src="frontend/assets/images/logo/logo.png" alt="">
                <img class="img-fluid for-dark" src="frontend/assets/images/logo/logo_dark.png" alt="">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"></i></div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="index.html"><img class="img-fluid" src="frontend/assets/images/logo/logo-icon.png" alt=""></a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="{{ route('admin') }}">
                            <img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt="">
                        </a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>

                    <!-- Dashboard -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="{{ route('admin') }}">
                            <i class="fa fa-tachometer-alt"></i> <!-- Corrected Icon -->
                            <li><a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                        </a>
                    </li>

                    <!-- Course Management -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="{{ route('admin') }}">
                            <i class="fa fa-users"></i> <!-- Corrected Icon -->
                            <span>Courses </span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('student.bookings') }}">All Courses</a></li>
                        </ul>
                    </li>

                    <!-- Settings -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <i class="fa fa-cog"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.banners.index') }}">User Profile</a></li>
                        </ul>
                    </li>

                    
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<!-- Page Sidebar Ends -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var sidebarTitles = document.querySelectorAll(".sidebar-title");

        sidebarTitles.forEach(function (title) {
            title.addEventListener("click", function (e) {
                e.preventDefault(); // Prevent default action

                let submenu = this.nextElementSibling; // Get the submenu
                if (submenu && submenu.classList.contains("sidebar-submenu")) {
                    submenu.classList.toggle("d-block"); // Toggle visibility
                }
            });
        });
    });
</script>
