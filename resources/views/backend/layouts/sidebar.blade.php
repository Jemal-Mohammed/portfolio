  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('dashboard')}}">
          <i class="bi bi-grid text-success"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->


<li class="nav-item">
    @if (session('user')->role=='admin' ||session('user')->role=='coordinator')

    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="fa fa-users text-success"></i><span>Department Heads</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{url('/viewHeads')}}">
          <i class="bi bi-circle"></i><span>All department Heads</span>
        </a>
    </li>

@if (session('user')->role=='coordinator')

<li>
  <a href="{{url('/createHeads')}}">
    <i class="bi bi-circle"></i><span>Create department Heads</span>
  </a>
</li>
@endif
    </ul>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-building text-success"></i><span>Supervisors</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{url('/allSupervisors')}}">
            <i class="bi bi-circle"></i><span>All Supervisors</span>
          </a>
        </li>

        @if (session('user')->role=='coordinator')
      <li>
        <a href="{{url('/createSupervisors')}}">
          <i class="bi bi-circle"></i><span>Add Supervisors</span>
        </a>
      </li>
@endif
      </ul>
    </li><!-- End Tables Nav -->
    @endif
@if (session('user')->role=='admin')

<li class="nav-item">
<a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
   <i class="fa fa-users text-success"></i><span>Coordinator</span><i class="bi bi-chevron-down ms-auto"></i>
</a>
<ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
 <li>
   <a href="{{url('/allCoordinaters')}}">
     <i class="bi bi-circle"></i><span>Coordinator</span>
   </a>
 </li>
 <li>
   <a href="{{url('/createCoordinaters')}}">
     <i class="bi bi-circle"></i><span>Add Coordinator</span>
   </a>
 </li>

</ul>
</li>
<!-- End Charts Nav -->

<li class="nav-item">
<a class="nav-link collapsed" href="all-department">
   <i class="fa fa-users text-success"></i><span>All Department</span>
</a>

</li>
<li class="nav-item">
<a class="nav-link collapsed" href="{{route('admin-contact-list')}}">
   <i class="fa fa-users text-success"></i><span>View Feedback</span>
</a>

</li>

@endif

  @if (session('user')->role=='coordinator')

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-grid text-success"></i><span> Departments</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{url('/viewDepartments')}}">
              <i class="bi bi-circle"></i><span>All Departments</span>
            </a>
          </li>


          <li>
            <a href="{{url('/createDepartments')}}">
              <i class="bi bi-circle"></i><span>Add Departments</span>
            </a>
          </li>


    </ul>
  </li>
  @endif

      <!-- End Forms Nav -->



        @if (session('user')->role=='head')

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="fa fa-graduation-cap text-success"></i><span>Students</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{url('/students')}}">
                  <i class="bi bi-circle"></i><span>All Students</span>
                </a>
              </li>
        </ul>
      </li><!-- End Icons Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/viewReports')}}">
          <i class="bi bi-person"></i>
          <span>view Reports</span>
        </a>
      </li><!-- End Profile Page Nav -->

      @endif
      @if (session('user')->role=='supervisor')

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/createPositions')}}">
          <i class="bi bi-person"></i>
          <span>Add POsitions</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/allpositions')}}">
          <i class="bi bi-person"></i>
          <span>All POsitions</span>
        </a>
      </li><!-- End Profile Page Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/allCarrers')}}">
          <i class="bi bi-person"></i>
          <span>All Careers</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/createCarrers')}}">
          <i class="bi bi-person"></i>
          <span>Add Careers</span>
        </a>
      </li><!-- End Profile Page Nav -->
<li class="nav-item">
  <a class="nav-link collapsed" href="{{url('/applicants')}}">
    <i class="bi bi-person"></i>
    <span>Intern Ship Applicants</span>
  </a>
</li><!-- End Profile Page Nav -->
<li class="nav-item">
    <a class="nav-link collapsed" href="{{url('/carrerapplicants')}}">
      <i class="bi bi-person"></i>
      <span>Career Applicants</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{url('/assignedStudents')}}">
      <i class="bi bi-person"></i>
      <span>Students</span>
    </a>
  </li>
  <!-- End Profile Page Nav -->
  {{-- <li class="nav-item">
    <a class="nav-link collapsed" href="pages-contact.html">
      <i class="bi bi-envelope"></i>
      <span>Assigned Students</span>
    </a>
  </li><!-- End Contact Page Nav --> --}}
@endif
@if (session('user')->role=='coordinator')
<li class="nav-item">
    <a class="nav-link collapsed" href="{{url('/createCompanies')}}">
      <i class="bi bi-person"></i>
      <span>add Companies</span>
    </a>
  </li><!-- End Profile Page Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{url('/allCompanies')}}">
      <i class="bi bi-person"></i>
      <span>All Companies</span>
    </a>
  </li><!-- End Profile Page Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{url('unAssignedSudents')}}">
      <i class="bi bi-envelope"></i>
      <span>UnAssigned Students</span>
    </a>
  </li><!-- End Contact Page Nav -->



@endif





    </ul>

  </aside><!-- End Sidebar-->
