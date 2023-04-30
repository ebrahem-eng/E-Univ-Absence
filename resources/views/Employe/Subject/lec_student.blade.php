<!DOCTYPE html>
<html lang="en">

{{-- head start --}}

@include('layouts.Employe.Link-head')

{{-- head end --}}

<body>
    <div class="container-scroller">


        {{-- Header start --}}

        @include('layouts.Employe.Header')

        {{-- Header End --}}

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">


            {{-- sidebar start --}}

            @include('layouts.Employe.Sidebar')


            {{-- sidebar end --}}


            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="col-lg-15 grid-margin stretch-card">
                        <div class="card">
                          {{-- message section --}}
                          
                            @if(session("store_success_message"))
                            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                                role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{session("store_success_message")}}
                            </div>
                            @endif

                            {{-- end message section --}}

                           
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                    <h4 class="card-title">Student Lec Section Table</h4>
                                    <form action="{{route('employe.subject.lec.section.student.create')}}" method="GET">
                                        @csrf
                                        <input type="hidden" name="subject_id"  value="{{$subject_id}}"/>
                                        <button  type="submit" class="btn btn-primary btn-rounded btn-fw ">Add Students For This Subject Lec Section</button>
                                    </form>
                                    </div>
                                    @if (count($students) > 0)
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Student Number</th>
                                                    <th>Created Date</th>
                                                    <th>Updated Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $student)
                                                    <tr>
                                                        <td>{{ $student->id }}</td>
                                                        <td>{{ $student->name }}</td>
                                                        <td>{{ $student->s_number }}</td>
                            

                                                        <td>{{ $student->created_at }}</td>
                                                        <td>{{ $student->updated_at }}</td>
                                                        <td>
                                                            <div class="col-12">
                                                                <div
                                                                    class="template-demo d-flex justify-content-between flex-wrap">
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-primary dropdown-toggle"
                                                                            type="button" id="dropdownMenuIconButton1"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <i class="ti-settings"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuIconButton1">
                                                                            <h6 class="dropdown-header">Action</h6>
                                                                           
                                                                                <form action="" method="GET">
                                                                                    @csrf
                                                                                    
                                                                                    <button class="dropdown-item"
                                                                                    >Student</button>
                                                                                </form>
                                                                           

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <h2 class="text-center text-danger"
                                                    style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
                                                    NO DATA FOUND</h2>

                            @endif

                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>

    @include('layouts.Employe.Link-Script')

</body>

</html>
