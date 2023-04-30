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
                                    <h4 class="card-title">Add Subject</h4>
                                   
                                    <form class="forms-sample" method="POST" action="{{route('admin.subject.store')}}">
                                        @csrf

                                        @error('name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Name</label>
                                            <input type="text" class="form-control" id="exampleInputUsername1"
                                                placeholder="Name" name="name" required>
                                        </div>
                                       
                                    <div class="form-row">
                                        @error('code')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputUsername1">Code</label>
                                            <input type="text" class="form-control" id="exampleInputUsername1"
                                                placeholder="Code" name="code" required>
                                        </div>
                                    
                                        @error('hour')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputPassword1">Hour</label>
                                            <input type="number" class="form-control" id="exampleInputPassword1"
                                                placeholder="Hour" name="hour" max="5" required>
                                        </div>
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
