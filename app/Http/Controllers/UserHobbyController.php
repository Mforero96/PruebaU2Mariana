<?php

namespace App\Http\Controllers;

use App\UserHobby;
use Illuminate\Http\Request;
use Auth;
use App\Hobby;

class UserHobbyController extends Controller
{  
    public function index()
    {
        $userHobby = UserHobby::join('users', 'users.id', '=', 'user_hobbies.user')
                                    ->join('hobbies', 'hobbies.id', '=', 'user_hobbies.hobby')
                                    ->where('users.id', Auth::user()->id)
                                    ->select('user_hobbies.id', 'hobbies.name')
                                    ->get();
        return view('userpasatiempos.index', ['pasatiempoLista'=>$userHobby]);
    }
    public function create(Request $request)
    {
        $pasatiempo = new UserHobby();

        if ($request->id!==null) {
            $pasatiempo = UserHobby::findOrFail($request->id);
            $pasatiempo->hobby = $request->pasatiempo;

        } else {
            $pasatiempo->hobby = $request->pasatiempo;
            $pasatiempo->user = Auth::user()->id;
        }
        $pasatiempo->save();
        return redirect('/user/pasatiempos');
    }
    public function edit($id=null)
    {
        $pasatiempos = Hobby::all();
        return view('userpasatiempos.form', ['pasatiempos'=>$pasatiempos, 'id'=>$id]);
    }

}
