<!DOCTYPE html>
<html lang="en">

{{-- head start --}}

@include('layouts.Doctor.Link-head')

{{-- head end --}}

<body>
    <div class="container-scroller">


        {{-- Header start --}}

        @include('layouts.Doctor.Header')

        {{-- Header End --}}

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">


            {{-- sidebar start --}}

            @include('layouts.Doctor.Sidebar')


            {{-- sidebar end --}}


            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                 
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

                            @if (count($students) > 0)
                             
                            <div class="row">
                                @foreach ($students as $student)
                                  <div class="col-lg-5">
                                    <div class="card">
                                      <div class="card-body">
                                        <h4 class="card-title">Student Absence</h4>
                                        <div class="media">
                                          <img src="{{ asset('assets/images/student.png') }}" alt="" style="height: 50%; width:30%" class="img-fluid d-flex align-self-start mr-3 rounded-circle img-thumbnail">
                                          <div class="media-body">
                                            <h4 class="card-title">Student Name:</h4>
                                            <h5>{{$student->name}}</h5>
                                            <br>
                                            <h4 class="card-title">Student ID:</h4>
                                            <h5>{{$student->s_number}}</h5>
                                            <br>
                                            <form action="{{route('doctor.subject.store.lec.student.absence')}}" method="POST">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label" for="exampleFormControlSelect3">Select Number Of Lecture:</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="week">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="student_id" value="{{$student->id}}" />
                                                <input type="hidden" name="subject_id" value="{{$subject_id}}" />
                                                <input type="hidden" name="date" value="{{ now()->format('Y-m-d') }}" />
                                                <div class="form-group row">
                                                    <div class="col-sm-2">
                                                        <button type="submit" style="margin-left: -130px;" class="btn btn-success btn-rounded btn-fw" value="0" name="type_absence">Presence</button>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <button type="submit" style="margin-left: -50px;" class="btn btn-primary btn-rounded btn-fw" value="1" name="type_absence">Delay</button>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button type="submit" style="margin-left: -20px;" class="btn btn-danger btn-rounded btn-fw" value="2" name="type_absence">Absence</button>
                                                    </div>
                                                </div>
                                            </form>
                                            
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <br>
                                  </div>
                                @endforeach
                              </div>
                              
                                                          
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

    @include('layouts.Doctor.Link-Script')

</body>

</html>
