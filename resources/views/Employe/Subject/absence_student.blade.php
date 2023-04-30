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
                                  <div class="col-lg-4">
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
                                            <h4 class="card-title">Nuber of Absence:</h4>
                                            <h5>{{ $absences->where('student_id', $student->id)->pluck('num_absences')->first() }}</h5>
                                            <br> 
                                            <h4 class="card-title">Nuber of Delay:</h4>
                                            <h5>{{ $delays->where('student_id', $student->id)->pluck('num_delays')->first() }}</h5>
                                            <br> 
                                          </div>
                                        </div>
                                      </div>
                                    </div>
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

    @include('layouts.Employe.Link-Script')

</body>

</html>
