<?php

use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AppllyController;
use App\Http\Controllers\CarrerController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\CordinatorController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\CarrerApplyController;
use App\Http\Controllers\PlacementInfoController;
use App\Http\Controllers\DepartmentHeadController;

// frontend
// login
Route::get('/signIn', function () {
    return view('frontend/auth/login');
});
Route::post('/authenticate',[LoginController::class,'login']);
Route::post('/contact',[ContactController::class,'contact']);

Route::get('/contactUs',function(){
    return view('frontend.contact.contact');
});

// registration
Route::get('/signUp', [StudentController::class,'signUp']);
Route::get('/register', [StudentController::class,'register']);
// positions
Route::get('/positions', [HomeController::class,'positions']);
Route::get('/carrers', [HomeController::class,'carrers']);


// welcome
Route::get('/',[HomeController::class,'count']);
// logout
Route::get('/logout',[LoginController::class,'logout']);
Route::get('/download/{id}',[StudentController::class,'download'])->name('download');



// protected Routes/backend
Route::middleware(['isLogedIn'])->group(function () {
    //   departments
 Route::middleware(['IsCoordinator'])->group(function () {
    Route::get('/createDepartments', function () {
    return view('backend/department/createDepartments');
});
Route::post('/addDepartments', [DepartmentController::class,'addDepartments']);
Route::get('/viewDepartments',[DepartmentController::class,'index']);
Route::get('/createHeads',[DepartmentHeadController::class,'createHeads']);
Route::post('/addDepartmentHead',[DepartmentHeadController::class,'addheads']);
Route::get('/createSupervisors', function () {
    return view('backend/Supervisors/createSupervisors');
});
Route::post('/addSupervisors',[SupervisorController::class,'addSupervisors']);
Route::get('/deleteDepartmentHead/{id}',[DepartmentHeadController::class,'deleteDepartmentHead']);
Route::get('/deleteDepartment/{id}',[DepartmentController::class,'deleteDepartment']);
Route::get('/createCompanies',[CompanyController::class,'createCompanies']);
Route::get('/allCompanies',[CompanyController::class,'index']);
Route::get('/delete-company/{id}', [CompanyController::class, 'deleteCompany'])->name('deleteCompany');
Route::post('/addCompanies',[CompanyController::class,'addCompanies']);
Route::get('/ActivateSupervisor/{id}',[SupervisorController::class,'ActivateSupervisor']);
Route::get('/DectivateSupervisor/{id}',[SupervisorController::class,'DectivateSupervisor']);
Route::get('/ActivateDH/{id}',[DepartmentHeadController::class,'ActivateDH']);
Route::get('/DeactivateDH/{id}',[DepartmentHeadController::class,'DeactivateDH']);
Route::get('/unAssignedSudents',[StudentController::class,'unAssignedSudents']);
Route::get('/makePlacement/{id}',[PlacementInfoController::class,'makePlacement']);

});

// dashboard
    Route::get('/dashboard',[DashBoardController::class,'index']);
    // search
    Route::post('/search',[SearchController::class,'search']);

// Department headers
    Route::get('/viewHeads',[DepartmentHeadController::class,'index']);

    // company supervisors
    Route::get('/allSupervisors',[SupervisorController::class,'index']);


    Route::get('all-department', [DepartmentController::class,'allDepartment'])->name('adepartment');
    // admin
    Route::middleware(['IsAdmin'])->group(function () {
    Route::get('/allCoordinaters',[CordinatorController::class,'index']);
    Route::get('/admin-contact-list',[ContactController::class,'contactFeedBack'])->name('admin-contact-list');

    Route::get('/createCoordinaters', function () {
        return view('backend/coordinators/createCoordinators');

    });
    Route::post('/addCoordinators',[CordinatorController::class,'addCoordinators']);
    Route::get('/ActivateCoordinator/{id}',[CordinatorController::class,'ActivateCoordinator']);
    Route::get('/DeactivateCoordinator/{id}',[CordinatorController::class,'DeactivateCoordinator']);
    Route::get('/DeleteCoordinator/{id}',[CordinatorController::class,'DeleteCoordinator']);

});


    // head
    Route::middleware(['IsHead'])->group(function () {
    Route::get('/students',[StudentController::class,'students']);
    Route::post('/assignCGPA/{id}',[StudentController::class,'assignCGPA']);
    Route::get('/viewassignCGPA/{id}',[StudentController::class,'viewassignCGPA']);
    Route::get('/viewReports',[ReportController::class,'viewReports']);
    Route::get('/downloadReports/{id}',[ReportController::class,'downloadReports']);

    });


// student
    Route::middleware(['IsStudent'])->group(function () {
        Route::post('/sendFeedBack/{id}',[FeedBackController::class,'sendFeedBack']);
        Route::post('/sendReport',[ReportController::class,'sendReport']);
        Route::post('/apply/{id}',[AppllyController::class,'apply']);
        Route::post('/carrerApply/{id}',[CarrerApplyController::class,'carrerApply']);
        Route::get('/profile/{id}',[ProfileController::class,'profile']);
        Route::post('/updateProfile/{id}',[ProfileController::class,'updateProfile']);
        Route::get('/placementInfo',[PlacementInfoController::class,'placementInfo']);
        Route::post('/choice',[ChoiceController::class,'choice']);
        Route::get('/placementChoice',[PlacementInfoController::class,'placementChoice']);
        Route::get('/report',function(){
            return view('frontend.report.index');
        });


    });
    // supervisor
    Route::middleware(['IsSupervisor'])->group(function () {
        Route::get('/applicants',[AppllyController::class,'applicants']);
        Route::get('/carrerapplicants',[CarrerApplyController::class,'carrerapplicants']);
        Route::get('/createPositions',function(){
            return view('backend.positions.createPositions');
        });
        Route::post('/addPositions',[PositionController::class,'addPositions']);
        Route::get('/allpositions',[PositionController::class,'allpositions']);
        Route::get('/acceptStudents/{id}',[PlacementInfoController::class,'acceptStudent']);

        Route::get('/createCarrers',function(){
            return view('backend.carrers.createCarrer');
        });
        Route::post('/addCarrers',[CarrerController::class,'addCarrers']);
        Route::get('/allCarrers',[CarrerController::class,'allCarrers']);
        Route::get('/assignedStudents',[StudentController::class,'assignedStudents']);
        Route::get('/insertresult/{id}',[StudentController::class,'insertresult']);
        Route::post('/assignResult/{id}',[StudentController::class,'assignResult']);
        Route::get('/remove/{id}',[PositionController::class,'deletePosition'])->name('remove');
        Route::get('/inviteApplicant/{id}',[CarrerController::class,'inviteApplicant']);


    });

    Route::post('/changePassword/{id}',[ProfileController::class,'changePassword']);
    Route::post('/updateBackendProfile/{id}',[ProfileController::class,'updateBackendProfile']);

    Route::get('/backendProfile/{id}',[ProfileController::class,'backendProfile']);
    Route::post('changeBackendPassword/{id}',[ProfileController::class,'changeBackendPassword']);


});

