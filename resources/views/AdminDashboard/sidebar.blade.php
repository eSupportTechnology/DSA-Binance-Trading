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
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Course Management -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="{{ route('admin') }}">
                            <i class="fa fa-users"></i> <!-- Corrected Icon -->
                            <span>Courses Management</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('courses.index') }}">All Courses</a></li>
                            <li><a href="{{ route('courses.create') }}">Add Courses</a></li>
                        </ul>
                    </li>

                    <!-- Course Management -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="{{ route('admin') }}">
                            <i class="fa fa-users"></i> <!-- Corrected Icon -->
                            <span>Courses Links</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('courseFile.index') }}">All Courses Files</a></li>
                            <li><a href="{{ route('courseFile.create') }}">Add Courses Files</a></li>
                        </ul>
                    </li>

                    <!-- Insurance Companies -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <i class="fa fa-building"></i> <!-- Corrected Icon -->
                            <span>Insurance Companies</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a >View All Companies</a></li>
                            <li><a >Add New Company</a></li>
                        </ul>
                    </li>

                    <!-- Insurance Requests -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                        <i class="fa fa-file-text"></i> <!-- Corrected Icon -->
                            <span>Insurance Requests</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a >All Insurance Requests</a></li>
                            <li><a >Add Insurance Requests</a></li>
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
