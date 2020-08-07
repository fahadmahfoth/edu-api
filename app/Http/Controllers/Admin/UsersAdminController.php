<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class UsersAdminController extends Controller
{



    public function __construct()
{
    $this->middleware(['role:super-admin']);
}



    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Role $role,Permission $permission,User $model,Request $request)
    {

           
           

        
        
        
        return view('admin.users.index', ['users' => $model->paginate(15),

        'permission' =>  $permission, 'role' => $role
        
        
        ]);
       
        
        
    }



    public function create(Request $request)


    {

        
           
           
            return view('admin.users.create');
       
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);


        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']), //<==encrypt here
        ]);



       

            

        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully added.');
    }


    public function edit($id,Request $request)
    {
       
       
            $user = User::findOrFail($id);
           
           $role = Role::all();
            return view('admin.users.edit', ['user'=>$user,'role'=>$role]);
       

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:6|confirmed'
        ]);

        $input = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']), //<==encrypt here
        ];


        $user->removeRole('admin');
        $user->removeRole('super-admin');
        $user->assignRole($request['role']);
        $user->fill($input)->save();


       
        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {

        
           
           
        $user = User::find($id);
        $user->delete();
        return redirect('/users')
            ->with('flash_message',
             'User successfully deleted.');
       
       
    }
}

