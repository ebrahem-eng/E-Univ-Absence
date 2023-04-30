<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('doctor.dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="mdi mdi-book"></i>
                <span class="menu-title" style="margin-left: 10px;">Subject</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('doctor.subject.choose.section')}}">Subject Table</a></li>
                    {{-- <li class="nav-item"> <a class="nav-link" href="{{route('admin.subject.create')}}">Add Subject</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Subject Archive</a></li> --}}
                </ul>
            </div>
        </li>
       
       
    </ul>
</nav>
