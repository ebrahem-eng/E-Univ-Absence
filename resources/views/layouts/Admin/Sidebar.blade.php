<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-account-multiple"></i>
                <span class="menu-title" style="margin-left: 10px;">Doctors Manage</span>

                <i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.doctor.index') }}">Doctor Table</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.doctor.create') }}">Add Doctor</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Doctor
                            Archive</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="mdi mdi-account-settings"></i>
                <span class="menu-title" style="margin-left: 10px;">Employes Manage</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.employe.index') }}">Employe
                            Table</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.employe.create') }}">Add Employe</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/forms/basic_elements.html">Employe Archive</a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="mdi mdi-book"></i>
                <span class="menu-title" style="margin-left: 10px;">Subject</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.subject.index')}}">Subject Table</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.subject.create')}}">Add Subject</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Subject Archive</a></li>
                </ul>
            </div>
        </li>
       
    </ul>
</nav>
