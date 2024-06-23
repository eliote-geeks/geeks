<base href="/public">
<style>
#google-translate-container {
  float: right;
  padding: 2px 4px 0px 0px;
}

.goog-te-combo,
.goog-te-banner *,
.goog-te-ftab *,
.goog-te-menu *,
.goog-te-menu2 *,
.goog-te-balloon * {
  font-family: "poppins";
  font-size: 9pt;
  background-image: url({{\App\Models\Site::first()->faviconPath}});
  background-repeat: no-repeat;
  text-indent: 20px;
  background-color: #fff;
  color: #000 !important;
}

.goog-logo-link {
  display: none !important;
}

.goog-te-gadget {
  color: transparent !important;
}

.goog-te-gadget .goog-te-combo {
  margin: 2px 0 !important;
}

</style>
 <nav class="navbar-vertical navbar navbar-dark bg-dark">
    <div class="nav-scroller">
        <!-- Brand logo -->
        <a class="navbar-brand" href="{{url('/')}}">
            <img class="avatar avatar-lg" src="{{\App\Models\Site::first()->logoPath}}" alt="" />
        {{\App\Models\Site::first()->name}}
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link   collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navDashboard" aria-expanded="false" aria-controls="navDashboard">
                    <i class="nav-icon fe fe-home me-2"></i> Dashboard
                </a>
                <div id="navDashboard" class="collapse {{ Request::routeIs('dashboard.index') ? 'show' : ' ' }}" data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item ">
                            <a class="nav-link {{ Request::routeIs('dashboard.index') ? 'active' : ' ' }}" href="{{route('dashboard.index')}}">
                                    Overview
                                </a>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item ">
                            <a class="nav-link " href="dashboard-analytics.html">
                                    Analytics

                                </a>
                        </li>
                    </ul>
                </div>
            </li>
<li class="nav-item">
                <a class="nav-link collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navPayments" aria-expanded="false" aria-controls="navPayments">
                    <i class="nav-icon fe fe-lock me-2"></i> Payments
                </a>
                <div id="navPayments" class="collapse {{ Request::routeIs('dashboard.orders') ? 'show' : ' ' }} {{ Request::routeIs('dashboard.plans') ? 'show' : ' ' }} {{ Request::routeIs('payouts') ? 'show' : ' ' }}  {{ Request::routeIs('customers') ? 'show' : ' ' }}" data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item ">
                            <a class="nav-link {{ Request::routeIs('dashboard.orders') ? 'active' : ' ' }}" href="{{route('dashboard.orders')}}">
                                    Orders
                                </a>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item ">
                            <a class="nav-link {{ Request::routeIs('dashboard.plans') ? 'active' : ' ' }}" href="{{route('dashboard.plans')}}">
                                    Plans
                                </a>
                        </li>
                        
                        <li class="nav-item ">
                            <a class="nav-link {{ Request::routeIs('customers') ? 'active' : ' ' }}" href="{{route('customers')}}">
                                    Payouts Instructors
                                </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navCourses" aria-expanded="false" aria-controls="navCourses">
                    <i class="nav-icon fe fe-book me-2"></i> Courses
                </a>
                <div id="navCourses"  class="collapse {{ Request::routeIs('categories.index') ? 'show' : ' ' }}
                {{ Request::routeIs('courses.index') ? 'show' : ' ' }} {{ Request::routeIs('categories.show') ? 'show' : ' ' }}  {{ Request::routeIs('schools.adminlistschool') ? 'show' : ' ' }}
                "  data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::routeIs('courses.index') ? 'active' : ' ' }}" href="{{route('courses.index')}}">
                                    All Courses
                                </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::routeIs('schools.adminlistschool') ? 'active' : ' ' }}" href="{{route('schools.adminlistschool')}}">
                                    Schools
                                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::routeIs('categories.index') ? 'active' : ' ' }}" href="{{route('categories.index')}}">
                                    Courses Category
                                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('categories.show') ? 'active' : ' ' }}" href="javascript:void(0)">
                                    Category Single
                                </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('admin.settings') ? 'active' : ' ' }}" href="{{route('admin.settings')}}" >
                    <i class="nav-icon fe fe-settings me-2"></i> Admin Settings 
                </a>
            </li>
            
             <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('admin.freqQuestions') ? 'active' : ' ' }}" href="{{route('admin.freqQuestions')}}" >
                    <i class="nav-icon fe fe-question me-2">?</i> Frequently Questions 
                </a>
            </li>
            
             <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('admin.settings') ? 'active' : ' ' }}" href="{{route('trash')}}" >
                    <i class="nav-icon fe fe-trash me-2"></i> Corbeille
                </a>
            </li>
             <!-- Nav item -->
             <li class="nav-item">
                <a class="nav-link  collapsed" href="{{route('courses.index')}}" data-bs-toggle="collapse" data-bs-target="#navProfile" aria-expanded="false" aria-controls="navProfile">
                    <i class="nav-icon fe fe-user me-2"></i> User
                </a>
                <div id="navProfile" class="collapse {{ Request::routeIs('students.students') ? 'show' : ' ' }} {{ Request::routeIs('instructors.instructors') ? 'show' : ' ' }}  {{ Request::routeIs('adminSchools') ? 'show' : ' ' }}" data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('adminSchools') ? 'active' : ' ' }}" href="{{route('adminSchools')}}">
                                    Admin Schools
                                </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('instructors.instructors') ? 'active' : ' ' }}" href="{{route('instructors.instructors')}}">
                                    Instructor
                                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('students.students') ? 'active' : ' ' }}" href="{{route('students.students')}}">Students</a
                                >
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Nav item -->
                <li class="nav-item ">
                    <a
                        class="nav-link   collapsed  "
                        href="#"
                        data-bs-toggle="collapse"
                        data-bs-target="#navCMS"
                        aria-expanded="false"
                        aria-controls="navCMS"
                    >
                        <i class="nav-icon fe fe-book-open me-2"></i> CMS
                    </a>
                            <div id="navCMS" class="collapse  {{ Request::routeIs('newPost') ? 'show' : ' ' }}" data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link   " href="admin-cms-overview.html">
                                    Overview
                                </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  " href="admin-cms-post.html">
                                    All Post
                                </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link {{ Request::routeIs('newPost') ? 'active' : ' ' }}" href="{{route('newPost')}}">
                                    New Post
                                </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="admin-cms-post-category.html">
                                    Category
                                </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item">
                            <div class="nav-divider"></div>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item">
                            <div class="navbar-heading">Documentation</div>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link" href="../../docs/index.html">
                                <i class="nav-icon fe fe-clipboard me-2"></i> Documentation
                            </a>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link" href="../../docs/changelog.html">
                                <i class="nav-icon fe fe-git-pull-request me-2"></i> Changelog
                                <span class="badge bg-primary ms-2">2.2.3</span>
                            </a>
                        </li>
                    </ul>

                </div>
</nav>