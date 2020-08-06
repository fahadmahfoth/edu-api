<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Curricula ;


class CurriculaAdminController extends Controller {

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    
    public function index()
    {
        
        $curricula = Curricula::paginate(10);
        return view('admin.curricula.index',([

            'curricula'=> $curricula

        ]));

    }


    
    public function create(){

        return view('admin.curricula.create') ;
        
    }



    
    public function store(Request $request)
    {
        if($request->isMethod('post')){


            $request->validate([
                'name' => 'required|string',
                'file' => 'required',
                'stage' => 'required'
            ]);

            echo $request ;

                          if($request->has('file')){  

                            $filenameWithExtention = $request->file('file')->getClientOriginalName();
                            $fileName = pathinfo($filenameWithExtention,PATHINFO_FILENAME);
                            $extension = $request->file('file')->getClientOriginalExtension();
                            $fileStore = $fileName .'_'.time().'.'.$extension;
                        
                            $path = $request->file('file')->move(base_path() . '/public/files/', $fileStore);
                            
                            
                           
                             echo $fileStore;
                          
                         
                                    
                                }else{
                                        $fileStore = 'noFile';
                                      }
            

            $curricula= new Curricula();

        $curricula->name = $request->input('name');
        $curricula->stage = $request->input('stage');
        $curricula->file   = $fileStore ;

        
           
        
        $curricula->save();

        

      

        

        }


        return redirect('/curricula')->with('success', 'Done successfully');




    }



    public  function edit($id){




        return view('admin.curricula.edit')->with('curricula',Curricula::find($id));


    }



    public function update(Request $request , $id)
    {
        if($request->isMethod('PUT')){

            echo $request ;

            $request->validate([
                'name' => 'required|string',
                'file' => 'required',
                'stage' => 'required'
            ]);


                          if($request->has('file')){  

                            $filenameWithExtention = $request->file('file')->getClientOriginalName();
                            $fileName = pathinfo($filenameWithExtention,PATHINFO_FILENAME);
                            $extension = $request->file('file')->getClientOriginalExtension();
                            $fileStore = $fileName .'_'.time().'.'.$extension;
                        
                            $path = $request->file('file')->move(base_path() . '/public/files/', $fileStore);
                            
                            
                           
                             echo $fileStore;
                          
                         
                                    
                                }else{
                                        $fileStore = 'noFile';
                                      }
            

            $curricula= Curricula::find($id);

        $curricula->name = $request->input('name');
        $curricula->stage = $request->input('stage');
        $curricula->file   = $fileStore ;

        
           
        
        $curricula->save();

        

      

        

        }


        return redirect('/curricula')->with('success', 'Done  Edit successfully');




    }





















    
    public function destroy($id)
    {
        $item =   Curricula::find($id);


      
        if(isset($item->file)){
            \Storage::delete('/public/files/'.$item->file);
         
        }
        
        
        
                $item->delete() ;   
               
                return redirect('/curricula')->with('success', 'Delete successfully');
    }


}