

@extends('backend.master')
@section('content')
<section class="section dashboard">
 @if ($students->isEmpty())
 <div class="container mt-5">
     <div class="row justify-content-center">

         <h1>NO RECORDS YET</h1>
     </div>
 </div>
 @else

 <div class="card">

     <div class="card-body">
        <h1>Students Assigned By Applying</h1>


       <!-- Table with hoverable rows -->
       <table class="table table-hover">
         <thead>
           <tr>
             <th scope="col">SL</th>
             <th scope="col">First Name</th>
             <th scope="col">Last Name</th>
             <th scope="col">University Id</th>
             <th scope="col">Apparent Result</th>
             <th scope="col">email</th>
             <th scope="col">Action</th>

           </tr>
         </thead>
         <tbody>
             @foreach ($students as $key=>$student)
             @if ($student->feedback=='yes')

             <tr>
               <th scope="row">{{$key+1}}</th>
               <td>{{$student->student->Fname}}</td>
               <td>{{$student->student->Lname}}</td>
               <td>{{$student->student->username}}</td>
               <td>{{$student->student->apparentResult}}</td>
               <td>{{$student->student->feedback}}</td>

               <td>
                   <a class="btn btn-primary" href="{{url('insertresult',$student->student->id)}}">Insert Result</button>
              </td>
             </tr>
             @endif


             @endforeach
         </tbody>
       </table>


 @endif



 @if ($students1->isEmpty())
 <div class="container mt-5">
     <div class="row justify-content-center">

         <h1>NO RECORDS YET</h1>
     </div>
 </div>
 @else

 <div class="card">

     <div class="card-body">
        <h1>Students Assigned By Coordinator</h1>


       <!-- Table with hoverable rows -->
       <table class="table table-hover">
         <thead>
           <tr>
             <th scope="col">SL</th>
             <th scope="col">First Name</th>
             <th scope="col">Last Name</th>
             <th scope="col">University Id</th>
             <th scope="col">Apparent Result</th>
             <th scope="col">email</th>
             <th scope="col">Action</th>

           </tr>
         </thead>
         <tbody>
             @foreach ($students1 as $key=>$student)
             @if ($student->status=='assigned')

             <tr>
               <th scope="row">{{$key+1}}</th>
               <td>{{$student->Student->Fname}}</td>
               <td>{{$student->Student->Lname}}</td>
               <td>{{$student->Student->username}}</td>
               <td>{{$student->Student->CGPA}}</td>
               <td>{{$student->Student->feedback}}</td>

               <td>
                   <a class="btn btn-primary" href="{{url('insertresult',$student->Student->id)}}">Insert Result</button>
              </td>
             </tr>
             @endif


             @endforeach
         </tbody>
       </table>


 @endif

@endsection
