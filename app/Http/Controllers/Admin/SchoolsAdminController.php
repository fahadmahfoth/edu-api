<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\School ;
use App\Department ;
class SchoolsAdminController extends Controller
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
        
        $schools = School::with('department')->paginate(10);
        return view('admin.schools.index',([

            'schools'=> $schools

        ]));
    }



    public function create(){

        return view('admin.schools.create')->with(
            'departments', Department::all()

        );
    }




    public function store(Request $request)
    {
        if($request->isMethod('post')){


            $request->validate([
                'name' => 'required|string',
                'image' => 'required',
                'facebook' => 'required',
                'location_lat' => 'required',
                'location_lng' => 'required',
                'description' => 'required'
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

            

            $school = new School();

        $school->name = $request->input('name');
        $school->facebook = $request->input('facebook');
        $school->location_lat = $request->input('location_lat');
        $school->location_lng = $request->input('location_lng');
        $school->description = $request->input('description');
       
        $school->image   = $fileNameStore ;

        
           
        
        $school->save();

        

        if(isset($request->departments))
        {
            $school->department()->attach($request->departments);     // هنا طريقة اضافة بيانات ال many-to-many
        }

        

      

        

        }


        return redirect('/schools')->with('success', 'Done successfully');




    }













    public  function edit($id){




        return view('admin.schools.edit')->with(
            [
            'departments'=> Department::all(),
            'school'=>School::find($id)


            ]

        );


    }






  
    public function update(Request $request, $id)
    {
        if($request->isMethod('PUT')){

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

            


            $school =   School::find($id);

            $school->name = $request->input('name');
            $school->facebook = $request->input('facebook');
            $school->location_lat = $request->input('location_lat');
            $school->location_lng = $request->input('location_lng');
            $school->description = $request->input('description');
           
            $school->image   = $fileNameStore ;
    
            
               
            
            $school->save();
    
            
    
            if(isset($request->departments))
            {
                $school->department()->sync($request->departments);     // هنا طريقة اضافة بيانات ال many-to-many
            }





                        }

        return redirect('/schools')->with('success','Edit successfully');
        

      
    }


    public function show($id){

        return view('admin.schools.show')->with(
            'school', School::with('department')->find($id)   

        );
    }


    public function destroy($id)
    {
        $item =   School::find($id);


        if($item->image != 'noImage.jpg'){
            \Storage::delete('/public/images/'.$item->image);
         
        }
        
        
        
                $item->delete() ;   
               
                return redirect('/schools')->with('success', 'Delete successfully');
    }
}
