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

                            @if (count($employes) > 0)
                                <div class="card-body">
                                    <h4 class="card-title">Employe Table</h4>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Age</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    <th>Created Date</th>
                                                    <th>Updated Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($employes as $employe)
                                                    <tr>
                                                        <td>{{ $employe->id }}</td>
                                                        <td>{{ $employe->name }}</td>
                                                        <td>{{ $employe->email }}</td>
                                                        <td>{{ $employe->phone }}</td>
                                                        <td>{{ $employe->age }}</td>
                                                        <td>{{ $employe->address }}</td>
                                                        <td>
                                                            <span>
                                                                @if ($employe->status == 0)
                                                                    <label class="badge badge-danger">Not Active</label>
                                                                @elseif ($employe->status == 1)
                                                                    <label class="badge badge-success"> Active</label>
                                                                @endif
                                                            </span>

                                                        </td>

                                                        <td>{{ $employe->created_at }}</td>
                                                        <td>{{ $employe->updated_at }}</td>
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
                                                                                href="#">Edit</a>
                            
                                                                            <a class="dropdown-item"
                                                                                href="#">Delete</a>

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

    @include('layouts.Admin.Link-Script')

</body>

</html>
