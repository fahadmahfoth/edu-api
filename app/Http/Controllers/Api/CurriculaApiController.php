<?php


namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Curricula;
use  Validator ;


class CurriculaApiController extends BaseController  
{

public function index()
{
    # code...
    $curricula = Curricula::all();
    return $this->sendResponse($curricula->toArray(), 'Curricula read succesfully');
}






    
}