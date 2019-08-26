<?php

namespace App\Http\Controllers;

use App\Hobby;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    public function create(Request $request)
    {
        $pasatiempo = new Hobby();

        if ($request->id!==null) {
            $pasatiempo = Hobby::findOrFail($request->id);
            $pasatiempo->name = $request->name;

        } else {
            $pasatiempo->name = $request->name;
        }
        $pasatiempo->save();
        return redirect('/pasatiempos');
    }

    public function index()
    {
        $pasatiempoLista = Hobby::all();
        return view ('pasatiempo.index', ['pasatiempoLista'=>$pasatiempoLista]);
    }

    public function edit($id=null)
    {
        $pasatiempo = new Hobby();

        if ($id!==null) {
            $pasatiempo = Hobby::findOrFail($id);
        }
        return view('pasatiempo.form', ['pasatiempo'=>$pasatiempo]);
    }
}
