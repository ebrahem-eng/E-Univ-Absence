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

                    <div class="row mx-auto">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">

                                {{-- message section --}}

                                @if(session("store_error_message"))
                                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                                    role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{session("store_error_message")}}
                                </div>
                                @endif
                                {{-- end message section --}}

                                <div class="card-body">
                                    <h4 class="card-title">Add Doctor</h4>
                                   
                                    <form class="forms-sample" method="POST" action="{{route('admin.doctor.store')}}">
                                        @csrf

                                        @error('name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Username</label>
                                            <input type="text" class="form-control" id="exampleInputUsername1"
                                                placeholder="Username" name="name" required>
                                        </div>
                                        @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                placeholder="Email" name="email" required>
                                        </div>
                                        @error('password')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1"
                                                placeholder="Password" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">College</label>
                                            <input type="text" class="form-control" id="exampleInputUsername1"
                                                placeholder="College" name="college">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Specialization</label>
                                            <input type="text" class="form-control" id="exampleInputUsername1"
                                                placeholder="Specialization" name="specialization">
                                        </div>
                                        
                                        <div class="form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                                Remember me
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </form>
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
