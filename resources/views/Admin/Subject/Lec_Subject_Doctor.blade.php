<!DOCTYPE html>
<html lang="en">

{{-- head start --}}

@include('layouts.Admin.Link-head')

{{-- head end --}}

<body>
    <div class="container-scroller">


        {{-- Header start --}}

        @include('layouts.Admin.Header')

        {{-- Header End --}}

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">


            {{-- sidebar start --}}

            @include('layouts.Admin.Sidebar')


            {{-- sidebar end --}}


            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="col-lg-15 grid-margin stretch-card">
                        <div class="card">

                            @if(session("store_success_message"))
                            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                                role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{session("store_success_message")}}
                            </div>
                            @endif

                     
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                    <h4 class="card-title">Doctor Lec Table</h4>
                                    <form action="{{route('admin.subject_create_lec_doctor')}}" method="GET">
                                        @csrf
                                        <input type="hidden" name="subject_id"  value="{{$subject_id}}"/>
                                        <button  type="submit" class="btn btn-primary btn-rounded btn-fw ">Add Doctors For This Subject Lec Section</button>
                                    </form>
                                   
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>College</th>
                                                    <th>Specialization</th>
                                                    <th>Status</th>
                                                    <th>Created Date</th>
                                                    <th>Updated Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($lec_doctors_details as $doctor)
                                                    <tr>
                                                        <td>{{ $doctor->id }}</td>
                                                        <td>{{ $doctor->name }}</td>
                                                        <td>{{ $doctor->email }}</td>
                                                        <td>{{ $doctor->college }}</td>
                                                        <td>{{ $doctor->specialization }}</td>
                                                        <td>
                                                            <span>
                                                                @if ($doctor->status == 0)
                                                                    <label class="badge badge-danger">Not Active</label>
                                                                @elseif ($doctor->status == 1)
                                                                    <label class="badge badge-success"> Active</label>
                                                                @endif
                                                            </span>

                                                        </td>

                                                        <td>{{ $doctor->created_at }}</td>
                                                        <td>{{ $doctor->updated_at }}</td>
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
                                                                    
                                                                            <a class="dropdown-item"
                                                                                href="#">Delete</a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                @endforeach
                  

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

    @include('layouts.Admin.Link-Script')

</body>

</html>
