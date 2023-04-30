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
                                    <h4 class="card-title">Add Student To Subject</h4>

                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Subject Name</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1"
                                            placeholder="Subject Name" name="subject_name" value="{{$subject_name}}" readonly>
                                    </div>
                                   
                                    <form class="forms-sample" method="POST" action="{{route('employe.subject.lec.section.student.store')}}">
                                        @csrf

                                        <div class="form-group">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect2">Select Doctors</label>
                                            <select multiple class="form-control" id="exampleFormControlSelect2"
                                                aria-label="Multiple select example" name="studentId[]">
                                              @foreach ($students as $student)
                                              <option value="{{$student->id}}">{{$student->name}}</option>
                                              @endforeach
                                            </select>
                                        </div>

                                        <input name="subject_id" type="hidden" value="{{$subject_id}}" />
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
    
        @include('layouts.Employe.Link-Script')

</body>

</html>
