<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Suggest ;
class SuggestsAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        
        $suggests = Suggest::paginate(10);
        return view('admin.suggests.index',([

            'suggests'=> $suggests

        ]));
    }


    public function show($id){

        return view('admin.suggests.show')->with(
            'suggest',  Suggest::find($id)  

        );
    }




    public function destroy($id)
    {
        $item =   Suggest::find($id);


 
        
        
        
                $item->delete() ;   
               
                return redirect('/suggests')->with('success', 'Delete successfully');
    }
}
