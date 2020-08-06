<?php


namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Department;
use  Validator ;


class DepartmentsApiController extends BaseController  
{

public function index()
{
    # code...
    $departments = Department::with('curricula')->get();
    return $this->sendResponse($departments->toArray(), 'Departments read succesfully');
}






    
}