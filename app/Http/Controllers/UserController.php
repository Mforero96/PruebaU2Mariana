<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Hobby;
use DB;
use App\Department;
use App\UserHobby;

class UserController extends Controller
{
    public function index()
    {
        $users = User::join('cities', 'users.city', '=', 'cities.id')
                                    ->join('roles', 'users.role', '=', 'roles.id')
                                    ->join('user_hobbies', 'users.id', '=', 'user_hobbies.user')
                                    ->join('hobbies', 'hobbies.id', '=', 'user_hobbies.hobby')
                                    ->select('users.id', 'users.name', 'users.username', 'users.email', 'cities.name as city', 'roles.name as role',DB::raw('GROUP_CONCAT(hobbies.name) as hobbies'))
                                    ->get();
        return view('admin.index',['users'=>$users]);
    }

    public function edit($id=null)
    {
        $user = new User();
        $roles = Role::all();
        $listHobbies = Hobby::all();
        $hobbies = [];
        $deparments = Department::all();
        if ($id!== null) {
            $user= User::findOrFail($id);
            $hobbies = User::join('user_hobbies','user_hobbies.user', '=', 'users.id')
                            ->select('user_hobbies.id', 'user_hobbies.hobby')->get();
        }
        return view('admin.form',['user'=>$user, 'hobbies'=>$hobbies, 'roles'=>$roles, 'departments'=>$deparments, 'listHobbies'=>$listHobbies]);
    }

    public function create(Request $request)
    {
        $user = new User();

        if ($request->id!==null) {
            $user = User::findOrFail($request->id);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->city = $request->city;
            $user->role = $request->role;

            $hobby = $request->input("hobby.*");//user_hobbies hobby
            $id = $request->input("userhobbyid.*");//user_hobbies id

            for ($i=0; $i < count($id) ; $i++) { 
                $userHobby = UserHobby::findOrFail($id[$i]);
                $userHobby->hobby= $hobby[$i];
                $userHobby->save();
            }

            $user->save();

        } else {
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->city = $request->city;
            $user->role = $request->role;
            $user->save();

            $userHobby = new UserHobby();
            $userHobby->$user->id;
            $userHobby->$request->hobby;
            $userHobby->save();
        }
        $user->save();
        return redirect('/admin/usuarios');
    }
}
