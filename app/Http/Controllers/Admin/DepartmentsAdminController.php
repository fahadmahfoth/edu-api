<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\School ;
use App\Department ;
use App\Curricula ;
class DepartmentsAdminController extends Controller
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
        
        $departments = Department::with('curricula')->paginate(10);
        return view('admin.departments.index',([

            'departments'=> $departments

        ]));

    }



    public function create(){

        return view('admin.departments.create')->with(
            'curricula', Curricula::all()

        );
    }




    public function store(Request $request)
    {
        if($request->isMethod('post')){


            $request->validate([
                'name' => 'required|string',
                'image' => 'required',
                'colleges' => 'required',
                'info_file' => 'required',
                'description' => 'required|string'
            ]);

            echo $request ;

            if($request->hasFile('image')){  

                $filenameWithExtention = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($filenameWithExtention,PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameStore = $fileName .'_'.time().'.'.$extension;
            
                $path = $request->file('image')->move(base_path() . '/public/images/', $fileNameStore);
                
                
               
                 echo $fileNameStore;
              
             
                        
                    }else{
                            $fileNameStore = 'noImage.jpg';
                          }


                          if($request->has('colleges')){  

                            $filenameWithExtention = $request->file('colleges')->getClientOriginalName();
                            $fileName = pathinfo($filenameWithExtention,PATHINFO_FILENAME);
                            $extension = $request->file('colleges')->getClientOriginalExtension();
                            $fileStore = $fileName .'_'.time().'.'.$extension;
                        
                            $path = $request->file('colleges')->move(base_path() . '/public/files/', $fileStore);
                            
                            
                           
                             echo $fileStore;
                          
                         
                                    
                                }else{
                                        $fileStore = 'noFile';
                                      }


                                      if($request->has('info_file')){  

                                        $filenameWithExtention = $request->file('info_file')->getClientOriginalName();
                                        $fileName = pathinfo($filenameWithExtention,PATHINFO_FILENAME);
                                        $extension = $request->file('info_file')->getClientOriginalExtension();
                                        $fileStoreinfo = $fileName .'_'.time().'.'.$extension;
                                    
                                        $path = $request->file('info_file')->move(base_path() . '/public/deptinfofile/', $fileStoreinfo);
                                        
                                        
                                       
                                         echo $fileStoreinfo;
                                      
                                     
                                                
                                            }else{
                                                    $fileStoreinfo = 'noFile';
                                                  }
            

        $department= new Department();
        $department->name = $request->input('name');
        $department->image   = $fileNameStore ;
        $department->colleges   = $fileStore ;
        $department->info_file   = $fileStoreinfo ;
        $department->description   = $request->input('description'); 

        
           
        
        $department->save();

        $department->curricula()->attach($request->curricula);

    

        

      

        

        }


        return redirect('/departments')->with('success', 'Done successfully');




    }













    public  function edit($id){




        return view('admin.departments.edit')->with(
            [
            'curricula'=> Curricula::all(),
            'department'=>Department::find($id)


            ]

        );


    }






  
    public function update(Request $request, $id)
    {
        if($request->isMethod('PUT')){


            $request->validate([
                'name' => 'required|string',
                'image' => 'required',
                'colleges' => 'required',
                'info_file' => 'required',
                'description' => 'required|string'
            ]);

            echo $request ;

            if($request->hasFile('image')){  

                $filenameWithExtention = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($filenameWithExtention,PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameStore = $fileName .'_'.time().'.'.$extension;
            
                $path = $request->file('image')->move(base_path() . '/public/images/', $fileNameStore);
            
               
                 echo $fileNameStore;
              
             
                        
                    }else{
                            $fileNameStore = 'noImage.jpg';
                          }


                          if($request->has('colleges')){  

                            $filenameWithExtention = $request->file('colleges')->getClientOriginalName();
                            $fileName = pathinfo($filenameWithExtention,PATHINFO_FILENAME);
                            $extension = $request->file('colleges')->getClientOriginalExtension();
                            $fileStore = $fileName .'_'.time().'.'.$extension;
                        
                            $path = $request->file('colleges')->move(base_path() . '/public/files/', $fileStore);
                            
                            
                           
                             echo $fileStore;
                          
                         
                                    
                                }else{
                                        $fileStore = 'noFile';
                                      }




                                      if($request->has('info_file')){  

                                        $filenameWithExtention = $request->file('info_file')->getClientOriginalName();
                                        $fileName = pathinfo($filenameWithExtention,PATHINFO_FILENAME);
                                        $extension = $request->file('info_file')->getClientOriginalExtension();
                                        $fileStoreinfo = $fileName .'_'.time().'.'.$extension;
                                    
                                        $path = $request->file('info_file')->move(base_path() . '/public/deptinfofile/', $fileStoreinfo);
                                        
                                        
                                       
                                         echo $fileStoreinfo;
                                      
                                     
                                                
                                            }else{
                                                    $fileStoreinfo = 'noFile';
                                                  }

            


            $department =   Department::find($id);
            $department->name = $request->input('name');
            $department->image   = $fileNameStore ;
            $department->colleges   = $fileStore ;
            $department->info_file   = $fileStoreinfo ;
            $department->description   = $request->input('description');
    
            
               
            
            $department->save();
    
            $department->curricula()->attach($request->curricula);




                        }

        return redirect('/departments')->with('success','Edit successfully');
        

      
    }





    public function destroy($id)
    {
        $item =   Department::find($id);


        if(isset($item->image)){
            \Storage::delete('/public/images/'.$item->image);
         
        }
        if(isset($item->colleges)){
            \Storage::delete('/public/files/'.$item->file);
         
        }
        
        
        
                $item->delete() ;   
               
                return redirect('/departments')->with('success', 'Delete successfully');
    }




    public function show($id){

        return view('admin.departments.show')->with(
            'department', Department::with('curricula')->find($id)   

        );
    }
}
