@extends('backend.master')
@section('content')
<section class="section dashboard mt-5">
    <div class="row justify-content-center">

        <div class="col-12">
            <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                    <h5 class="card-title">Contact Message List <span>All</span></h5>
                    @if ($reports->isEmpty())
                    <h2>No Records</h2>
                         @else
                    <table class="table table-borderless table-hover table-striped">
                        <thead>

                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">email</th>

                                <th scope="col">report</th>


                            </tr>

                        </thead>
                        <tbody>

                            @foreach($reports as $report)
                                <tr>
                                    <td>{{$report->student->Fname}}</td>
                                    <td>{{$report->student->Lname}}</td>
                                    <td>{{$report->student->email}}</td>
                                    <td><img style="width: 200px" src="{{asset($report->report)}}" alt="">
                                        <a href="{{url('downloadReports',$report->id)}}">download</a>
                                    </td>
                                </tr>
                                @endforeach

                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
</div>
</section>
@endsection
