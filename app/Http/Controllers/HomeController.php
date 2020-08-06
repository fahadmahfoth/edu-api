<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\School ;
use App\Department ;
use App\User ;
use App\Curricula ;
use App\Suggest ;
// use Spatie\Permission\Models\Role;


class HomeController extends Controller
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




        // Permission::create(['name' => 'edit data']);
        // Permission::create(['name' => 'delete data']);
        // Permission::create(['name' => 'publish data']);
        // Permission::create(['name' => 'unpublish data']);


        // $role1 = Role::create(['name' => 'admin']);
        // $role1->givePermissionTo('edit data');
        // $role1->givePermissionTo('delete data');
        // $role1->givePermissionTo('publish data');
        // $role1->givePermissionTo('unpublish data');


        //  $role2 = Role::create(['name' => 'user']);
        //  $role3 = Role::create(['name' => 'super-admin']);




        $schoolsCount = School::get()->count();
        $departmentCount = Department::get()->count();
        $CurriculaCount =  Curricula::get()->count() ;
        $suggetsCount = Suggest::get()->count();
        $usersCount = User::get()->count();
        
        return view('home')->with([
            'schools_count' => $schoolsCount,
            'departments_count' => $departmentCount,
            'curricula_count' => $CurriculaCount,
            'users_count' => $usersCount,
            'suggests_count' => $suggetsCount
        ]);
    }
}
