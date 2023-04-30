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
            
                    <div class="col-lg-4 grid-margin stretch-card mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Choose The Section For Subject</h4>
                                <div class="d-flex justify-content-center template-demo">
                                    <form action="{{route('employe.subject.lec.section.student')}}" method="GET">
                                        @csrf                     
                                        <input type="hidden" name="subject_id" value="{{$subject_id}}" />
                                        <button type="submit" class="btn btn-primary btn-rounded btn-fw mr-2">Lec</button>
                                    </form>
                                    <form action="{{route('employe.subject.lab.section.student')}}" method="GET">
                                        @csrf
                                        <input type="hidden" name="subject_id" value="{{$subject_id}}" />
                                        <button type="submit" class="btn btn-success btn-rounded btn-fw ml-2">Lab</button>
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
