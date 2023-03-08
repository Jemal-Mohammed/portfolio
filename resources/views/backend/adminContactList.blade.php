@extends('backend.master')
@section('content')
<section class="section dashboard mt-5">
    <div class="row justify-content-center">

        <div class="col-12">
            <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                    <h5 class="card-title">Contact Message List <span>All</span></h5>
                    @if ($contacts->isEmpty())
                    <h2>No Records</h2>
                         @else
                    <table class="table table-borderless table-hover table-striped">
                        <thead>

                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">message</th>


                            </tr>

                        </thead>
                        <tbody>

                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->message}}</td>

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
