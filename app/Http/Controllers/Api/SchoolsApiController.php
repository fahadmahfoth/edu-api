<?php


namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\School;
use  Validator ;


class SchoolsApiController extends BaseController  
{

public function index()
{
    # code...
    $schhols = School::with('department')->get();
    return $this->sendResponse($schhols->toArray(), 'Schools read succesfully');
}






    
}